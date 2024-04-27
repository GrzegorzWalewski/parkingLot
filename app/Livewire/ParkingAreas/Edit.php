<?php

namespace App\Livewire\ParkingAreas;

use App\Livewire\Forms\ParkingAreaForm;
use App\Models\ParkingArea;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Parking Area Edit')]
class Edit extends Component
{
    public ParkingAreaForm $form;

    public function mount($id)
    {
        $parkingArea = ParkingArea::find($id);

        $this->form->setParkingArea($parkingArea);
    }

    public function save()
    {
        $this->form->update();

        return redirect()->route('home');
    }

}
