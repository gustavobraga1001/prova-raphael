<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class clientesController extends Controller
{
    public function index()
    {
        return Clientes::all();

    }


    public function store(Request $request)
    {
        Clientes::create($request->all());
        return $response = json_encode([
            "error" => false,
            "mensage" => "Cliente cadastrado com successo"
        ]);
    }


    public function show($id)
    {
        return Clientes::findOrFail($id, ['nome','email']);
    }

    public function update(Request $request, $id)
    {
        $carro = Clientes::findOrFail($id);
        $carro->update($request->all());
        return $response = json_encode([
            "error" => false,
            "mensage" => "Cliente atualizado com sucesso!"
        ]);
    }


    public function destroy($id)
    {
        $carro = Clientes::findOrFail($id);
        $carro->delete();
        return $response = json_encode([
            "error" => false,
            "mensage" => "Cliente deletado com sucesso!"
        ]);
    }
}
