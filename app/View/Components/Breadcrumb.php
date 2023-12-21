<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $title;
    public $subtitle;
    public $links;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $subtitle = null, $links = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->links = $links;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb');
    }
}
