<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;

class Navbar extends Component
{
    public function render()
    {
        $user = Auth::user();
        return view ('livewire.navbar', compact('user'));
    }
}
