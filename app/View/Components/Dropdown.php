<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
  public $label;
    public $icon;

    public function __construct($label, $icon = '')
    {
        $this->label = $label;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('components.dropdown');
    }
}
