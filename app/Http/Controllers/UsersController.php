<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse; 
use App\User;
use App\Category;

class UsersController extends Controller
{
    public function home() :View
	{
    	$users = User::all();
    	return view('home', ['users' => $users]);
    }

	/**
	 * @param request request
	 * 
	 * @return JsonResponse 
	 */
	public function load(Request $request) :JsonResponse
	{
		## Read value
		$draw = $request->get('draw');
		$start = $request->get("start");
		$rowperpage = $request->get("length"); // Rows display per page

		$columnIndex_arr = $request->get('order');
		$columnName_arr = $request->get('columns');
		$order_arr = $request->get('order');
		$search_arr = $request->get('search');

		$columnIndex = $columnIndex_arr[0]['column']; // Column index
		$columnName = $columnName_arr[$columnIndex]['data']; // Column name
		$columnSortOrder = $order_arr[0]['dir']; // asc or desc
		$searchValue = $search_arr['value']; // Search value

		if ($columnName == "category") {
			$columnName = "category_id";
		}

		if ($columnName == "action") {
			$columnName = "id";
		}

		$totalRecords = User::select('count(*) as allcount')->count();
		$totalRecordswithFilter = User::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();
	
		$records = User::orderBy($columnName,$columnSortOrder)
		->where('name', 'like', '%' .$searchValue . '%')
		->select('users.*')
		->skip($start)
		->take($rowperpage)
		->get();
   
		$data_arr = array();
		
		foreach($records as $record){
			$data_arr[] = array(
			 "id" => $record->id,
			 "name" => $record->name,
			 "email" => $record->email,
			 "category" => $record->category ? $record->category->name : "",
			 "action" => "<i class='material-icons' onclick=modalUpdate('{$record->id}') data-toggle='tooltip' title='Edit'>&#xE254;</i><i class='material-icons' onclick=modalDelete('{$record->id}') data-toggle='tooltip' title='Delete'>&#xE872;</i>"
		   );
		}

		$response = array(
		   "draw" => intval($request->get('draw')),
		   "iTotalRecords" => $totalRecords,
		   "iTotalDisplayRecords" => $totalRecordswithFilter,
		   "aaData" => $data_arr
		);
   
		return response()->json($response);
	}

	/**
	 * @param request request
	 * 
	 * @return view
	 */
	public function modal(Request $request) : view
	{
		$user = null;
		if ($request->get("id")) {
			$user = User::find($request->get("id"));
		}

		$categories = Category::all();
    	return view('modal', ["categories" => $categories, "user" => $user]);
	}

	/**
	 * @param request request
	 * 
	 * @return JsonResponse
	 */
    public function add(Request $request) :JsonResponse
	{
		if (!$request->input('name')) {
			return response()->json(["message" => "Name field is required"], 400);
		}

		if (!$request->input('email')) {
			return response()->json(["message" => "Email field is required"], 400);
		}

		$users = new User;
    	$users->name = $request->input('name');
    	$users->email = $request->input('email');
    	$users->category_id = $request->input('category_id');
    	$users->save();

		return response()->json(["message" => "User Created"]);
    }

	/**
	 * @param int id
	 * @param request request
	 * 
	 * @return JsonResponse
	 */
    public function update($id, Request $request) :JsonResponse
	{
		if (!$request->input('name')) {
			return response()->json(["message" => "Name field is required"], 400);
		}

		if (!$request->input('email')) {
			return response()->json(["message" => "Email field is required"], 400);
		}

    	$user = User::find($id);

		$user->name = $request->get("name"); 
		$user->email = $request->get("email"); 
		$user->category_id = $request->get("category_id");
		$user->save();

		return response()->json(["message" => "User Updated"]);
    }

	/**
	 * @param int id
	 * 
	 * @return JsonResponse
	 */
    public function delete($id) :JsonResponse
	{
    	$user = User::find($id);
		$user->delete();
		return response()->json(["message" => "User Deleted"]);
    }
}
