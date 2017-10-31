<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FacturacionRequest;
use App\Interfaces\EmpresaRepositoryInterface;
use App\Interfaces\ServicioRepositoryInterface;
use App\Interfaces\ClienteRepositoryInterface;
use App\Interfaces\FacturacionRepositoryInterface;
use Session;
use Config;
use Exception;
use PHPExcel_IOFactory;
use Excel;
use Carbon;
use App\Comun;

class FacturacionController extends Controller
{
	private $repositorioEmpresas;
	private $repositorioServicios;
	private $repositorioClientes;
	private $repositorioFacturacion;

	public function __construct(
		EmpresaRepositoryInterface $repositorioEmpresas,
		ClienteRepositoryInterface $repositorioClientes,
		ServicioRepositoryInterface $repositorioServicios,
		FacturacionRepositoryInterface $repositorioFacturacion)
	{		
		$this->repositorioFacturacion = $repositorioFacturacion;
		$this->repositorioServicios = $repositorioServicios;
		$this->repositorioClientes  = $repositorioClientes;
		$this->repositorioEmpresas  = $repositorioEmpresas;
        Carbon\Carbon::setLocale('es');    
	}

    public function index()
    {
        $empresas  = $this->repositorioEmpresas->obtenerTodos();
        $servicios = $this->repositorioServicios->obtenerTodos();
    	return view('facturacion.index', compact('servicios', 'empresas'));
    }

    public function list(Request $request)
    {        
        $mes = $request['mes'];
        $servicio  = $request['servicio'];
        $estado    = $request['estado'];
        $empresa   = $request['empresa'];
        $servicios = $this->repositorioServicios->obtenerTodos();
        $empresas  = $this->repositorioEmpresas->obtenerTodos();
        $serviciosFacturables = $this->repositorioFacturacion->obtenerTodos($mes, $servicio, $estado, $empresa);  
        $empresa_anterior  = $empresa;
        $servicio_anterior = $servicio;
        Session::put('mes', $mes);
        Session::put('servicio', $servicio);
        Session::put('empresa', $empresa);
        Session::put('estado', $estado);
        return view('facturacion.list', compact('servicios', 'empresas', 'mes',
                'serviciosFacturables', 'estado', 'empresa_anterior', 'servicio_anterior'));
    }

    public function show($id)
    {
        $facturacion = $this->repositorioFacturacion->obtener($id);       

        if (!$facturacion) 
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', SERVICIO_NO_ENCONTRADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();            
        }       
                
        $tiempoBaja = '';
        if ($facturacion->fecha_baja) {
            $fecha = Carbon\Carbon::parse($facturacion->fecha_baja);                     
            $dias_transcurridos = $fecha->diffInDays(Carbon\Carbon::today());
            $tiempoBaja = '(Hace ' . $fecha->diffForHumans(Carbon\Carbon::now(), true) . ')';
        }

        $mesesFacturacion = $this->repositorioFacturacion->obtenerMesesFacturacion($id);
        return view('facturacion.show', compact('facturacion', 'mesesFacturacion', 'tiempoBaja'));        
    }

    public function exportar()
    {
        $mes = Session::get('mes');
        $servicio = Session::get('servicio');
        $empresa  = Session::get('empresa');
        $estado   = Session::get('estado');
        $serviciosFacturables = $this->repositorioFacturacion->obtenerTodos($mes, $servicio, $estado, $empresa);  
        $servicios = $serviciosFacturables->toArray();
        $datos[][] = "";

        foreach ($servicios as $key => $value) {            
            $datos[] = array(
                $servicios[$key]['cliente']['nombre'],
                $servicios[$key]['servicio']['nombre'],
                $servicios[$key]['empresa']['nombre'],                
                $servicios[$key]['base']);
        };
      
        $empresa = $this->repositorioEmpresas->obtener($empresa);
        //$fichero = 'Facturacion ' . Config::get('mes.'.$mes) . ' ' . $empresa->nombre;
        
        $fichero = 'Facturacion ' . Comun::MESES[$mes] . ' ' . $empresa->nombre;

        Excel::create($fichero, function($excel) use($datos) {                
            $excel->sheet('Facturacion', function($sheet) use($datos) {                
                $sheet->fromArray($datos, null, 'A1', null, false);                
                $sheet->row(1, array("Cliente", "Servicio", "Empresa", "Base", "Observaciones"));
                $sheet->row(1, function($row) {                    
                    $row->setFontWeight('bold');                  
                });             
            });    
        })->export('xls');
    }

    public function create()
    {
    	$empresas  = $this->repositorioEmpresas->obtenerTodos();
    	$clientes  = $this->repositorioClientes->obtenerTodos();
    	$servicios = $this->repositorioServicios->obtenerTodos();
    	return view('facturacion.create', compact('empresas', 'servicios', 'clientes'));	
    }

    public function store(FacturacionRequest $request)
    {
		$datos = $request->only(['cliente_id', 'empresa_id', 'servicio_id', 'dominio' ,'base',
		'observaciones', 'ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic']); 

 		try
    	{
    		$this->repositorioFacturacion->registrar($datos);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', SERVICIO_REGISTRADO);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);               		    		
    	}
    	catch(Exception $e)
    	{
            Session::flash('flash_swal', 'swal');
            Session::flash('flash_mensaje', SERVICIO_NO_REGISTRADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);                       
    	}

		return redirect()->back()->withInput();
    }

    public function update(FacturacionRequest $request)
    {
		$datos = $request->only(['cliente_id', 'empresa_id', 'servicio_id', 'dominio' ,'base',
		'observaciones', 'ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 
        'oct', 'nov', 'dic', 'fecha_baja', 'motivo_baja', 'id', 'estado']); 

        try
    	{
    		$this->repositorioFacturacion->actualizar($datos);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', SERVICIO_ACTUALIZADO);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);                             		    		
            return redirect()->back()->withInput();
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

    public function edit($id)
    {
        $facturacion = $this->repositorioFacturacion->obtener($id);       

        if (!$facturacion) 
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', SERVICIO_NO_ENCONTRADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();            
        }

        if ($facturacion->fecha_baja)         
            $facturacion->fecha_baja = Carbon\Carbon::parse($facturacion->fecha_baja)->format('d/m/Y');
        
        $empresas  = $this->repositorioEmpresas->obtenerTodos()->pluck('nombre', 'id');
        $clientes  = $this->repositorioClientes->obtenerTodos()->pluck('nombre', 'id');
        $servicios = $this->repositorioServicios->obtenerTodos()->pluck('nombre', 'id');
        return view('facturacion.edit', compact('facturacion', 'servicios', 'empresas', 'clientes'));                    
    }
}
