<?php

namespace App\Livewire\Forms;

use App\Models\ParkingArea;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ParkingAreaForm extends Form
{
    public ?ParkingArea $parkingArea;

    #[Validate('required|max:255')]
    public $name;

    #[Validate('required|numeric')]
    public $weekday_price;

    #[Validate('required|numeric')]
    public $weekend_price;

    #[Validate('required|numeric|between:0,100')]
    public $discount;

    public function setParkingArea(ParkingArea $parkingArea)
    {
        $this->parkingArea = $parkingArea;

        $this->name = $parkingArea->name;
        $this->weekday_price = $parkingArea->weekday_price;
        $this->weekend_price = $parkingArea->weekend_price;
        $this->discount = $parkingArea->discount;
    }

    public function store()
    {
        $this->validate();

        ParkingArea::create($this->all());

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->parkingArea->update(
            $this->all()
        );
    }
}
