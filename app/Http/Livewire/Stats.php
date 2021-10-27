<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App;
use App\ShetabitVisits;


class Stats extends Component
{
protected $fruit_count = 60;
protected $veg_count = 25;
protected $grains_count = 75;
public function render(){
    return view('livewire.stats',['fruit_count'=>$this->fruit_count,
        'veg_count'=>$this->veg_count,'grains_count'=>$this->grains_count]);
}

}
