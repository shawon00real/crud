<?php

namespace App\Http\Controllers;

use App\Models\Curd;
use Illuminate\Http\Request;

class CurdController extends Controller
{

    protected $blogs;
    protected $edit;
    public $delete;
    public function createUser(){
        return view("createUser");
    }
    public function formData(Request $request){
        Curd::data($request);
        return redirect()->route('manage');
    }
    public function manageData(){
        $this->blogs = Curd::all();

        return view('manage' , ['blogs' => $this->blogs]);
    }
    public function deleteData($id){
        $this->delete = Curd::find($id);
        if (file_exists($this->delete->image)){
            unlink($this->delete->image);
        }
        $this->delete->delete();
        return redirect()->route('manage');
    }
    public function editUser($id){
        $this->edit = Curd::find($id);
        return view('edit' , ['edit' => $this->edit]);
    }
    public function updateForm(Request $request){

        Curd::updateData($request);
        return redirect()->route('manage');
    }
}
