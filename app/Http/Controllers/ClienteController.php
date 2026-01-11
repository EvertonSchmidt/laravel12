<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        //buscar informações do nosso banco de dados/bd
        $cliente = Cliente::orderByDesc('created_at')->get();
        //Retorna nossa view, ou seja, nosso layout
        return view('cliente/index', ['cliente' => $cliente]);
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

        $email = $request->input('email');

        //validar camos (professor)
        $request->validated();

        //salva no banco de dados
        // Cliente::create($request->all());

        $saldo = str_replace(['R$', '.', ','], ['', '', '.'], $request->saldo);

        //forçar 2 casas decimais após a virgula
        $saldo = number_format((float) $saldo, "2", ".", "");

        Cliente::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'fone' => $request->fone,
            'email' => $request->email,
            'nascimento' => $request->nascimento,
            'permissao' => $request->has('permissao') ? 'Admin' : 'Comum',
            // 'saldo' => $format_saldo
            'saldo' => (float) $saldo,
        ]);

        //redirecionamento
        return redirect()->route('cliente.index')->with('sucesso','Cadastro efetuado com sucesso!');
        //validar os campos (chatgpt)
        // $validated = $request->validate([
        //     'nome' => 'required|string|max:255',
        //     'cpf' => 'required',
        //     'email' => 'required',
        //     'fone' => 'required',
        //     'nascimento' => 'required',
        // ]);

        //salvar no banco de dados
        // dd($request->all());
        // Cliente::create($validated);

        //redirecionamento
        // return redirect()->route('cliente.mostrar')->with('sucesso', 'Cliente cadastrado com sucesso!');
    }

    //visualizar os dados a partir do ID do cliente
    public function editar(Cliente $cliente)
    {
        return view('cliente/editar', ['cliente' => $cliente]);
        // return view('partials/modal-login', ['cliente' => $cliente]);
    }

    //alterar os dados do cliente a partir do nosso ID
    //Requeste verificaremos se os campos estão completos, ou seja, iremos validar
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        //validação dos campos
        $request->validated();

        //edita as informações no banco de dados
        $cliente->update([
            'nome' => $request->nome,
            'fone' => $request->fone,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'permissao' => $request->has('permissao') ? 'Admin' : 'Comum',
        ]);

        //redrecionamento
        return redirect()->route('cliente.index')->with('sucesso', 'Cliente cadastrado com sucesso!');


    }

    public function destroy($id)
    {
        //busca o usuário pelo ID
        $usuario = Cliente::findOrFail($id);

        //Exclui o usuário
        $usuario->delete();

        //Redireciona com mensagem de sucesso
        return redirect()
    ->route('cliente.index')
    ->with('sucesso', 'Usuário excluído com sucesso!');


    }
}
