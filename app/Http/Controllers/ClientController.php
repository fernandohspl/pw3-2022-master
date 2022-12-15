<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Client;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        return  view('vitrine.cliete.create',compact('categorias','subcategorias'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($client ));

        Auth::login($client );

        return redirect()->route('cliente.login.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
    public function createLogin()
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        if (!Auth::guard('vitrine')->check()){
            return view('vitrine.cliente.login-cliente',compact('categorias','subcategorias'));
        }else{
            return redirect()->route('vitrine.carrinho');
        }
    }

    public function  login(Request $request){
        $credentials = [
            'email'=>$request->email,
            'password'=> $request->password
        ];

        if (Auth::guard('vitrine')->attempt($credentials)){
            return redirect()->route('vitrine.carrinho');
        }
    }
    public function  logout(Request $request){
       Auth::guard('vitrine')->logout();
       return redirect()->route('vitrine.carriho');
    }

}
