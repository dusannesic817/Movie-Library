<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Message extends Component
{
  
    public $type;
    public $message;
    public function __construct($type,$message)
    {
        $this->type=$type;
        $this->message=$message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.message', [
            'type' => $this->type,
            'message' => $this->message,
        ]);
    }
}
