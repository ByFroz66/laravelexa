<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estudiante1;
use App\Models\Seguimiento ;

class PagesController extends Controller
{
    public function fnIndex (){
        return view('welcome');
    }
    public function fnEstDetalle($id){
        $xDetAlumnos=Estudiante1::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }
    public function fnEstActualizar ($id){
        $xActAlumnos=Estudiante1::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }
    public function fnUpdate(Request $request, $id){
        $xUpdateAlumnos=Estudiante1::findOrFail($id);
        
        $xUpdateAlumnos->idEst=$request->idEst;
        $xUpdateAlumnos->traAct=$request->traAct;
        $xUpdateAlumnos->ofiAct=$request->ofiAct;
        $xUpdateAlumnos->satEst=$request->satEst;
        $xUpdateAlumnos->fecSeg=$request->fecSeg;
        $xUpdateAlumnos->estSeg=$request->estSeg;

        $xUpdateAlumnos->save();
        return back()->with('msj', 'Se actualizo con exito...');
    }
    public function fnRegistrar(Request $request){
        $request -> validate ([
            'idEst'=>'required',
            'traAct'=>'required',
            'ofiAct'=>'required',
            'satEst'=>'required',
            'fecSeg'=>'required',
            'estSeg'=>'required',
        ]);
        $nuevoSeguimiento=new Seguimiento;

        $nuevoSeguimiento->idEst = $request->idEst;
        $nuevoSeguimiento->traAct = $request->traAct;
        $nuevoSeguimiento->ofiAct = $request->ofiAct;
        $nuevoSeguimiento->satEst = $request->satEst;
        $nuevoSeguimiento->fecSeg = $request->fecSeg;
        $nuevoSeguimiento->estSeg = $request->estSeg;

        $nuevoSeguimiento->save();
        return back()->with('msj', 'Se registro con exito...');
    }
    public function fnLista (){
        //$xAlumnos=Estudiante1::all();
        $xAlumnos=Estudiante1::paginate(4);
        return view('pagLista', compact('xAlumnos'));
    }
    public function fnListaSeguimiento (){
        //$xAlumnos=Estudiante1::all();
        $xUsuarios=Seguimiento::paginate(4);
        return view('pagListaSeguimiento', compact('xUsuarios'));
    }

    public function fnEliminar ($id){
        $deleteAlumno=Estudiante1::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj', 'Se elimino con éxito...');
    }

    public function fnGaleria($numero=0) {
        $valor = $numero;
        $otro = 25;
        //return "Foto de codigo ".$numero;
        //return view('pagGaleria',['valor'=>$numero, 'otro'=>25]);
        return view('pagGaleria', compact('valor', 'otro'));
    }
}