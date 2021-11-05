<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcUser;
use App\Models\AcAccident;
use Session;
class AccidentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function reg_accident(){
        
        $users = AcUser::orderBy('us_last_name')->get();
        return view('reg_accidents')
                ->with('users',$users);
    }
    public function save_accident(Request $request){
        $this->validate($request,[
            'ac_type' => 'required',
            'ac_severity' => 'required',
            'ac_description' => 'required|string|min:1|max:300',
            'us_id' => 'required'
        ]);
        $accident = new AcAccident;
        $accident->ac_type = $request->ac_type;
        $accident->ac_severity = $request->ac_severity;
        $accident->ac_description = $request->ac_description;
        $accident->us_id = $request->us_id;
        $accident->save();
        Session::flash('mensaje',"El accidente ha sido
                         guardado correctamente");
        return redirect()->route('show_accident');
    }
    public function show_accident(){
        $s_accident = AcAccident::join('ac_users','ac_accidents.us_id','=','ac_users.us_id')
                                ->select('ac_accidents.ac_id','ac_accidents.ac_type', 'ac_accidents.ac_severity',
                                        'ac_accidents.ac_description','ac_users.us_last_name', 
                                        'ac_users.us_name','ac_users.us_ic')
                                ->orderBy('ac_users.us_last_name')
                                ->get();
        return view('accidents')
                ->with('s_accident',$s_accident);
        
    }
    public function delete_accident($ac_id){
        $accident = AcAccident::find($ac_id);
        $accident-> delete();
        Session::flash('mensaje',"El accidente ha sido
        eliminado correctamente");
return redirect()->route('show_accident');
    }
    public function edit_accident($ac_id){
        $all_accidents = AcAccident::join('ac_users','ac_accidents.us_id','=','ac_users.us_id')
        ->select('ac_accidents.ac_id','ac_accidents.ac_type', 'ac_accidents.ac_severity',
                'ac_accidents.ac_description','ac_users.us_last_name', 
                'ac_users.us_name','ac_users.us_ic', 'ac_users.us_id')
        ->where('ac_id',$ac_id)
        ->get();
        $users = AcUser::orderBy('us_last_name')->get();
        return view('edit_accidents')
        ->with('all_accidents',$all_accidents[0])
        ->with('users',$users);
        
    }
    public function save_accident_changes(Request $request){
        $this->validate($request,[
            'ac_type' => 'required',
            'ac_severity' => 'required',
            'ac_description' => 'required|string|min:1|max:300',
            'us_id' => 'required'
        ]);
        $accident = AcAccident::find($request->ac_id);
        $accident->ac_type = $request->ac_type;
        $accident->ac_severity = $request->ac_severity;
        $accident->ac_description = $request->ac_description;
        $accident->us_id = $request->us_id;
        $accident->save();
        Session::flash('mensaje',"El accidente ha sido
        modificado correctamente");
return redirect()->route('show_accident');
    }
    
}