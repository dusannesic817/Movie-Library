<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Symfony\Component\Routing\Route;

class NameRoute extends Component
{
    public $name;


    public function __construct($name)
    {
        $this->name=$name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $finalName = ucwords(str_replace(".", " ", $this->name));
    
        return view('components.name-route')->with('finalName', $finalName);
    }
}
