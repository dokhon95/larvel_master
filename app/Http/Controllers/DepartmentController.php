<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequset;
use App\Department;

class DepartmentController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {//getlist
        $department = Department::select('id','name','phone')->orderBy('id','DESC')->get();        
        return view('department.list', compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {//getadd
        return view('department.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(DepartmentRequset $request) {//postadd
        //create $department
        $department = new Department;

        //check post dat
        $department->name = $request->name;
        $department->phone = $request->phone;

        $department->save();
        return redirect()->route('department.index')->with(['flash_level' => 'success', 'flash_message' => trans('/MESSAGES.ADDDEPARTMENT')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {//getfirst
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {//getedit
        //find Department by id
        $data= Department::find($id);
        //check id 
        if(!$data){
            return redirect()->route('department.index')->with(['flash_level'=>'error','flash_message' => trans('/MESSAGES.NOTDEPARTMENT')]);
        }
        return view('department.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request) {//postedit
        //find Department by id
        $department = Department::find($id);
        
        $department->name = $request->name;
        $department->phone = $request->phone;
        
        $department->save();
        return redirect()->route('department.index')->with(['flash_level'=>'success','flash_message' => trans('/MESSAGES.UPDATEDEPARTMENT')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {//getdelete
        //find by Department by id
        $data= Department::find($id);
        //check id
        if(!$data){
            return redirect()->route('department.index')->with(['flash_level'=>'error','flash_message' => trans('/MESSAGES.NOTDEPARTMENT')]);
        }
        $data->delete();
        return readdir()->route('department.index')->with(['flash_level'=>'success','flash_message' => trans('/MESSAGES.DELETEDEPARTMENT')]);;
    }

}
