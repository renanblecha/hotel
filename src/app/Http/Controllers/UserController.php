<?php

namespace App\Http\Controllers;

use App\Role\UserRole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = User::paginate(3);
        return view('paginas.usuario.index', compact('registros'));
    }

    public function showAdminRegistrationForm()
    {
        $roles = UserRole::getAdminRoleList(Auth::user());
    	return view('auth.register_admin', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = UserRole::getAdminRoleList(Auth::user());
        return view('paginas.usuario.adicionar', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if (!array_key_exists("roles", $data)){
            $roles = array();
            $roles[] = UserRole::ROLE_HOSPEDE;
            $data['roles'] = $roles;
        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'roles' => $data['roles'],
        ]);

        return redirect()->route('admin.usuario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $registro = User::find($id);
        $roles = UserRole::getAdminRoleList(Auth::user());
        dd($registro);
        return view('paginas.usuario.editar', compact(['roles','registro']));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
