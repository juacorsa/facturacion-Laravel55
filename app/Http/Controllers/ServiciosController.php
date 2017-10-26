<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServicioRequest;
use App\Interfaces\ServicioRepositoryInterface;
use App\Servicio;
use Session;
use Exception;

class ServiciosController extends Controller
{
	private $repositorio;

	public function __construct(ServicioRepositoryInterface $repositorio)
	{		
		$this->repositorio = $repositorio;
	}

    public function index()
    {
    	$servicios = $this->repositorio->obtenerTodos();
		return view('servicios.index', compact('servicios'));    	
    }
    
    public function create()
    {
    	return view('servicios.create');	
    }

    public function store(ServicioRequest $request)
    {
    	$datos = $request->only(['nombre']); 

    	try
    	{
    		$this->repositorio->registrar($datos);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', SERVICIO_REGISTRADO);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);               		
    		return redirect()->route('servicios.index');
    	}
    	catch(Exception $e)
    	{
            Session::flash('flash_swal', 'swal');
            Session::flash('flash_mensaje', SERVICIO_NO_REGISTRADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();
    	}
    }

 	public function edit($id)  
    {
        $servicio = $this->repositorio->obtener($id);       

        if (!$servicio) 
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', SERVICIO_NO_ENCONTRADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();            
        }

        return view('servicios.edit', compact('servicio'));        
    }  

    public function update(ServicioRequest $request)
    {
        $datos = $request->only(['nombre', 'id']);  

        try
        {
            $this->repositorio->actualizar($datos);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', SERVICIO_ACTUALIZADO);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);                       
            return redirect()->route('servicios.index'); 
        }
        catch(Exception $e)
        {
            Session::flash('flash_swal', 'swal');
            Session::flash('flash_mensaje', SERVICIO_NO_ACTUALIZADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();
        }                                  
    }  
}
