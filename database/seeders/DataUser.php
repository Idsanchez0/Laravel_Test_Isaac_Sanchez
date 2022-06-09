<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Repositories\UsuariosRepository;
use Illuminate\Support\Facades\Hash;
class DataUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    private $usuariosRepository;

    public function __construct(UsuariosRepository $usuariosRepo)
    {
        $this->usuariosRepository = $usuariosRepo;
    }

    public function run()
    {
        $user = User::create([
            'name' => 'prueba',
            'email' => 'prueba@gmail.com',
            'email_verified_at'=>Carbon::now()->toDateString(),
            'password' => Hash::make('12345678'),
        ]);

        $input=[
            'nombres'=>'prueba',
            'apellidos'=>'prueba',
            'fecha_nacimiento'=>Carbon::now(),
            'email'=>'prueba@gmail.com',
            'password'=>'12345678',
            'direccion'=>'N/A',
            'user_id'=> $user->id,
        ];

        $usuarios = $this->usuariosRepository->create($input);
    }
}
