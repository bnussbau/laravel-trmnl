<?php

namespace Bnussbau\LaravelTrmnl\View\Components;

use Illuminate\View\Component;

class Meta extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('trmnl::components.meta');
    }
}
