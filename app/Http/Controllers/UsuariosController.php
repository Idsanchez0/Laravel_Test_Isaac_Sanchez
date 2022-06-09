<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;
use App\Repositories\UsuariosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;



use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends AppBaseController
{
    /** @var  UsuariosRepository */
    private $usuariosRepository;

    public function __construct(UsuariosRepository $usuariosRepo)
    {
        $this->usuariosRepository = $usuariosRepo;
    }

    /**
     * Display a listing of the Usuarios.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $usuarios = $this->usuariosRepository->all();
        //$usuarios=User::get();
        return view('usuarios.index')
            ->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new Usuarios.
     *
     * @return Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created Usuarios in storage.
     *
     * @param CreateUsuariosRequest $request
     *
     * @return Response
     */
    public function store(CreateUsuariosRequest $request)
    {
        $request->all();

       $user = User::create([
            'name' => $request['nombres'],
            'email' => $request['email'],
            'email_verified_at'=>Carbon::now()->toDateString(),
            'password' => Hash::make($request['password']),
        ]);


        $input=[
            'nombres'=>$request['nombres'],
            'apellidos'=>$request['apellidos'],
            'fecha_nacimiento'=>$request['fecha_nacimiento'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            'direccion'=>$request['direccion'],
            'user_id'=> $user->id,
        ];

        $user->id;

        $usuarios = $this->usuariosRepository->create($input);

        Flash::success('Datos guardados exitosamente.');

        return redirect(route('usuarios.index'));




    }

    /**
     * Display the specified Usuarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('usuarios.index'));
        }

        return view('usuarios.show')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for editing the specified Usuarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
       $usuarios = $this->usuariosRepository->find($id);

        //$usuarios=User::find($id);
        if (empty($usuarios)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('usuarios.index'));
        }

        return view('usuarios.edit')->with('usuarios', $usuarios);
    }

    /**
     * Update the specified Usuarios in storage.
     *
     * @param int $id
     * @param UpdateUsuariosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsuariosRequest $request)
    {
        $usuarios = $this->usuariosRepository->find($id);
        $user =User::find($usuarios->user_id);

        if (empty($usuarios)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('usuarios.index'));
        }

        if($request['password']==null){
            $data_user=[
                'name' => $request['nombres'],
                'email' => $request['email'],

           ];

           $data_usuario=[
            'nombres'=>$request['nombres'],
            'apellidos'=>$request['apellidos'],
            'fecha_nacimiento'=>$request['fecha_nacimiento'],
            'email'=>$request['email'],
            'direccion'=>$request['direccion'],
            ];
        }else{
            $data_user=[
                'name' => $request['nombres'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
           ];

           $data_usuario=[
            'nombres'=>$request['nombres'],
            'apellidos'=>$request['apellidos'],
            'fecha_nacimiento'=>$request['fecha_nacimiento'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            'direccion'=>$request['direccion'],
            ];
        }

        $user->update($data_user);

        $usuarios = $this->usuariosRepository->update($data_usuario, $id);



        Flash::success('Datos actualizados correctamente');

        return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified Usuarios from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('usuarios.index'));
        }

        $this->usuariosRepository->delete($id);

        Flash::success('Usuario eliminado exitosamente.');

        return redirect(route('usuarios.index'));
    }
}
