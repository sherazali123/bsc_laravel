<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use Auth;
use Session;
use App\Plan as _MODEL;
use App\Dimension;
use App\Objective;
use App\Initiative;
use App\Measure;
use App\ActualMeasure;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    /*
     * This controller as crud
     */
    public $controller = "plans";

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

       $this->viewData['controller_heading'] = 'Plans';
       $this->viewData['controller_name'] = $this->controller;
       $this->viewData['whatisit'] = 'Plan';


       $this->viewData['periods'] = array(1 => 'Yearly', 2 => 'Quaterly', 3 => 'Monthly');

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
        $this->viewData['user_id'] = Auth::User()->id;

        $list = _MODEL::where('user_id', '=', (int)$this->viewData['user_id'])->get();

        array_push($this->viewData['breadcrumb'], array());
        
           foreach ($list as $row) {
            $row->AVERAGE = 0;
            // get objectives list related to dimension
            $objectives = Objective::where('objectives.dimension_id', '=', (int) $row->id)
                    ->select('*')
                    ->get();
            $objective_AVERAGE = 0;
            $objective_count = 0;
            
             foreach ($objectives as $objective) {
                 
                 //get initiatives related to objective
                 $initiatives = Initiative::where('initiatives.objective_id', '=', (int) $objective->id)
                    ->select('*')
                    ->get();
            $initiative_AVERAGE = 0;
            $initiative_count = 0;
            foreach ($initiatives as $initiative) {
                
                //get measures related to initiative
                $measures = Measure::where('measures.initiative_id', '=', (int) $initiative->id)
                        ->select('*')
                        ->get();
                $measure_count = 0;
                $percent = 0;
                foreach ($measures as $measure) {
                    $measure->actual = ActualMeasure::where('actual_measures.measure_id', '=', (int) $measure->id)->sum('actual_measures.actual_measure');
                    if ($measure->target != 0)
                        $percent+=(($measure->actual / $measure->target) * 100);
                    $measure_count++;
                }
                //end measures
                if ($measure_count != 0)
                    $initiative_AVERAGE+=$percent / $measure_count;

                $initiative_count++;
            }
            //end initiative
                if ($initiative_count != 0)
                $objective_AVERAGE+= $initiative_AVERAGE / $initiative_count;
                 
            $objective_count++;
             }
             
            if ($objective_count != 0)
                $row->AVERAGE= $objective_AVERAGE / $objective_count;
           }
           

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
        $this->viewData['user_id'] = (int)Auth::User()->id;

        $row['user_id'] = $this->viewData['user_id'];
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

        $this->viewData['controller_heading'] = $row->name;

        $this->viewData['plan'] = $row;

        self::populateDimensionsTabular($id);
        

        return view($this->controller.'.show',compact('row'), $this->viewData);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    private function populateDimensionsTabular($plan_id){

        $list = Dimension::leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
             ->where('plans.id', '=', (int) $plan_id)
             ->select('dimensions.*')
             ->get();
        foreach ($list as $row) {
            $row->AVERAGE = 0;
            // get objectives list related to dimension
            $objectives = $row->objectives;
            $objective_AVERAGE = 0;
            $objective_count = 0;
            
             foreach ($objectives as $objective) 
             {
                $objective->AVERAGE = 0; 
                 //get initiatives related to objective
                 $initiatives = $objective->initiatives;
                $initiative_AVERAGE = 0;
                $initiative_count = 0;
                foreach ($initiatives as $initiative) 
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
                            $measure->AVERAGE = $percent;
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
                // $objective->initiatives = $initiatives;
                //end initiative
                if ($initiative_count != 0){
                    $objective_AVERAGE+= $initiative_AVERAGE / $initiative_count;
                    $objective->AVERAGE = $objective_AVERAGE;
                }
                 
                $objective_count++;
             }
             
             // $row->objectives = $objectives;

            if ($objective_count != 0){
                $row->AVERAGE= $objective_AVERAGE / $objective_count;
            }

           }
            

          $this->viewData['plan_dimensions'] = $list;;

    } 

}
