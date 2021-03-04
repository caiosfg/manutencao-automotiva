<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Carros;



class CarrosController extends Controller
{

    private $model;

    public function __construct(Carros $carros)
    {
        $this->model = $carros;
    }
    
    public function getAll()
    {
        $carros = $this->model->all();

       return response()->json($carros);
    }

    public function get($id)
    {
       $carro = $this->model->find($id);

       return response()->json($carro);
    }

    public function store(Request $request)
    {
        $carro = $this->model->create($request->all());

        return response()->json($carro);
    }

    public function update($id, Request $request)
    {
        $carro = $this->model->find($id)
               ->update($request->all());

        return response()->json($carro);
    }

    public function destroy($id)
    {
        $carro = $this->model->find($id)
               ->delete();
        
        return response()->json(data: null);
    }
}
