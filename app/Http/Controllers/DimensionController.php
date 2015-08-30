<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use Auth;
use Session;
use App\Dimension as _MODEL;
use App\Objective;
use App\Initiative;
use App\Measure;
use App\Plan;
use App\ActualMeasure;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;

class DimensionController extends Controller
{
    /*
     * This controller as crud
     */
    public $controller = "dimensions";

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

       $this->viewData['user_id'] = (int) Auth::User()->id;

       $this->viewData['controller_heading'] = 'Dimensions';
       $this->viewData['controller_name'] = $this->controller;
       $this->viewData['whatisit'] = 'Dimension';



        $this->viewData['plans'] = Plan::where('user_id', $this->viewData['user_id'])->where('status', 0)->orderBy('name')->lists('name', 'id');

        $this->viewData['currentPlan'] = NULL;
        if(!empty($this->viewData['plans'])){
          $this->viewData['currentPlan'] = Plan::where('user_id', $this->viewData['user_id'])->where('status', 0)->orderBy('name')->get()->first();
        }

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

        if(!empty(Input::get('plan_id'))){
            $this->viewData['currentPlan'] = Plan::find(Input::get('plan_id'));
        }

        $list = _MODEL::leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
                ->where('plans.user_id', '=', $this->viewData['user_id'])
                ->where('plans.id', '=', $this->viewData['currentPlan']->id)
                ->select('dimensions.*')
                ->get();


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

        $this->viewData['dimension'] = $row;

        self::populateDimensionTabularAndGraph($id);



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
    private function populateDimensionTabularAndGraph($dimension_id){

        $list = _MODEL::leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
             ->where('dimensions.id', '=', (int) $dimension_id)
             ->select('dimensions.*')
             ->get();

        $this->viewData['graphData'] = [];
        $this->viewData['graphData']['title'] = "BSC Report - Dimension: ".$list[0]->name;
        $this->viewData['graphData']['subtitle'] = "Report for ".$list[0]->name."'s objectives";
        $this->viewData['graphData']['data'] = [];

        foreach ($list as $row) {
            $row->AVERAGE = 0;
            // get objectives list related to dimension
            $objectives = $row->objectives;
            $objective_AVERAGE = 0;
            $objective_count = 0;
            $total_bojectives=0;
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
                            $measure->AVERAGE = (($measure->actual / $measure->target) * 100);
                        }
                        $measure_count++;
                    }
                    $initiative->measures  = $measures;
                    //end measures
                    if ($measure_count != 0) {
                        $initiative_AVERAGE+=$percent / $measure_count;
                        $initiative->AVERAGE = $percent / $measure_count;;
                    }

                    $initiative_count++;
                }
                // $objective->initiatives = $initiatives;
                //end initiative
                if ($initiative_count != 0){
                    $objective_AVERAGE+= $initiative_AVERAGE / $initiative_count;
                    $objective->AVERAGE = $initiative_AVERAGE / $initiative_count;
                }

                $objective_count++;

             }

             // $row->objectives = $objectives;

            if ($objective_count != 0){
                $row->AVERAGE= $objective_AVERAGE / $objective_count;
            }

           }


          $this->viewData['plan_dimensions'] = $list;

          self::populateDimensionGraph();
           // echo '<pre>';print_r($this->viewData['graphData']);die;print_r($this->viewData['plan_dimensions'][0]->objectives);

    }

     /**
     * Populate graph for dimensions by month
     *
     * @return void
     */
    public function populateDimensionGraph()
    {
          $dimension = $this->viewData['dimension'];
          $graph = [];  


          //$list = DB::select('call getActualMeasuresReport('.$this->viewData['user_id'].','.$this->viewData['measure_id'].');');


          $sql = "select
                    mon.mid as month_id,
                    mon.`name` as month_name,
                    report.*
                    
                from
                    months mon
                        left join
                    (select 
                        am.id as actual_measure_id,
                            sum(am.actual_measure) as actual_measure,
                            am.measure_id as measure_id,
                            am.`month` as actual_measure_month,
                            am.`status` as actual_measure_status,
                            p.period as period,
                            m.target as target,
                            p.starting_date as starting_date,
                            i.id as initiative_id,
                            i.`name` as initiative_name,
                            o.id as objective_id,
                            o.`name` as objective_name,
                            d.id as dimension_id,
                            d.`name` as dimension_name,
                            u.id as user_id,
                            u.`name` as user_name
                    from
                        actual_measures am
                    inner join measures m ON am.measure_id = m.id
                        
                    inner join initiatives i ON m.initiative_id = i.id 
                    inner join objectives o ON i.objective_id = o.id 
                    inner join dimensions d ON o.dimension_id = d.id and d.id = ".$dimension->id."
                    inner join plans p ON d.plan_id = p.id
                    inner join users u ON p.user_id = u.id
                    where
                        u.id = ".$this->viewData['user_id']."
                    group by am.`month`
                    order by am.`month`) as report ON mon.mid = report.actual_measure_month
                    order by mon.mid;";

          $list = DB::select($sql);

          // var_dump($list);die;

          $graph['title'] = "BSC Report: ".$dimension->name;
          $graph['subtitle'] = "Monthly and Cumulative";
          
          $graph['columnName'] = "Cumulative";
          $graph['columnValueSuffix'] = " ";
          $graph['columnData'] = [];
          
          $graph['splineName'] = "Monthly";
          $graph['splineValueSuffix'] = " ";
          $graph['splineData'] = [];
          $total_actuals=0;
          foreach ($list as $key => $value) {
              $actual = is_null($value->actual_measure) ? 0.0 : (float) $value->actual_measure;
              $total_actuals += $actual;
              array_push($graph['columnData'], round($total_actuals, 1));
              array_push($graph['splineData'], round($actual,1));
          }
       
        
          $this->viewData['graph'] = json_encode($graph);

    }    
}
