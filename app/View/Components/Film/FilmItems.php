<?php

namespace App\View\Components\Film;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilmItems extends Component
{
    
        public $film;
        public $loop;

    public function __construct($film, $loop)
    {
        $this->film=$film;
        $this->loop=$loop;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.film.film-items');
    }
}
