<?php

namespace App\Support;

use App\Models\Invoice;

class InvoicePdfBuilder
{
    public static function render(Invoice $invoice): string
    {
        $lines = [];
        $companyName = $invoice->company->registered_name ?? 'Company';

        $lines[] = $companyName.' Invoice';
        $lines[] = 'Invoice #: '.$invoice->number;
        $lines[] = 'Status: '.ucfirst($invoice->status);
        $lines[] = 'Issued: '.($invoice->issue_date?->format('Y-m-d') ?? '');
        $lines[] = 'Due: '.($invoice->due_date?->format('Y-m-d') ?? 'Not set');
        $lines[] = '';
        $lines[] = 'Bill to: '.$invoice->client->name;
        if ($invoice->client->contact_name) {
            $lines[] = 'Contact: '.$invoice->client->contact_name;
        }
        if ($invoice->client->email) {
            $lines[] = 'Email: '.$invoice->client->email;
        }
        if ($invoice->client->phone) {
            $lines[] = 'Phone: '.$invoice->client->phone;
        }
        $lines[] = '';
        $lines[] = 'Line items:';

        foreach ($invoice->items as $item) {
            $label = strtoupper($item->item_type);
            $lines[] = sprintf('%s - %s', $label, $item->name);
            $lines[] = sprintf('  Qty: %s @ %0.2f | Line: %0.2f', $item->quantity, $item->unit_price, $item->line_total);
            if ($item->description) {
                foreach (self::wrapText($item->description) as $wrappedLine) {
                    $lines[] = '  '.$wrappedLine;
                }
            }
            $lines[] = '';
        }

        $lines[] = 'Subtotal: '.number_format($invoice->subtotal, 2);
        $lines[] = 'Total due: '.number_format($invoice->total, 2);

        if ($invoice->notes) {
            $lines[] = '';
            $lines[] = 'Notes:';
            foreach (self::wrapText($invoice->notes) as $noteLine) {
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
