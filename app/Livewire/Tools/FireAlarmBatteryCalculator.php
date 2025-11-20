<?php

namespace App\Livewire\Tools;

use Livewire\Component;

class FireAlarmBatteryCalculator extends Component
{
    public $standbyCurrent = 120.0;
    public $standbyHours = 24.0;
    public $alarmCurrent = 600.0;
    public $alarmMinutes = 30.0;
    public $deratingFactor = 0.8;

    protected array $batteryOptions = [7, 12, 17, 18, 24, 38, 45];

    protected $rules = [
        'standbyCurrent' => 'required|numeric|min:0',
        'standbyHours' => 'required|numeric|min:0',
        'alarmCurrent' => 'required|numeric|min:0',
        'alarmMinutes' => 'required|numeric|min:0',
        'deratingFactor' => 'required|numeric|between:0.1,1',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function getStandbyLoadAhProperty(): float
    {
        return (floatval($this->standbyCurrent) / 1000) * floatval($this->standbyHours);
    }

    public function getAlarmLoadAhProperty(): float
    {
        return (floatval($this->alarmCurrent) / 1000) * (floatval($this->alarmMinutes) / 60);
    }

    public function getRequiredAhProperty(): float
    {
        if (floatval($this->deratingFactor) <= 0) {
            return 0;
        }

        return ($this->standbyLoadAh + $this->alarmLoadAh) / floatval($this->deratingFactor);
    }

    public function getRecommendedBatteryProperty(): float
    {
        foreach ($this->batteryOptions as $option) {
            if ($option >= $this->requiredAh) {
                return $option;
            }
        }

        return ceil($this->requiredAh);
    }

    public function render()
    {
        return view('livewire.tools.fire-alarm-battery-calculator', [
            'standbyLoadAh' => $this->standbyLoadAh,
            'alarmLoadAh' => $this->alarmLoadAh,
            'requiredAh' => $this->requiredAh,
            'recommendedBattery' => $this->recommendedBattery,
        ]);
    }
}
