<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MovilesController;
use App\Models\Moviles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class MovilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $Moviles = Moviles::all();

        if($Moviles -> empty()){
            $data = [
                'message' => 'No se encontraron automóviles creados',
            ];
            return response() ->json($Moviles, 404);
        }

        return response() ->json($Moviles, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Auto_Name' => 'required',
            'Auto_Modelo' => 'required',
            'Auto_Marca' => 'required',
            'Auto_Pais' => 'required'
        ]);

        if($validator -> fails()){
            $data = [
                'message' => 'Error en la validación',
                'error' => $validator->errors(),
            ];
           return response()->json($data, 400);
        }

        $moviles = Moviles::create([
            'Auto_Name' => $request->Auto_Name,
            'Auto_Modelo' => $request->Auto_Modelo,
            'Auto_Marca' => $request->Auto_Marca,
            'Auto_Pais' => $request->Auto_Pais
        ]);

        if(!$moviles){
            $data= [
                'message' => 'Error al crear el estudiante',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'movil' => $moviles,
            'status' => 201
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $moviles = Moviles::find($id);

        if(!$moviles){
            $data = [
                'message' => 'Automovil no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'Automovil' => $moviles,
            'status' => 200
        ];
        
        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function paises()
    {
        $response = Http::get('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByCode/JSON/debug');
        
        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            // Manejo de errores en caso de que la solicitud falle
            return response()->json([
                'error' => 'No se pudo obtener la información de los países.'
            ], $response->status());
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $moviles = Moviles::find($id);

        if(!$moviles){
            $data = [
                'message' => 'Automovil no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'Auto_Name' => 'required',
            'Auto_Modelo' => 'required',
            'Auto_Marca' => 'required',
            'Auto_Pais' => 'required'
        ]);


        if($validator -> fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'error' => $validator->errors(),
            ];
           return response()->json($data, 400);
        }

        $moviles->Auto_Name = $request->Auto_Name;
        $moviles->Auto_Modelo = $request->Auto_Modelo;
        $moviles->Auto_Marca = $request->Auto_Marca;
        $moviles->Auto_Pais = $request->Auto_Pais;

        $moviles->save();

        $data=[
            'automovil' => $moviles,
            'status' => 200
        ];

        return response()->json($moviles, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $moviles = Moviles::find($id);

        if(!$moviles){
            $data = [
                'message' => 'Automovil no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $moviles->delete();

        $data = [
            'message' => 'Auto eliminado',
            'status' => 200
        ];
        
        return response()->json($data, 200);
        
    }
}
