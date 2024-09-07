<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\TODOLIST;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Session;
class TODOLISTController extends Controller
{
	public function index(Request $request){  
		return view('TODOLIST',["title" =>'TO DO LIST']);
	}


	public function Show_Task(Request $request){

		$data = TODOLIST::where('Status' ,1)->get();
		return view('List',["title" =>'TO DO LIST',
					'data' => $data]);
	}

	public function Destroy(Request $request){
		TODOLIST::where('id',$request->id)->delete();
		return json_encode(["status" =>"true" , "msg" =>"Done" ]);
	}

	public function AddTaskComplete(Request $request){
		$users = Auth::id();
		$update = TODOLIST::where('id',$request->id)->update(["Status" => 2]);
		if($update){
			return json_encode(["status" =>"true" , "msg" =>"Done" ]);
		}
		else{
			return json_encode(["status" =>"false" ,"msg" =>"" ]);
		}


	}

	public function AllList(Request $request){
		$data = TODOLIST::get();
		return view('ShowList',["title" =>'TO DO LIST',
					'data' => $data]);
	}

	public function store(Request $request){  
		$inst =TODOLIST::insertGetId(["Task" => $request->Task]);
		if($inst){
		return json_encode(["status" =>"true" , "msg" =>"Added" ]);
		}
		else{
			return json_encode(["status" =>"false" ,"msg" =>"" ]);
		}

	}

	public function CheckList(Request $request){
		$find =TODOLIST::where('Task', $request->Task)->first();
		if(!empty($find)){
			return 'true';
		}
		else{
			return 'false';
		}
	}


}
