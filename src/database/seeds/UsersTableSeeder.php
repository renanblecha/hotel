<?php

use App\User;
use App\Role\UserRole;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            'name' => "Gerente",
            'email' => "gerente@mail.com",
            'password' => bcrypt("123"),
            'roles' => array(UserRole::ROLE_GERENTE),
        ];
        if (User::where('email', '=', $dados['email'])->count()) {
            $usuario = User::where('email', '=', $dados['email'])->first();
            $usuario->update($dados);
            echo "Usuario Alterado!";
        } else {
            User::create($dados);
            echo "Usuario Criado!";
        }
    }
}
