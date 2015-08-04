<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use Auth;
use Session;
use App\ActualMeasure as _MODEL;
use App\Measure;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActualMeasureController extends Controller
{
    /*
     * This controller as crud
     */
    public $controller = "actual_measures";

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

       $this->viewData['controller_heading'] = 'Actual Measures';
       $this->viewData['controller_name'] = $this->controller;
       $this->viewData['whatisit'] = 'Actual Measure';


       $this->viewData['months'] = array(1 => 'Jan', 2 => 'Feb', 3 =>  'Mar', 4 => 'Apr', 5 => 'May' ,6 => 'Jun', 7 => 'Jul', 8 =>  'Aug',9 => 'Sept', 10 => 'Oct', 11 =>  'Nov',12 => 'Dec', 2 => 'Feb', 3 =>  'Mar',1 => 'Jan', 2 => 'Feb', 3 =>  'Mar');

       $this->viewData['measures'] = Measure::leftJoin('initiatives', 'initiatives.id', '=', 'measures.initiative_id')
                                                  ->leftJoin('objectives', 'objectives.id', '=', 'initiatives.objective_id')
                                                  ->leftJoin('dimensions', 'dimensions.id', '=', 'objectives.dimension_id')
                                                  ->where('dimensions.user_id', '=', (int)$this->viewData['user_id'])
                                                  ->where('initiatives.status', 0)
                                                  ->orderBy('initiatives.name')
                                                  ->select('initiatives.*')
                                                  ->lists('initiatives.name','initiatives.id');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($measureId)
    {
        // $list = _MODEL::all();

        $this->viewData['measure_id'] = $measureId;

        $this->viewData['measure'] = Measure::find($measureId);

        $list = _MODEL::leftJoin('measures', 'measures.id', '=', 'actual_measures.measure_id')
                      ->leftJoin('initiatives', 'initiatives.id', '=', 'measures.initiative_id')
                      ->leftJoin('objectives', 'objectives.id', '=', 'initiatives.objective_id')
                      ->leftJoin('dimensions', 'dimensions.id', '=', 'objectives.dimension_id')
                      ->where('actual_measures.measure_id', '=', (int)$this->viewData['measure_id'])
                      ->where('dimensions.user_id', '=', (int)$this->viewData['user_id'])
                      ->select('actual_measures.*')
                      ->get();
        return view($this->controller.'.index',compact('list'), $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($measureId)
    {
        $this->viewData['measure_id'] = $measureId;

        return view($this->controller.'.create', $this->viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, $measureId)
    {
        $row = Request::all();

        $row['measure_id']= $measureId;
        _MODEL::create($row);

        Session::flash('message', $this->viewData['whatisit'].' created!');
        Session::flash('alert-class', 'alert-success');

        return redirect('measures'.'/'.$measureId.'/'.$this->controller);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($measureId, $actualMeaserId)
    {
        $row = _MODEL::find($actualMeaserId);
        return view($this->controller.'.show',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($measureId, $actualMeaserId)
    {

        $this->viewData['measure_id'] = $measureId;

        $row = _MODEL::find($actualMeaserId);

        return view($this->controller.'.edit',compact('row'), $this->viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $measureId, $actualMeaserId)
    {
        $rowUpdate = Request::all();
        $row = _MODEL::find($actualMeaserId);
        $row->update($rowUpdate);

        Session::flash('message', $this->viewData['whatisit'].' updated!');
        Session::flash('alert-class', 'alert-success');


        return redirect('measures'.'/'.$measureId.'/'.$this->controller);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($measureId, $actualMeaserId)
    {
          $this->viewData['measure_id'] = $measureId;

         _MODEL::find($actualMeaserId)->delete();

         Session::flash('message', $this->viewData['whatisit'].' deleted!');
         Session::flash('alert-class', 'alert-danger');

         return redirect('measures'.'/'.$measureId.'/'.$this->controller);
    }
}
