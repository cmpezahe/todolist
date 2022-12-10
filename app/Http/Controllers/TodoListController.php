<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ListItem;

class TodoListController extends Controller
{
    public function index(){
        // passing values
        return view('welcome',['listItems' =>listItem::where('is_complete',0)->get()]);
    }
     public function markComplete($id){

        $listItem = ListItem::find($id);
        $listItem-> is_complete =1;
        $listItem->save();

        // passing values
        return redirect('/');
    }
  
 
    //define the method 
    public function saveItem(Request $request){

        $newListItem = new ListItem;
        $newListItem -> name = $request->listItem;
        $newListItem->is_complete =0;
        $newListItem->save();
        // redirect to the main page (default route)
        return redirect('/');
    }

    }
    

