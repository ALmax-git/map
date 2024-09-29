<?php

namespace App\Livewire;

use App\Models\School;
use Livewire\Component;

class Map extends Component
{

    public $schools = [];
    public $model = false;
    public $school;
    
    public function close_model(){
     $this->model = false;
    }
    
    public function open_model($school_id){
       $this->school = School::find($school_id);
       if($this->school){
          $this->model = true;
       }else{
          $this->model = false;
       }
    }

    public function mount()
    {
        // Fetch all schools from the database
        $this->schools = School::all();
    }

    public function render()
    {
        return view('livewire.map', [
            'schools' => $this->schools
        ]);
    }
}
