<?php

namespace Bnussbau\LaravelTrmnl\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('trmnl::components.table');
    }
}
