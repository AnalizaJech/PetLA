<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormModalCreate extends Component
{
    public $idnameModal,$subtitle,$action,$method;
    

    public function __construct($idnameModal,$subtitle,$action,$method)
    {
        $this->idnameModal=$idnameModal;
        $this->subtitle=$subtitle;
        $this->action=$action;
        $this->method=$method;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-modal-create');
    }
}
