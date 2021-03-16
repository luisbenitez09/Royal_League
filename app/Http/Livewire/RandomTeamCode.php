<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class RandomTeamCode extends Component
{
    public function render()
    {
        $var = Str::uuid();
        return view('livewire.random-team-code', compact('var'));
    }

    public function generateCode(){
        $var = Str::uuid();
    }
}
