<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public array $links;

    public function __construct(array $links = [])
    {
        $this->links = $links;
    }

    public function render()
    {
        return view('components.sidebar');
    }
}

