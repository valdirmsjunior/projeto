<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $title;
    public $subtitle;
    public $model;
    public $headers;
    public $records;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $title = null,
        $subtitle = null,
        $model = null,
        $headers = null,
        $records = null,
        $route = null
    )
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->model = $model;
        $this->headers = $headers;
        $this->records = $records;
        $this->route = $route;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
