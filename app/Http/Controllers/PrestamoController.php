<?php

namespace App\Http\Controllers;

use App\Exceptions\TransporteNoAsignadoException;
use App\Models\Prestamo;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function indexc()
    {

        $datos = Prestamo::orderBy('id', 'asc')->paginate(3);
        return view('inicio-prestamo', compact('datos'));
    }

    public function createc()
    {
        //el formulario donde nosotros agregamos datos
        return view('agregar-prestamo');
    }

    public function storec(Request $request)
    {
        try {

            // Si llegamos a este punto, significa que el transporte está asignado
            $prestamo = new Prestamo();
            $prestamo->id = $request->post('id');
            $prestamo->usuario = $request->post('usuario');
            $prestamo->fecha_prestamo = $request->post('fecha_prestamo');
            $prestamo->fecha_devolucion = $request->post('fecha_devolucion');
            $prestamo->libro_id = $request->post('libro_id');
            $prestamo->save();

        } catch (\Exception $exception) {
            $message= " Excepción general ". $exception->getMessage();
            return view('exceptions.exceptions', compact('message'));
        }catch (QueryException $queryException){
            $message= " Excepción de SQL ". $queryException->getMessage();
            return view('errors.404', compact('message'));
        }catch (ModelNotFoundException $modelNotFoundException){
            $message=" Excepción del Sistema ".$modelNotFoundException->getMessage();
            return view('errors.404', compact('message'));
        }

        return redirect()->route("prestamo.indexc")->with("success", "Agregado con éxito!");

    }


    public function showc($id)
    {
        //Servira para obtener un registro de nuestra tabla
        $prestamo = Prestamo::find($id);
        return view("eliminar-prestamo", compact('prestamo'));
    }

    public function editc($id)
    {
        //Este método nos sirve para traer los datos que se van a editar
        //y los coloca en un formulario"
        $prestamo = Prestamo::find($id);
        return view("actualizar-prestamo", compact('prestamo'));
        //echo $id;
    }

    public function updatec(Request $request, $id)
    {
        //Este método actualiza los datos en la base de datos
        $prestamo = Prestamo::find($id);
        $prestamo->id = $request->post('id');
        $prestamo->usuario = $request->post('usuario');
        $prestamo->fecha_prestamo = $request->post('fecha_prestamo');
        $prestamo->fecha_devolucion = $request->post('fecha_devolucion');
        $prestamo->libro_id = $request->post('libro_id');
        $prestamo->save();

        return redirect()->route("prestamo.indexc")->with("success", "Actualizado con exito!");
    }

    public function destroyc($id)
    {
        //Elimina un registro
        $prestamo = Prestamo::find($id);
        $prestamo->delete();
        return redirect()->route("prestamo.indexc")->with("success", "Eliminado con exito!");
    }

}
