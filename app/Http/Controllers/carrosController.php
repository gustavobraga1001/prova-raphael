<?php

namespace App\Http\Controllers;

use App\Models\Carros;
use Illuminate\Http\Request;

class carrosController extends Controller
{
    public function index()
    {
        return Carros::all();

    }


    public function store(Request $request)
    {
        Carros::create($request->all());
        return $response = json_encode([
            "error" => false,
            "mensage" => "Carro cadastrado com successo"
        ]);
    }


    public function show($id)
    {
        return Carros::findOrFail($id, ['nome','preco','marca']);
    }

    public function update(Request $request, $id)
    {
        $carro = Carros::findOrFail($id);
        $carro->update($request->all());
        return $response = json_encode([
            "error" => false,
            "mensage" => "Carro atualizado com sucesso!"
        ]);
    }


    public function destroy($id)
    {
        $carro = Carros::findOrFail($id);
        $carro->delete();
        return $response = json_encode([
            "error" => false,
            "mensage" => "Carro deletado com sucesso!"
        ]);
    }
}
