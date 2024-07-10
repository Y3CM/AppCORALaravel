<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class DropdownButton extends Component
{
    public $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'secondary')
    {
        switch ($type){
            case 'primary':
                $this->class = 'btn-outline-primary';
                break;
    
            case 'secondary':
                $this->class = 'btn-outline-secondary';
                break;
    
            case 'success':
                $this->class = 'btn-outline-success';
                break;
    
            case 'danger':
                $this->class = 'btn-outline-danger';
                break;
    
            case 'warning':
                $this->class = 'btn-outline-warning';
                break;
    
            case 'info':
                $this->class = 'btn-outline-info';
                break;
    
            case 'light':
                $this->class = 'btn-outline-light';
                break;
    
            default:
                $this->class = 'btn-outline-secondary';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render():View
    {
        return view('components.dropdown-button');
    }
}
