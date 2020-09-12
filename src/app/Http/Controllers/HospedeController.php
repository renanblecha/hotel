<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\User;
use App\Role\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class HospedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Pessoa::paginate(3);
        return view('paginas.hospede.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paginas.hospede.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'identificacao' => [
                'required',
                'min:11',
                'max:11',
                'regex:/^[0-9]+$/u',
                'unique:pessoas'
            ],
            'nome' => 'required|regex:/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$/u',
            'sobrenome' => 'required|regex:/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$/u',
            'email' => 'required|email|unique:pessoas|unique:users',
            'nascimento' => 'date_format:Y-m-d',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $dados = $request->all();

        $user = User::create([
            'name' => $dados['nome'].' '.$dados['sobrenome'],
            'email' => $dados['email'],
            'password' => Hash::make($dados['password']),
            'roles' => [UserRole::ROLE_HOSPEDE],
        ]);

        $dados['user_id'] = $user->id;

        Pessoa::create($dados);

        return redirect()->route('gerencia.hospede');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $registro = Pessoa::find($id);
        return view('paginas.hospede.editar', compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $pessoa = Pessoa::find($id);
        $user = User::find($pessoa->user_id);
        $request->validate([
            'identificacao' => [
                'required',
                'min:11',
                'max:11',
                'regex:/^[0-9]+$/u',
                Rule::unique('pessoas')->ignore($pessoa->id),
            ],
            'nome' => 'required|regex:/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$/u',
            'sobrenome' => 'required|regex:/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$/u',
            'email' => [
                'required',
                'email',
                Rule::unique('pessoas')->ignore($pessoa->id),
                Rule::unique('users')->ignore($pessoa->user_id),
            ],
            'nascimento' => 'date_format:Y-m-d',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $dados = $request->all();
        $user->update([
            'name' => $dados['nome'].' '.$dados['sobrenome'],
            'email' => $dados['email'],
            'password' => Hash::make($dados['password']),
        ]);

        $pessoa->save($dados);

        return redirect()->route('gerencia.hospede');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $pessoa = Pessoa::find($id);
        $user = User::find($pessoa->user_id);
        $pessoa->delete();
        $user->delete();
        return redirect()->route('gerencia.hospede');
    }
}
