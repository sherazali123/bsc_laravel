<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use Auth;
use Session;
use App\User as _MODEL;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /*
     * This controller as crud
     */
    public $controller = "users";

    /*
     * This controller common view data
     */
    public $viewData = array();


    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
       $this->middleware('auth');

       $this->viewData['controller_heading'] = 'Manage Users';
       $this->viewData['controller_name'] = $this->controller;
       $this->viewData['whatisit'] = 'User';

       $this->viewData['breadcrumb'] = array(
         array('name' => 'Home', 'href' => '/'),
         array('name' =>  $this->viewData['controller_heading'], 'href' => $this->controller),
       );

    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $list = _MODEL::where('role', '=', '2')->get();

        array_push($this->viewData['breadcrumb'], array());

        return view($this->controller.'.index',compact('list'), $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->controller.'.create', $this->viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $row = Request::all();

        _MODEL::create($row);

        Session::flash('message', $this->viewData['whatisit'].' created!');
        Session::flash('alert-class', 'alert-success');

        return redirect($this->controller);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $row = _MODEL::find($id);
        return view($this->controller.'.show',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $row = _MODEL::find($id);
        return view($this->controller.'.edit',compact('row'), $this->viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rowUpdate = Request::all();
        $row = _MODEL::find($id);

        if(strlen(trim($rowUpdate['password'])) > 0){
            $rowUpdate['password']= bcrypt($rowUpdate['password']);
        } else{
            unset($rowUpdate['password']);
        }


        $row->update($rowUpdate);

        Session::flash('message', $this->viewData['whatisit'].' updated!');
        Session::flash('alert-class', 'alert-success');


        return redirect($this->controller.'/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
         _MODEL::find($id)->delete();
         Session::flash('message', $this->viewData['whatisit'].' deleted!');
         Session::flash('alert-class', 'alert-danger');

         return redirect($this->controller);
    }


    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return Response
    //  */
    // public function showBlock($id)
    // {
    //     $row = _MODEL::find($id);
    //     die;
    //     return view($this->controller.'.edit',compact('row'), $this->viewData);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  Request  $request
    //  * @param  int  $id
    //  * @return Response
    //  */
    // public function block(Request $request, $id)
    // {
    //     $rowUpdate = Request::all();
    //     $row = _MODEL::find($id);
    //     $row->update($rowUpdate);

    //     Session::flash('message', $this->viewData['whatisit'].' updated!');
    //     Session::flash('alert-class', 'alert-success');


    //     return redirect($this->controller.'/'.$id.'/edit');
    // }
}
