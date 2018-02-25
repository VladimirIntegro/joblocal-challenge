<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * 
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function index() {
        $todos = Todo::all();
        
        return response()->json($todos);
    }
    
    public function getOne($id){
        $todo = Todo::find($id);
        
        return response()->json($todo);
    }
    
    public function create(Request $request){
        $todo = Todo::create($request->all());
        
        return response()->json($todo);
    }
    
    public function delete($id){
        $todo = Todo::find($id);
        $todo->delete();
        
        return response()->json('deleted');
    }
    
    public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo->title = $request->input('title');
        $todo->completed = $request->input('completed');
        $todo->save();
        
        return response()->json($todo);
    }

}
