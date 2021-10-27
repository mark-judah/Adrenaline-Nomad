<?php

namespace App\Http\Livewire;

use App\Visit;
use Carbon\Carbon;
use Livewire\Component;


class Analytics extends Component
{
    protected $analyticsData=null;

    public function render()
    {
        $this->analyticsData = Visit::orderBy('created_at', 'desc')->paginate(20);
        return view('livewire.analytics',['analyticsData'=>$this->analyticsData]);
    }
}
