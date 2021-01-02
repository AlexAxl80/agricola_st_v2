<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Negociante;
use Illuminate\Support\Facades\Crypt;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $usuario = new User;
        $usuario->ci_usu = '1727676676';
        $usuario->apellido_usu = 'Vaca';
        $usuario->nombre_usu = 'Alex';
        $usuario->cargo_usu = 'Administrador';
        $usuario->telefono_usu = '';
        $usuario->direccion_usu = '';
        $usuario->correo_usu = 'alex@gmail.com';
        $usuario->clave_usu = Crypt::encrypt('12341234');
        $usuario->estado_usu = true;
        $usuario->save();



        $usuario1 = new User;
        $usuario1->ci_usu = '0503656902';
        $usuario1->apellido_usu = 'Vanessa';
        $usuario1->nombre_usu = 'Allison';
        $usuario1->cargo_usu = 'Administrador';
        $usuario1->telefono_usu = '';
        $usuario1->direccion_usu = '';
        $usuario1->correo_usu = 'allison@gmail.com';
        $usuario1->clave_usu = Crypt::encrypt('123456789');
        $usuario1->estado_usu = true;
        $usuario1->save();

        // 

        $negociante = new Negociante;
        $negociante->cod_neg = 1;
        $negociante->ci_neg = '0502402811';
        $negociante->apellido_neg = 'Banda';
        $negociante->nombre_neg = 'Monica';
        $negociante->telefono_neg = '983413686';
        $negociante->direccion_neg = 'Tanicuchi';
        $negociante->correo_neg = 'mony@gmail.com';
        $negociante->save();
    }
}
