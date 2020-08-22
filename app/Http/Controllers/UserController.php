<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->withUsers(User::orderBy('name')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password =  bcrypt($request->password);    
        $user->save(); 
        Session::flash('alert-class', 'alert-success');
        Session::flash('message', 'Usuário ' . $user->name . ' cadastrado com sucesso!');
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->withUser($user);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {    
        
        $user->name = $request->name;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->email = $request->email;
        if($request->input('password')){
           
            $user->password =  bcrypt($request->password);            
        }

        $user->save();
        Session::flash('alert-class', 'alert-info');
        Session::flash('message', 'Usuário ' . $request->name . ' modificado com sucesso!');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('alert-class', 'alert-danger');
        Session::flash('message', 'Usuário ' . $user->name . ' removido com sucesso!');
        return redirect()->route('users.index');
    }
}
