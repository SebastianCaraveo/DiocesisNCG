<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Parroquia;
use Validator;
use Hash;
use Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');  
    }

    public function index(){
        if(Auth::user()->rol != 'Administrador'){
            return redirect('/');
        }
        $users = User::all();
        $parroquias = Parroquia::all();
        return view('admin.useradmin', compact('users', 'parroquias'));
    } 

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name_user' => 'required',
            'select_user_rol' => 'required|in:Administrador,Usuario',
            'email_user' => 'required|email|unique:users,email',
            'pass_user' => 'required|min:8',
            'select_user_parroquia' => 'required|exists:parroquias,id', // Asegúrate de que la parroquia seleccionada existe
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $user = User::create([
            'name' => $request->name_user,
            'rol' => $request->select_user_rol,
            'email' => $request->email_user,
            'password' => Hash::make($request->pass_user),
            'parroquia_id' => $request->select_user_parroquia, // Agrega el id de la parroquia al usuario
        ]);
    
        return redirect()->route('users.admin');
    }
    
    
    public function update(Request $request, User $user){
        
        $request->validate([
            'name_user' => 'required|string|max:255',
            'select_user_rol' => 'required', 
            'email_user' => 'required|email|unique:users,email,' . $user->id,
            'pass_user' => 'nullable|min:6',
            'select_user_parroquia' => 'required|exists:parroquias,id',
        ]);
    
        $userData = [
            'name' => $request->input('name_user'),
            'rol' => $request->input('select_user_rol'),
            'email' => $request->input('email_user'),
            'parroquia_id' => $request->select_user_parroquia,
        ];
    
        // Verificar si se proporcionó una nueva contraseña
        if ($request->filled('pass_user')) {
            $userData['password'] = bcrypt($request->input('pass_user'));
        }
    
        $user->update($userData);
        
        return redirect()->route('users.admin');
    }
    

    public function destroy(User $user){
        $user -> delete();

        return redirect()->route('users.admin');
    }

}
