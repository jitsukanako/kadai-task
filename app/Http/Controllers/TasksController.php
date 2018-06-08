<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\tasks;  

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
  {
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = tasks::all()->where("user_id","=",$user->id);
        
            return view('tasks.index',[
                'tasks'=>$tasks,
            ]);
           
        }else {
            return view('welcome');
        }
  }
  
  public function create()
    {
        $tasks = new tasks;
        return view('tasks.create', [
            'tasks' => $tasks,
        ]);
    }
  
   public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'status'=>'required|max:10',
        ]);
        
        
        $tasks = new tasks;
        $tasks->status = $request->status;  
        $tasks->content = $request->content;
        $tasks->user_id=\Auth::user()->id;
        $tasks->save();
        
        
        return redirect('/');
        
    }
    
        public function show($id)
    {
         if (\Auth::check()) {
        
             $tasks = tasks::find($id);
            if(\Auth::user()->id === $tasks->user_id){
        
                return view('tasks.show', [
                    'tasks' => $tasks,
                ]);
            }else{
                return view('welcome');
            }
         }else{
             return view('welcome');
         }
            
    }
        


    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    
    
    public function destroy($id)
    {
        $task = tasks::find($id);

        if (\Auth::user()->id === $task->user_id) {
            $task->delete();
        }

        return redirect('/');
    }
    
     public function edit($id)
   {
         $tasks = tasks::find($id);

        return view('tasks.edit', [
            'tasks' => $tasks,
       ]);
    }
 public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
         $tasks = tasks::find($id);
         $tasks->status = $request->status; 
       $tasks->content = $request->content;
        $tasks->save();

        return redirect('/');
    }

    
    
    
  
}
//    /**//
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
 //public function create()
 //   {
//        $tasks = new tasks;
//        return view('tasks.create', [
//            'tasks' => $tasks,
//        ]);
//    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
     
//    public function store(Request $request)
//    {
//        $this->validate($request, [
//            'status' => 'required|max:191',  
//            'content' => 'required|max:191',
//        ]);
//        
//          $tasks = new tasks;
//           $tasks->status = $request->status;  
//        $tasks->content = $request->content;
//        $tasks->save();
//        return redirect('/');
//        
//    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//         $tasks = tasks::find($id);

//        return view('tasks.show', [
//            'tasks' => $tasks,
//        ]);
//    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//         $tasks = tasks::find($id);
//
//        return view('tasks.edit', [
//            'tasks' => $tasks,
//       ]);
//    }

//    /**
//    * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
     
//    public function update(Request $request, $id)
//    {
//        $this->validate($request, [
//            'content' => 'required|max:191',
//        ]);
//         $tasks = tasks::find($id);
//         $tasks->status = $request->status; 
//       $tasks->content = $request->content;
//        $tasks->save();

//        return redirect('/');
//    }

//    /**
//    * Remove the specified resource from storage.
//    * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
        
//        $tasks = tasks::find($id);
//        $tasks->delete();

//        return redirect('/');
//    }
//}
