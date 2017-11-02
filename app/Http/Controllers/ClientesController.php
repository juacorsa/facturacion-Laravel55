<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Interfaces\ClienteRepositoryInterface;
use App\Cliente;
use App\Mensaje;
use Session;
use Exception;

class ClientesController extends Controller
{
	private $repositorio;
    
	public function __construct(ClienteRepositoryInterface $repositorio)
	{		
        $this->middleware('auth');
		$this->repositorio = $repositorio;        
	}

    public function index()
    {
    	$clientes = $this->repositorio->obtenerTodos();
    	return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
    	return view('clientes.create');	
    }

    public function store(ClienteRequest $request)
    {
    	$datos = $request->only(['nombre']); 

    	try
    	{
    		$this->repositorio->registrar($datos);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', Mensaje::CLIENTE_REGISTRADO);
            Session::flash('flash_titulo', Mensaje::ENHORABUENA);
            Session::flash('flash_tipo', Mensaje::FLASH_SUCCESS);               		
    		return redirect()->route('clientes.index');
    	}
    	catch(Exception $e)
    	{
            Session::flash('flash_swal', 'swal');
            Session::flash('flash_mensaje', Mensaje::CLIENTE_NO_REGISTRADO);
            Session::flash('flash_titulo', Mensaje::ERROR);
            Session::flash('flash_tipo', Mensaje::FLASH_ERROR);           
            return back();
    	}
    }

 	public function edit($id)  
    {
        $cliente = $this->repositorio->obtener($id);       

        if (!$cliente) 
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', Mensaje::CLIENTE_NO_ENCONTRADO);
            Session::flash('flash_titulo', Mensaje::ERROR);
            Session::flash('flash_tipo', Mensaje::FLASH_ERROR);           
            return back();            
        }

        return view('clientes.edit', compact('cliente'));        
    }  

    public function update(ClienteRequest $request)
    {
        $datos = $request->only(['nombre', 'id']);               
        try
        {
            $this->repositorio->actualizar($datos);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', Mensaje::CLIENTE_ACTUALIZADO);
            Session::flash('flash_titulo', Mensaje::ENHORABUENA);
            Session::flash('flash_tipo', Mensaje::FLASH_SUCCESS);                       
            return redirect()->route('clientes.index'); 
        }
        catch(Exception $e)
        {
            Session::flash('flash_swal', 'swal');
            Session::flash('flash_mensaje', Mensaje::CLIENTE_NO_ACTUALIZADO);
            Session::flash('flash_titulo', Mensaje::ERROR);
            Session::flash('flash_tipo', Mensaje::FLASH_ERROR);           
            return back();
        }                                  
    }  

}
