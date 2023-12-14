<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modal extends Component
{
    public $title;
    public $target;
    public $object;
    public $size;
    public $message;
    public $action;
    /**
     * Create a new component instance.
     */
    public function __construct($title = null, $target = null, $size = null, $message = null, $action = null)
    {
        $this->title = $title;
        $this->target = $target;
        $this->size = $size;
        $this->message = $message;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
