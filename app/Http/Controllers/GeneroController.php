<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Libro;
use App\Exceptions\TransporteNoAsignadoException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function indexc()
    {

        $datos = Genero::orderBy('id', 'asc')->paginate(3);
        return view('inicio-genero', compact('datos'));
    }

    public function createc()
    {
        //el formulario donde nosotros agregamos datos
        return view('agregar-genero');
    }

    public function storec(Request $request)
    {
        try {

            // Si llegamos a este punto, significa que el transporte está asignado
            $genero = new Genero();
            $genero->id = $request->post('id');
            $genero->nombre = $request->post('nombre');
            $genero->save();

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

        return redirect()->route("genero.indexc")->with("success", "Agregado con éxito!");

    }


    public function showc($id)
    {
        //Servira para obtener un registro de nuestra tabla
        $genero = Genero::find($id);
        return view("eliminar-genero", compact('genero'));
    }

    public function editc($id)
    {
        //Este método nos sirve para traer los datos que se van a editar
        //y los coloca en un formulario"
        $genero = Genero::find($id);
        return view("actualizar-genero", compact('genero'));
        //echo $id;
    }

    public function updatec(Request $request, $id)
    {
        //Este método actualiza los datos en la base de datos
        $genero = Genero::find($id);
        $genero->id = $request->post('id');
        $genero->nombre = $request->post('nombre');
        $genero->save();

        return redirect()->route("genero.indexc")->with("success", "Actualizado con exito!");
    }

    public function destroyc($id)
    {
        //Elimina un registro
        $genero = Genero::find($id);
        $genero->delete();
        return redirect()->route("genero.indexc")->with("success", "Eliminado con exito!");
    }

}
