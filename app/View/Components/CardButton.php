<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardButton extends Component
{
    public $color;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color='primary')
    {
        switch ($color){
            case 'primary':
                $this->color = 'primary';
                break;
    
            case 'secondary':
                $this->color = 'secondary';
                break;
    
            case 'success':
                $this->color = 'success';
                break;
    
            case 'danger':
                $this->color = 'danger';
                break;
    
            case 'warning':
                $this->color = 'warning';
                break;
    
            case 'info':
                $this->color = 'info';
                break;
    
            case 'light':
                $this->color = 'light';
                break;
    
            case 'dark':
                $this->color = 'dark';
                break;
    
            default:
                $this->color = 'primary';
                break;
        }
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-button');
    }
}
