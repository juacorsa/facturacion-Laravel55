<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Interfaces\EmpresaRepositoryInterface;
use App\Empresa;
use Session;
use Exception;

class EmpresasController extends Controller
{
	private $repositorio;

	public function __construct(EmpresaRepositoryInterface $repositorio)
	{		
        $this->middleware('auth');
		$this->repositorio = $repositorio;
	}

    public function index()
    {
    	$empresas = $this->repositorio->obtenerTodos();
    	return view('empresas.index', compact('empresas'));
    }

    public function create()
    {
    	return view('empresas.create');	
    }

    public function store(EmpresaRequest $request)
    {
    	$datos = $request->only(['nombre']); 

    	try
    	{
    		$this->repositorio->registrar($datos);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', Mensaje::EMPRESA_REGISTRADA);
            Session::flash('flash_titulo', Mensaje::ENHORABUENA);
            Session::flash('flash_tipo', Mensaje::FLASH_SUCCESS);               		
    		return redirect()->route('empresas.index');
    	}
    	catch(Exception $e)
    	{
            Session::flash('flash_swal', 'swal');
            Session::flash('flash_mensaje', Mensaje::EMPRESA_NO_REGISTRADA);
            Session::flash('flash_titulo', Mensaje::ERROR);
            Session::flash('flash_tipo', Mensaje::FLASH_ERROR);           
            return back();
    	}
    }

 	public function edit($id)  
    {
        $empresa = $this->repositorio->obtener($id);       

        if (!$empresa) 
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', Mensaje::EMPRESA_NO_ENCONTRADA);
            Session::flash('flash_titulo', Mensaje::ERROR);
            Session::flash('flash_tipo', Mensaje::FLASH_ERROR);           
            return back();            
        }

        return view('empresas.edit', compact('empresa'));        
    }  

    public function update(EmpresaRequest $request)
    {
        $datos = $request->only(['nombre', 'id']);  

        try
        {
            $this->repositorio->actualizar($datos);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', Mensaje::EMPRESA_ACTUALIZADA);
            Session::flash('flash_titulo', Mensaje::ENHORABUENA);
            Session::flash('flash_tipo', Mensaje::FLASH_SUCCESS);                       
            return redirect()->route('empresas.index'); 
        }
        catch(Exception $e)
        {
            Session::flash('flash_swal', 'swal');
            Session::flash('flash_mensaje', Mensaje::EMPRESA_NO_ACTUALIZADA);
            Session::flash('flash_titulo', Mensaje::ERROR);
            Session::flash('flash_tipo', Mensaje::FLASH_ERROR);           
            return back();
        }                                  
    }   
}
