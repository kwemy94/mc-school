<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{

    public function addModule()
    {
        $modules = Module::latest()->get();
        return view('admin.module.create', compact('modules'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all modules
        $modules = Module::latest()->paginate(50);
        return view('admin.module.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function store(Request $request)
    {
        //This method is for creating a new module

        $validated = $request->validate([
            'code_module' => 'required|unique:modules|max:20',
            'nom_module' => 'required',
            'description' => 'required',
        ],
        [
            'code_module' => 'Please, enter the code of the module.',
            'nom_module' => 'Please, enter the name of the module',
            'description' => 'Please, enter the name of the module',

            
        ]);


        Module::insert([
            'code_module'=> $request->code_module,
           'nom_module'=> $request->nom_module,
           'description' => $request->description,
           'created_at'=>Carbon::now(),
       ]);

        return Redirect()->route('all.module')->with('success', 'Successfully added!!'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //To show a module
        $modules = DB::table('modules')->where('id', $id)->first();
        return view('admin.module.show', compact('modules'));
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
        // Update the a module

        $validated = $request->validate([

            'description' => 'required',
        ],
        [

            'description' => 'Please, enter the name of the module',

            
        ]);

        Module::find($id)->update([
        'code_module'=> $request->code_module,
           'nom_module'=> $request->nom_module,
           'description' => $request->description,
           'created_at'=>Carbon::now()

        ]);
        return Redirect()->route('all.module')->with('success', 'Successfully Updated!!'); 
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
        $pdelete = Module::find($id)->delete();

        return Redirect()->back()->with('success', 'Module permanently  Deleted!!');
    }

    public function edit($id){
        $modules = DB::table('modules')->where('id', $id)->first();
        return view('admin.module.edit', compact('modules'));
    }

    public function SoftDelete($id){
        $softdelete = Module::find($id)->delete();

        return Redirect()->back()->with('success', 'Successfully Deleted!!'); 

    }

    
}
