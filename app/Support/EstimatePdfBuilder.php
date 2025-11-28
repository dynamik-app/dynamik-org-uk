<?php

namespace App\Support;

use App\Models\Estimate;

class EstimatePdfBuilder
{
    public static function render(Estimate $estimate): string
    {
        $lines = [];
        $companyName = $estimate->company->registered_name ?? 'Company';

        $lines[] = $companyName.' Estimate';
        $lines[] = 'Estimate #: '.$estimate->number;
        $lines[] = 'Status: '.ucfirst($estimate->status);
        $lines[] = 'Issued: '.($estimate->issue_date?->format('Y-m-d') ?? '');
        $lines[] = 'Expires: '.($estimate->due_date?->format('Y-m-d') ?? 'Not set');
        $lines[] = '';
        $lines[] = 'Bill to: '.$estimate->client->name;
        if ($estimate->client->contact_name) {
            $lines[] = 'Contact: '.$estimate->client->contact_name;
        }
        if ($estimate->client->email) {
            $lines[] = 'Email: '.$estimate->client->email;
        }
        if ($estimate->client->phone) {
            $lines[] = 'Phone: '.$estimate->client->phone;
        }
        $lines[] = '';
        $lines[] = 'Line items:';

        foreach ($estimate->items as $item) {
            $label = strtoupper($item->item_type);
            $lines[] = sprintf('%s - %s', $label, $item->name);
            $lines[] = sprintf('  Qty: %s @ %0.2f | Tax: %0.2f%% | Line: %0.2f | Tax: %0.2f', $item->quantity, $item->unit_price, $item->tax_rate, $item->line_total, $item->line_tax);
            if ($item->description) {
                foreach (self::wrapText($item->description) as $wrappedLine) {
                    $lines[] = '  '.$wrappedLine;
                }
            }
            $lines[] = '';
        }

        $lines[] = 'Subtotal: '.number_format($estimate->subtotal, 2);
        $lines[] = 'Tax: '.number_format($estimate->tax_total, 2);
        $lines[] = 'Total: '.number_format($estimate->total, 2);

        if ($estimate->notes) {
            $lines[] = '';
            $lines[] = 'Notes:';
            foreach (self::wrapText($estimate->notes) as $noteLine) {
                $lines[] = '  '.$noteLine;
            }
        }

        return self::buildSimplePdf($lines);
    }

    private static function wrapText(string $text, int $length = 90): array
    {
        return explode("\n", wordwrap($text, $length, "\n", true));
    }

    private static function escape(string $text): string
    {
        return str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $text);
    }

    private static function buildSimplePdf(array $lines): string
    {
        $content = "BT\n/F1 12 Tf\n72 780 Td\n";

        foreach ($lines as $line) {
            $escaped = self::escape($line);
            $content .= sprintf("(%s) Tj\n0 -16 Td\n", $escaped);
        }

        $content .= "ET";

        $objects = [];
        $objects[] = "1 0 obj << /Type /Catalog /Pages 2 0 R >> endobj\n";
        $objects[] = "2 0 obj << /Type /Pages /Kids [3 0 R] /Count 1 >> endobj\n";
        $objects[] = "3 0 obj << /Type /Page /Parent 2 0 R /MediaBox [0 0 612 792] /Contents 4 0 R /Resources << /Font << /F1 5 0 R >> >> >> endobj\n";
        $objects[] = sprintf("4 0 obj << /Length %d >> stream\n%s\nendstream endobj\n", strlen($content), $content);
        $objects[] = "5 0 obj << /Type /Font /Subtype /Type1 /BaseFont /Helvetica >> endobj\n";

        $pdf = "%PDF-1.4\n";
        $offsets = [0];
        $cursor = strlen($pdf);

        foreach ($objects as $object) {
            $offsets[] = $cursor;
            $pdf .= $object;
            $cursor = strlen($pdf);
        }

        $xrefStart = strlen($pdf);
        $pdf .= sprintf("xref\n0 %d\n", count($objects) + 1);
        $pdf .= "0000000000 65535 f \n";

        foreach (array_slice($offsets, 1) as $offset) {
            $pdf .= sprintf("%010d 00000 n \n", $offset);
        }

        $pdf .= sprintf("trailer << /Size %d /Root 1 0 R >>\n", count($objects) + 1);
        $pdf .= "startxref\n".$xrefStart."\n%%EOF";

        return $pdf;
    }
}
