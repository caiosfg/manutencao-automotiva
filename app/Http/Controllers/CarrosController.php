<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrosController extends Controller
{
    public function __construct()
    {
        
    }
    
    public function getAll()
    {
        return "get All";
    }

    public function get($id)
    {
        return "get {$id}";
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function update($id, Request $request)
    {
        dd($id, $request->all());
    }

    public function destroy($id)
    {
        dd($id);
    }
}
