<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     * @param  string  $type
     * @param  string  $href
     * @return void
     */

    /**
     * The button type.
     *
     * @var string
     */
    public $type;
    /**
     * The button href.
     *
     * @var string
     */
    public $href;

    public function __construct($type,$href)
    {
        $this->type = $type;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
