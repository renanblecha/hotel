<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Pessoa;
use App\Providers\RouteServiceProvider;
use App\Role\UserRole;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
            'nascimento' => 'required|date_format:Y-m-d',
            'password' => ['required', 'string', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['name'] = $data['nome'].' '.$data['sobrenome'];
        $data['created_by'] = null;
        $data['updated_by'] = null;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'roles' => [UserRole::ROLE_HOSPEDE],
        ]);

        $data['user_id'] = $user->id;

        $pessoa = Pessoa::create($data);

        return $user;
    }
}
