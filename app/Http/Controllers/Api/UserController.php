<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retorna toda la lista de usuarios
        //Laravel por defecto convierte toda esa colección de usuario en formato json
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //nos encargamos de las validaciones
        //accedemos a todos los campos que nos enviaron en el $request
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        //retornamos la creación de ese usuario
        return User::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //es casi lo mismo que store, en vez de guardar una instancia, lo retornamos.
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        //retornamos la creación/actualización de ese usuario
        $user->fill($data);
        //luego de llenar el modelo, se guarda en la bd
        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        //si bien en la bd se elimina, queda por ultima vez es memoria
        return $user;
    }
}
