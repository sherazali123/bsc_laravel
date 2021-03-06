<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use Auth;
use Session;
use App\Plan;
use App\Measure as _MODEL;
use App\Dimension;
use App\Objective;
use App\Initiative;
use App\ActualMeasure;
use App\Http\Requests;
use Input;
use App\Http\Controllers\Controller;

class MeasureController extends Controller {
    /*
     * This controller as crud
     */

    public $controller = "measures";

    /*
     * This controller common view data
     */
    public $viewData = array();

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->viewData['user_id'] = (int) Auth::User()->id;

        $this->viewData['controller_heading'] = 'Measures';
        $this->viewData['controller_name'] = $this->controller;
        $this->viewData['whatisit'] = 'Measure';


        $this->viewData['plans'] = Plan::where('user_id', $this->viewData['user_id'])
                                        ->where('status', 0)
                                        ->orderBy('name')
                                        ->lists('name', 'id');


        $this->viewData['currentPlan'] = NULL;
        if(!empty($_GET['plan_id'])){
            $this->viewData['currentPlan'] = Plan::find($_GET['plan_id']);
        }
        else if(!empty($this->viewData['plans'])){
          $this->viewData['currentPlan'] = Plan::where('user_id', $this->viewData['user_id'])
                                        ->where('status', 0)
                                        ->orderBy('name')
                                        ->get()
                                        ->first();  
        }


        $this->viewData['dimensions'] = Dimension::leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
                                        ->where('plans.user_id', $this->viewData['user_id'])
                                        ->where('dimensions.plan_id', $this->viewData['currentPlan']->id)
                                        ->where('dimensions.status', 0)
                                        ->orderBy('dimensions.name')
                                        ->select('dimensions.*')
                                        ->lists('dimensions.name', 'dimensions.id');

        $this->viewData['currentDimension'] = NULL;
        if(!empty($_GET['dimension_id'])){
            $this->viewData['currentDimension'] = Dimension::find($_GET['dimension_id']);
        }
        else if(!empty($this->viewData['dimensions'])){
            $this->viewData['currentDimension'] = Dimension::where('dimensions.plan_id', $this->viewData['currentPlan']->id)
                                                            ->where('dimensions.status', 0)
                                                            ->orderBy('dimensions.name')
                                                            ->get()
                                                            ->first();
        }

        $this->viewData['currentDimensionId'] = !empty($this->viewData['currentDimension']) ? $this->viewData['currentDimension']->id : '';

        $this->viewData['objectives'] = Objective::leftJoin('dimensions', 'dimensions.id', '=', 'objectives.dimension_id')
                                        ->leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
                                        ->where('plans.user_id', '=', $this->viewData['user_id'])
                                        ->where('objectives.dimension_id', '=', $this->viewData['currentDimensionId'])
                                        ->where('objectives.status', 0)
                                        ->orderBy('objectives.name')
                                        ->select('objectives.*')
                                        ->lists('objectives.name', 'objectives.id');

        $this->viewData['currentObjective'] = NULL;
        if(!empty($_GET['objective_id'])){
            $this->viewData['currentObjective'] = Objective::find($_GET['objective_id']);
        }
        else if(!empty($this->viewData['objectives'])){
            $this->viewData['currentObjective'] = Objective::where('objectives.dimension_id', '=', !empty($this->viewData['currentDimension']) ? $this->viewData['currentDimension']->id : NULL)
                                                ->where('objectives.status', 0)
                                                ->orderBy('objectives.name')
                                                ->get()
                                                ->first();
        }

        $this->viewData['currentObjectiveId'] = !empty($this->viewData['currentObjective']) ? $this->viewData['currentObjective']->id : '';

        $this->viewData['initiatives'] = Initiative::leftJoin('objectives', 'objectives.id', '=', 'initiatives.objective_id')
                ->leftJoin('dimensions', 'dimensions.id', '=', 'objectives.dimension_id')
                ->leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
                ->where('plans.user_id', '=', $this->viewData['user_id'])
                ->where('initiatives.objective_id', '=', $this->viewData['currentObjectiveId'])
                ->where('initiatives.status', 0)
                ->orderBy('initiatives.name')
                ->select('initiatives.*')
                ->lists('initiatives.name', 'initiatives.id');


        $this->viewData['periods'] = array(1 => 'Yearly', 2 => 'Quaterly', 3 => 'Monthly');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        // $list = _MODEL::all();

        $list = _MODEL::leftJoin('initiatives', 'initiatives.id', '=', 'measures.initiative_id')
                ->leftJoin('objectives', 'objectives.id', '=', 'initiatives.objective_id')
                ->leftJoin('dimensions', 'dimensions.id', '=', 'objectives.dimension_id')
                ->leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
                ->where('plans.user_id', '=', $this->viewData['user_id'])
                ->where('plans.id', '=', $this->viewData['currentPlan']->id)
                ->select('measures.*')
                ->get();
                
        foreach ($list as $row) {
            //Calculate actual 
            $row->actual = ActualMeasure::where('actual_measures.measure_id', '=', (int) $row->id)->sum('actual_measures.actual_measure');
            if ($row->target != 0)
                $row->percent = (($row->actual / $row->target) * 100);
        }
        return view($this->controller . '.index', compact('list'), $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view($this->controller . '.create', $this->viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $row = Request::all();

        _MODEL::create($row);

        Session::flash('message', $this->viewData['whatisit'] . ' created!');
        Session::flash('alert-class', 'alert-success');

        return redirect($this->controller);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $row = _MODEL::find($id);
        return view($this->controller . '.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $row = _MODEL::find($id);
        return view($this->controller . '.edit', compact('row'), $this->viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $rowUpdate = Request::all();
        $row = _MODEL::find($id);
        $row->update($rowUpdate);

        Session::flash('message', $this->viewData['whatisit'] . ' updated!');
        Session::flash('alert-class', 'alert-success');


        return redirect($this->controller);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        _MODEL::find($id)->delete();

        Session::flash('message', $this->viewData['whatisit'] . ' deleted!');
        Session::flash('alert-class', 'alert-danger');

        return redirect($this->controller);
    }

}
