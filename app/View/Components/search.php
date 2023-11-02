<?php

namespace App\View\Components;

use Closure;
use App\Models\Post;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class search extends Component
{

    public $datos;


    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->datos = [];
    }



    public function  buscar_post(){
        $buscar = $_GET['buscar'];
        $datos = Post::where('name', 'LIKE','%'.$buscar.'%')->get();
        $this->datos = $datos;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search', ['datos' => $this->datos]);
    }

}
