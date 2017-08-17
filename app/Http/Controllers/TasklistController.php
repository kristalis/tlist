<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use \App\User;

class TasklistController extends Controller
{
    

/*

      public function __construct()
    {
       $this->middleware('auth:admin', ['except' => ['logout', 'logout']]);
    }*/

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasklists = \App\Tasklist::orderBy('created_at', 'desc')->get();
      //  getTotalTask($tasklists);
        return view('lists.index', ['tasklists' => $tasklists]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('lists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate Data
        $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
        ]);

        //store data
        $tasklists = new \App\Tasklist;
        $tasklists->owner_id = $request->user()->id;
        $tasklists->title = $request->title;
        $tasklists->description = $request->description;
        $tasklists->completed = $request->get('completed',0);
        $tasklists->save();
       // return view('lists.dashboard', ['tasklists' => $tasklists]); 
       return redirect()->action('UserController@index',['id'=>$tasklists->owner_id ])->with('status', 'Task Added Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //Get all the information associated with given ID 
        $tasklists = \App\Tasklist::find($id);
        //And return to show.blade.php file.
        return view('lists.show', ['tasklists' => $tasklists]);
    }

 /**
     * Show the form for displaying users task.
     *
     */

    public function dashboard()
    {
    // Get all the recordrs from posts table thorough Post model
        $tasklists = \App\Tasklist::all();
       return view('lists.dashboard');
   }
                            
                        

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasklists= \App\Tasklist::find($id);
        //And return to  edit.blade.php view file. 
        return view('lists.edit', ['tasklists' => $tasklists]);
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
       //validate
        $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
        ]);
        
        //store
        $tasklists = \App\Tasklist::find($id);
        $tasklists->owner_id = $request->user()->id;
        $tasklists->title = $request->title;
        $tasklists->description = $request->description;
        $tasklists->completed = $request->has('completed')? 1 : 0;
        $tasklists->save();
        //return with a success message
         return redirect()->action('UserController@index',['id'=>$tasklists->owner_id ])->with('status', 'Task Updated Successfully' );
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $tasklists = \App\Tasklist::find($id);
        if($tasklists && ($tasklists->owner_id == $request->user()->id || $request->user()->is_admin()))
        {
            $tasklists->delete();
            $data['status'] = 'Task deleted Successfully';
        }
        else 
        {
            $data['status'] = 'Invalid Operation. You have not sufficient permissions';
        }
         return redirect()->action('UserController@index',['id'=>$tasklists->owner_id ])->with( $data );
    }

}
