<?php

namespace App\Livewire\ParkingAreas;

use App\Livewire\Forms\ParkingAreaForm;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ParkingArea;
use Livewire\Attributes\Title;

#[Title('Parking Areas')]
class Index extends Component
{
    use WithPagination;

    public ParkingAreaForm $form;

    public function save()
    {
        $this->form->store();

        return $this->redirect('/');
    }

    public function delete(ParkingArea $parkingArea)
    {
        $parkingArea->delete();

        return $this->redirect('/');
    }
    
    public function render()
    {
        $parkingAreas = ParkingArea::paginate(10);

        return view('livewire.parking-areas.index', [
            'parkingAreas' => $parkingAreas
        ]);
    }
}
