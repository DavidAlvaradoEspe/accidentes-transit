<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcUser;
use App\Models\AcAccident;
use Session;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function reg_user(){
        
        return view('reg_users');
    }
    public function save_user(Request $request){
        
        $this->validate($request,[
            'us_ic' => 'required|integer|digits:10',
            'us_name' => 'required|string|min:1|max:40',
            'us_last_name' => 'required|string|min:1|max:40',
            'us_phone' => 'required|regex:/^[0-9]{10}$/'
        ]);
        $user = new AcUser;
        $user->us_ic= $request->us_ic;
        $user->us_name= $request->us_name;
        $user->us_last_name= $request->us_last_name;
        $user->us_phone= $request->us_phone;
        $user->save();
        Session::flash('mensaje',"El usuario  $request->us_name $request->us_last_name
                        ha sido guardado correctamente");
        return redirect()->route('show_user');
        
    }
    public function show_user(){
        $all_users = AcUser::all();
        return view('users')
        ->with('all_users',$all_users);
    }
    public function delete_user($us_id){
        $find_users = AcAccident::where('us_id',$us_id)->get();
        $count_users = count($find_users);
        if($count_users==0){
        $users = AcUser::find($us_id);
        $users -> delete();
        Session::flash('mensaje',"El usuario ha sido 
        eliminado correctamente");}
        else{
            Session::flash('mensaje',"No se ha podido eliminar 
                             usuario dedibo a que esta siendo 
                             utilizado por otra tabla"); 
        }
        return redirect()->route('show_user');

    }
    public function edit_user($us_id){
        $all_users = AcUser::where('us_id',$us_id)->get();
        return view('edit_users')
        ->with('all_users',$all_users[0]);
        
    }
    public function save_user_changes(Request $request){
        $this->validate($request,[
            'us_ic' => 'required|integer|digits:10',
            'us_name' => 'required|string|min:1|max:40',
            'us_last_name' => 'required|string|min:1|max:40',
            'us_phone' => 'required|regex:/^[0-9]{10}$/'
        ]);
        $user = AcUser::find($request->us_id);
        $user->us_ic= $request->us_ic;
        $user->us_name= $request->us_name;
        $user->us_last_name= $request->us_last_name;
        $user->us_phone= $request->us_phone;
        $user->save();
        Session::flash('mensaje',"El usuario  $request->us_name $request->us_last_name
        ha sido modificado correctamente");
        return redirect()->route('show_user');

    }
    
}