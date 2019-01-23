<?php

namespace App\Http\Controllers;

use App\Models\Heroes;
use Illuminate\Http\Request;

class DatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $datos = Heroes::all();
            return response()->json($datos,200);

            /*return response()->json([
                ['id'=>1,'nombre'=>'hulk', 'historia'=>'lo que sea', 'fecha'=>'2015'],
                ['id'=>2,'nombre'=>'spid', 'historia'=>'lo que sea', 'fecha'=>'2015'],
                ['id'=>3,'nombre'=>'bat', 'historia'=>'lo que sea', 'fecha'=>'2015']
            ],200);*/
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $dato = new Heroes();

            $dato->name = $request->input('name');
            $dato->history = $request->input('history');
            $dato->anio = $request->input('anio');

            $dato->save();
            //Pasamos los datos y respuesta para refrescar
            return response()->json([
                "message"=>"Heroe Guardado con éxito",
                "dato"=>$dato
            ],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
