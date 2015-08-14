<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use Auth;
use Session;
use App\Plan;
use App\Initiative as _MODEL;
use App\Objective;
use App\Measure;
use App\ActualMeasure;
use App\Http\Requests;
use Input;
use App\Http\Controllers\Controller;

class InitiativeController extends Controller {
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
    public function __construct() {
        $this->middleware('auth');
        $this->viewData['user_id'] = (int) Auth::User()->id;

        $this->viewData['controller_heading'] = 'Initiatives';
        $this->viewData['controller_name'] = $this->controller;
        $this->viewData['whatisit'] = 'Initiative';


        $this->viewData['plans'] = Plan::where('user_id', $this->viewData['user_id'])->where('status', 0)->orderBy('name')->lists('name', 'id');

        $this->viewData['currentPlan'] = NULL;
        if(!empty($this->viewData['plans'])){
          $this->viewData['currentPlan'] = Plan::where('user_id', $this->viewData['user_id'])->where('status', 0)->orderBy('name')->get()->first();  
        }



        $this->viewData['objectives'] = Objective::leftJoin('dimensions', 'dimensions.id', '=', 'objectives.dimension_id')
                ->leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
                ->where('plans.user_id', '=', $this->viewData['user_id'])
                ->where('objectives.status', 0)
                ->orderBy('objectives.name')
                ->select('objectives.*')
                ->lists('objectives.name', 'objectives.id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        // $list = _MODEL::all();

        if(!empty($_GET['plan_id'])){
            $this->viewData['currentPlan'] = Plan::find($_GET['plan_id']);
        }


        $list = _MODEL::leftJoin('objectives', 'objectives.id', '=', 'initiatives.objective_id')
                ->leftJoin('dimensions', 'dimensions.id', '=', 'objectives.dimension_id')
                ->leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
                ->where('plans.user_id', '=', $this->viewData['user_id'])
                ->where('plans.id', '=', $this->viewData['currentPlan']->id)
                ->select('initiatives.*')
                ->get();
                
        foreach ($list as $row) {

            //get measures related to initiative
            $measures = Measure::where('measures.initiative_id', '=', (int) $row->id)
                    ->select('*')
                    ->get();

            $percent = 0;
            $row->AVERAGE = 0;
            $measure_count = 0;
            foreach ($measures as $measure) {
                $measure->actual = ActualMeasure::where('actual_measures.measure_id', '=', (int) $measure->id)->sum('actual_measures.actual_measure');
                if ($measure->target != 0)
                    $percent+=(($measure->actual / $measure->target) * 100);
                $measure_count++;
            }
            //end initiative
            if ($measure_count != 0)
                $row->AVERAGE = $percent / $measure_count;
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

        $this->viewData['controller_heading'] = $row->name;

        $this->viewData['initiative'] = $row;

        self::populateInitiativeTabular($id);

        return view($this->controller.'.show',compact('row'), $this->viewData);
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

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    private function populateInitiativeTabular($initiative_id){

        $list = _MODEL::leftJoin('objectives', 'objectives.id', '=', 'initiatives.objective_id')
             ->leftJoin('dimensions', 'dimensions.id', '=', 'objectives.dimension_id')
             ->leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
             ->where('initiatives.id', '=', (int) $initiative_id)
             ->select('initiatives.*')
             ->get();
           
                $initiative_AVERAGE = 0;
                $initiative_count = 0;
                foreach ($list as $initiative) 
                {
                    // get measures related to initiative
                    $measures = $initiative->measures;
                    $measure_count = 0;
                    $percent = 0;
                    foreach ($measures as $measure) 
                    {
                        
                        $measure->percent = 0;

                        $measure->actual = ActualMeasure::where('actual_measures.measure_id', '=', (int) $measure->id)->sum('actual_measures.actual_measure');
                        if ($measure->target != 0)
                        {
                            $percent+=(($measure->actual / $measure->target) * 100);
                            $measure->AVERAGE = (($measure->actual / $measure->target) * 100);
                        }
                        $measure_count++;
                    }
                    $initiative->measures  = $measures;
                    //end measures
                    if ($measure_count != 0) {
                        $initiative_AVERAGE+=$percent / $measure_count;
                        $initiative->AVERAGE = $initiative_AVERAGE;
                    }
 
                    $initiative_count++;
                }
                
             
           
            

          $this->viewData['initiatives'] = $list;;

    } 
}
