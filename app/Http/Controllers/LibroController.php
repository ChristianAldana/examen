<?php

namespace App\Http\Controllers;
use App\Exceptions\TransporteNoAsignadoException;
use Illuminate\Database\QueryException;
use App\Models\Libro;
use Illuminate\Http\Request;
class LibroController extends Controller
{
    public function indexc()
    {
        $datos = Libro::orderBy('id', 'asc')->paginate(3);
        return view('inicio-libro', compact('datos'));
    }

    public function createc()
    {
        return view('agregar-libro');
    }

    public function storec(Request $request)
    {
        try {
            $libro = new Libro();
            $libro->id = $request->input('id');
            $libro->titulo = $request->input('titulo');
            $libro->autor = $request->input('autor');
            $libro->año_publicacion = $request->input('año_publicacion');
            $libro->save();

            return redirect()->route("libros.indexc")->with("success", "Agregado con éxito!");
        } catch (\Exception $exception) {
            $message = "Excepción general: " . $exception->getMessage();
            return view('exceptions.exceptions', compact('message'));
        } catch (QueryException $queryException) {
            $message = "Excepción de SQL: " . $queryException->getMessage();
            return view('errors.404', compact('message'));
        }
    }

    public function showc($id)
    {
        $libro = Libro::find($id);
        return view("eliminar-libro", compact('libro'));
    }

    public function editc($id)
    {
        $libro = Libro::find($id);
        return view("actualizar-libro", compact('libro'));
    }

    public function updatec(Request $request, $id)
    {
        $libro = Libro::find($id);
        $libro->id = $request->input('id');
        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->año_publicacion = $request->input('año_publicacion');
        $libro->save();

        return redirect()->route("libros.indexc")->with("success", "Actualizado con éxito!");
    }

    public function destroyc($id)
    {
        $libro = Libro::find($id);
        $libro->delete();
        return redirect()->route("libors.indexc")->with("success", "Eliminado con exito!");
    }
}
