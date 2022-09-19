<?php

namespace App\Http\Controllers;

use App\Models\Lojas;
use Illuminate\Http\Request;

class lojasController extends Controller
{
    public function index()
    {
        return Lojas::all();

    }


    public function store(Request $request)
    {
        Lojas::create($request->all());
        return $response = json_encode([
            "error" => false,
            "mensage" => "Loja cadastrado com successo"
        ]);
    }


    public function show($id)
    {
        return Lojas::findOrFail($id, ['nome','endereco']);
    }

    public function update(Request $request, $id)
    {
        $carro = Lojas::findOrFail($id);
        $carro->update($request->all());
        return $response = json_encode([
            "error" => false,
            "mensage" => "Loja atualizado com sucesso!"
        ]);
    }


    public function destroy($id)
    {
        $carro = Lojas::findOrFail($id);
        $carro->delete();
        return $response = json_encode([
            "error" => false,
            "mensage" => "Loja deletado com sucesso!"
        ]);
    }
}
