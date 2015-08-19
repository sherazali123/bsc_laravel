<?php

namespace App\Http\Controllers\Api;

// use Illuminate\Http\Request;
use Request;
use Auth;
use Session;
use App\Plan as _MODEL;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    /*
     * This controller as crud
     */
    public $controller = "api.plans";

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
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $this->viewData['success'] = true;      
        $this->viewData['content'] = [];

        $plan = _MODEL::find($id); // plan
        if(empty($plan)){
            $this->viewData['success'] = false;    
            return response()->json($this->viewData);
        }

        $this->viewData['content']['plan'] = $plan;

        $this->viewData['content']['plan']['dimensions'] = $plan->dimensions;

        return response()->json($this->viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }


}
