<?php

namespace App\Livewire\PaymentCalculation;

use App\Models\ParkingArea;
use App\Services\PriceCalculationService;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Carbon\Carbon;
use Livewire\Attributes\Title;

#[Title('Payment Calculation')]
class Index extends Component
{
    #[Validate('required|numeric')]
    public $parkingAreaId;

    #[Validate('required|date|date_format:Y-m-d H:i')]
    public $startDate;

    #[Validate('required|date|date_format:Y-m-d H:i|after_or_equal:startDate')]
    public $endDate;

    #[Validate('required|in:USD,PLN,EUR')]
    public $currency = 'USD';

    public $result = [];

    public function render()
    {
        $parkingAreas = ParkingArea::all();

        return view('livewire.payment-calculation.index', compact('parkingAreas'));
    }

    public function calculate()
    {
        $this->result = [];
        $this->validate();

        $priceCalculationService = new PriceCalculationService();
        $startDate = Carbon::parse($this->startDate);
        $endDate = Carbon::parse($this->endDate);
        
        try {
            $this->result = $priceCalculationService->calculatePrice($this->parkingAreaId, $startDate, $endDate, $this->currency);
        } catch (\Exception $e) {
            $this->addError('access_key', "Failed to convert currency: Check your access key in .env file");
        }
    }
}
