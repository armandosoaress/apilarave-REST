<?php

namespace App\Http\Controllers;
use App\models\Moeda;
use Illuminate\Http\Request;


class Moedacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Moeda::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    { 

     return Moeda::create($request -> all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Moeda::find($id);
    }


    public function calculo($valor,$moeda,$margem)
    {
        if ($valor && $moeda && $margem) {
            $valordamoeda = Moeda::where ('nome', '=', $moeda)->first();
           $valorc = $valordamoeda['valor'];

         $margemc = $margem/100;
         $margemd = $margemc * $valor/$valorc;
         $margeme = $margemd +  $valor/$valorc;

        $resposta = response()->json([
            'preço do hotel em reais' => $valor,
            'moeda' => $moeda,
            'valor da moeda' => $valorc,
            'margem' => $margem,
            'preço do hotel em dolar' => $valor/$valorc,
            'preço do hotel com a margem' => $margeme 
        ]);
        }else{
            $resposta = response()->json([
                'status' =>'requisição incopleta',
                'arq' => 'informe os parametros necessarios',
            
            ]);
        }
        

       return $resposta;
       
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
            $moeda = moeda::findOrfail($id);

            $moeda -> update($request->all());

            return $moeda;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        return moeda::destroy($id);
    }
}
