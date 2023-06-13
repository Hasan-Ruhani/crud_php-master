<?php

namespace App\Http\Controllers;

use App\Models\cruds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CrudController extends Controller
{
    function ShowData(){
        // $showData = cruds::all();          //show all data in one page
        // $showData = cruds::paginate(5);    //pagination numbaric style
        $showData = cruds::simplePaginate(5);     //pagination character style  --  it use for show_data page
        return view('show_data', compact('showData'));    //pass crud data in $showData variable to show_data page
    }
    function AddData(){
        return view('add_data');
    }

    function StoreData(Request $request){
        $rules = [                                 //set validation arguments
            'name' => 'required|max:10',
            'email' => 'required|email',
        ];
        $cm =[                                    //set validation message that you visible any users
            'name.required' => 'Name is required',
            'name.max' => 'Name should not be 10 character over',
            'email.required' => 'Email must be required',
            'email.email' => 'Please enter a valid email',
        ];
        $this->validate($request, $rules, $cm);    //pass any arguments which arguments you check your validation method

        $crud = new cruds();                //cruds model set under $crud variable
        $crud -> name = $request -> name;         //$crud->name(database field name) & $request->name(form field name)
        $crud -> email = $request -> email;        //$crud->email(database field email) & $request->email(form field email)
        $crud -> save();
        Session::flash('msg', 'Data insart successfully!!');    //when data insart complete and click submit button so visible this message (now I'm use it in show-data page)
        return redirect('/home');     //when click submit this page redirect to root directory path or where you want

        // return $request -> all();     //return all data form your database 
    }

    function EditData($id = null){
        $editData = cruds::find($id);
        return view('edit_data', compact('editData'));   //pass crud data in $editData variable to edit_data page
    }

    function UpdateData(Request $request, $id){
        $rules = [                                 //set validation arguments
            'name' => 'required|max:10',
            'email' => 'required|email',
        ];
        $cm =[                                    //set validation message that you visible any users
            'name.required' => 'Name is required',
            'name.max' => 'Name should not be 10 character over',
            'email.required' => 'Email must be required',
            'email.email' => 'Please enter a valid email',
        ];
        $this->validate($request, $rules, $cm);    //pass any arguments which arguments you check your validation method

        $crud = cruds::find($id);                //find your selected id and store the $crud variable
        $crud -> name = $request -> name;         //$crud->name(database field name) & $request->name(form field name)
        $crud -> email = $request -> email;        //$crud->email(database field email) & $request->email(form field email)
        $crud -> save();
        Session::flash('msg', 'Data updated successfully!!');    //when data insart complete and click submit button so visible this message (now I'm use it in show-data page)
        return redirect('/home');     //when click submit this page redirect to root directory path or where you want

        // return $request -> all();     //return all data form your database 
    }

    function DeleteData($id = null){
        $deleteData = cruds::find($id);
        $deleteData -> delete();    //laravel 10 built in deleting system

        Session::flash('msg', 'Data Deleted successfully!!');    //when data Delete complete and click delete button than visible this message (now I'm use it in show-data page)
        return redirect('/home'); 
    }
}
