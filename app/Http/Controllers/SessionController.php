<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class SessionController extends Controller
{
    public function addSession()
    {
        $sessions = Session::latest()->paginate(5);
        return view('admin.session.create', compact('sessions'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
               //Get all modules
               $sessions = Session::latest()->paginate(50);
             
               return view('admin.session.index', compact('sessions'));
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(0000, 9999);
        } while (Session::where("code_session", "=", $code)->first());
  
        return $code;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validation
        $validated = $request->validate([
            'numero_session' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'statut' => '',


        ]);

        if($request->statut ==='on'){
            try{

            
            Session::insert([
                'code_session'=> $this->generateUniqueCode(),
                'numero_session'=> $request->numero_session,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'statut' =>"active",
                'created_at'=>Carbon::now(),
            ]);
            return Redirect()->route('all.session')->with('success', 'Successfully added a Session!!');
           
            }catch(\Exception $e){
                return Redirect()->route('all.session')->with('error', 'Can t add!!');
                

            }
        }else{
            try{ 
                Session::insert([
                    'code_session'=> $this->generateUniqueCode(),
                    'numero_session'=> $request->numero_session,
                    'date_debut' => $request->date_debut,
                    'date_fin' => $request->date_fin,
                    'statut' => "inactive",
                    'created_at'=>Carbon::now(),
                ]);
                 
                 return Redirect()->route('all.session')->with('success', 'Successfully added a Session!!'); 
  
                }catch(\Exception $e){
                  
                return Redirect()->back()->with('error', 'Can t add!!');
            }
        }
         
         

    }
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //To show a session
        $sessions = DB::table('sessions')->where('id', $id)->first();
        return view('admin.session.show', compact('sessions'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update the a session

        $validated = $request->validate([
            'numero_session' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'statut' => '',


        ]);

        if($request->statut ==='on'){
            try{

            
            Session::find($id)->update([
                'code_session'=> $this->generateUniqueCode(),
                'numero_session'=> $request->numero_session,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'statut' =>"active",
                'created_at'=>Carbon::now(),
            ]);
            return Redirect()->route('all.session')->with('success', 'Successfully added a Session!!');
           
            }catch(\Exception $e){
                return Redirect()->route('all.session')->with('error', 'Can t add!!');
                

            }
        }else{
            try{ 
                Session::find($id)->update([
                    'code_session'=> $this->generateUniqueCode(),
                    'numero_session'=> $request->numero_session,
                    'date_debut' => $request->date_debut,
                    'date_fin' => $request->date_fin,
                    'statut' => "inactive",
                    'created_at'=>Carbon::now(),
                ]);
                 
                 return Redirect()->route('all.session')->with('success', 'Successfully added a Session!!'); 
  
                }catch(\Exception $e){
                  
                return Redirect()->back()->with('error', 'Can t add!!');
            }
        }
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pdelete = Session::find($id)->Delete();

        return Redirect()->back()->with('success', 'Session  Deleted!!');
    }


    public function edit($id){
        $sessions = DB::table('sessions')->where('id', $id)->first();
        return view('admin.session.edit', compact('sessions'));
    }

    public function SoftDelete($id){
        //$softdelete = Session::find($id)->delete();

        //return Redirect()->back()->with('success', 'Successfully Deleted!!'); 

    }
}
