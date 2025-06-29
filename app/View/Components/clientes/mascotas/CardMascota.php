<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardMascota extends Component
{
    public $foto;
    public $nombre;
    public $especie;
    public $raza;
    public $nacimiento;
    public $sexo;
    public $peso;
    public $id;

    public function __construct($foto, $nombre,$especie,$raza,$fecha_nacimiento,$sexo,$peso,$id)
    {
        $this->foto=$foto;
        $this->nombre=$nombre;
        $this->especie=$especie;
        $this->raza=$raza;
        $this->nacimiento=$fecha_nacimiento;
        $this->id=$id;
        $this->sexo=$sexo;
        $this->peso=$peso;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.clientes.mascotas.card-mascota');
    }
}
