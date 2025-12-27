<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return view('cliente/index');
    }

    public function voltar()
    {
        return view('welcome');
    }

    public function criar()
    {
        return view('cliente/criar');
    }

    //mostrar resultados
    public function mostrar()
    {
        return view('cliente/mostrar');
    }

    //Salvar no banco de dados
    public function store(ClienteRequest $request)
    {
        //validar os campos
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required',
            'email' => 'required',
            'fone' => 'required',
            'nascimento' => 'required',
        ]);

        //salvar no banco de dados
        // dd($request->all());
        Cliente::create($validated);

        //redirecionamento
        return redirect()->route('cliente.mostrar')->with('sucesso', 'Cliente cadastrado com sucesso!');
    }
}
