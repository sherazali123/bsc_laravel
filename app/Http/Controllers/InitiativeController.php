<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use Auth;
use Session;
use App\Initiative as _MODEL;
use App\Objective;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InitiativeController extends Controller
{
    /*
     * This controller as crud
     */
    public $controller = "initiatives";

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
       $this->viewData['user_id'] = Auth::User()->id;

       $this->viewData['controller_heading'] = 'Initiatives';
       $this->viewData['controller_name'] = $this->controller;
       $this->viewData['whatisit'] = 'Initiative';


      $this->viewData['objectives'] = Objective::leftJoin('dimensions', 'dimensions.id', '=', 'objectives.dimension_id')
                                              ->where('dimensions.user_id', '=', (int)$this->viewData['user_id'])
                                              ->where('objectives.status', 0)
                                              ->orderBy('objectives.name')
                                              ->select('objectives.*')
                                              ->lists('objectives.name','objectives.id');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // $list = _MODEL::all();
        $list = _MODEL::leftJoin('objectives', 'objectives.id', '=', 'initiatives.objective_id')
                      ->leftJoin('dimensions', 'dimensions.id', '=', 'objectives.dimension_id')
                      ->where('dimensions.user_id', '=', (int)$this->viewData['user_id'])
                      ->select('initiatives.*')
                      ->get();
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
        $row->update($rowUpdate);

        Session::flash('message', $this->viewData['whatisit'].' updated!');
        Session::flash('alert-class', 'alert-success');


        return redirect($this->controller);
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
}