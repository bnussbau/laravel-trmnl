<?php

namespace Bnussbau\LaravelTrmnl\View\Components;

use Illuminate\View\Component;

class Column extends Component
{
    public function __construct()
    {
    }

    public function render()
    {
        return view('trmnl::components.column');
    }
}
