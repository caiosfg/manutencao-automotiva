<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Carros;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


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

        if (count($carros) > 0) {
            return response()->json($carros, Response::HTTP_OK);
        } else {
            return response()->json([], Response::HTTP_OK);
        }
       
    }

    public function get($id)
    {
       $carro = $this->model->find($id);

       if (count($carro) > 0) {
        return response()->json($carro, Response::HTTP_OK);
       } else {
        return response()->json(null, Response::HTTP_OK);
       }
       
    }

    public function store(Request $request)
    {

        //Validator recebe o primeiro parametro de post, depois o array de validação de dados
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required | max: 80',
                'description' => 'required',
                'model' => 'required | max: 10 | min: 2',
                'date' => 'required | date_format : "Y-m-d'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response:: HTTP_BAD_REQUEST);
        } else {
            
            try {
                $carro = $this->model->create($request->all());
                return response()->json($carro, Response:: HTTP_CREATED);
            } catch (QueryException $exception) {
                return response()->json(['error' => 'Erro de comunicação com a base',
                Response::HTTP_BAD_GATEWAY]);
            }
        }

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
        
        return response()->json(null);
    }
}
