<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type='primary')
    {
        switch ($type){
            case 'primary':
                $this->class = 'alert-primary';
                break;
    
            case 'secondary':
                $this->class = 'alert-secondary';
                break;
    
            case 'success':
                $this->class = 'alert-success';
                break;
    
            case 'danger':
                $this->class = 'alert-danger';
                break;
    
            case 'warning':
                $this->class = 'alert-warning';
                break;
    
            case 'info':
                $this->class = 'alert-info';
                break;
    
            case 'light':
                $this->class = 'alert-light';
                break;
    
            case 'dark':
                $this->class = 'alert-dark';
                break;
    
            default:
                $this->class = 'alert-primary';
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
        return view('components.alert');
    }
}
