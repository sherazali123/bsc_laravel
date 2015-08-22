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
use Input;
use DB;

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
       $this->viewData['user_id'] = (int)Auth::User()->id;

       $this->viewData['controller_heading'] = 'Actual Measures';
       $this->viewData['controller_name'] = $this->controller;
       $this->viewData['whatisit'] = 'Actual Measure';


       $this->viewData['months'] = array(1 => 'Jan', 2 => 'Feb', 3 =>  'Mar', 4 => 'Apr', 5 => 'May' ,6 => 'Jun', 7 => 'Jul', 8 =>  'Aug',9 => 'Sept', 10 => 'Oct', 11 =>  'Nov',12 => 'Dec', 2 => 'Feb', 3 =>  'Mar',1 => 'Jan', 2 => 'Feb', 3 =>  'Mar');

       $this->viewData['measures'] = Measure::leftJoin('initiatives', 'initiatives.id', '=', 'measures.initiative_id')
                                                  ->leftJoin('objectives', 'objectives.id', '=', 'initiatives.objective_id')
                                                  ->leftJoin('dimensions', 'dimensions.id', '=', 'objectives.dimension_id')
                                                  ->leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
                                                  ->where('plans.user_id', '=', $this->viewData['user_id'])
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
                      ->leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
                      ->where('actual_measures.measure_id', '=', (int)$this->viewData['measure_id'])
                      ->where('plans.user_id', '=', $this->viewData['user_id'])
                      ->select('actual_measures.*')
                      ->get();

                              
        $this->populateActualMeasureGraph();

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


    /**
     * Populate graph for actual measures
     *
     * @return void
     */
    public function populateActualMeasureGraph()
    {
          $measure = $this->viewData['measure'];
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
                        and am.measure_id = ".$this->viewData['measure_id']."
                    inner join initiatives i ON m.initiative_id = i.id
                    inner join objectives o ON i.objective_id = o.id
                    inner join dimensions d ON o.dimension_id = d.id
                    inner join plans p ON d.plan_id = p.id
                    inner join users u ON p.user_id = u.id
                    where
                        u.id = ".$this->viewData['user_id']."
                    group by am.`month`
                    order by am.`month`) as report ON mon.mid = report.actual_measure_month
                    order by mon.mid;";

          $list = DB::select($sql);

          // var_dump($list);die;

          $graph['title'] = "BSC Report: ".$measure->name;
          $graph['subtitle'] = "Monthly and Cumulative";
          
          $graph['columnName'] = "Cumulative";
          $graph['columnValueSuffix'] = " ";
          $graph['columnData'] = [];
          
          $graph['splineName'] = "Monthly";
          $graph['splineValueSuffix'] = " ";
          $graph['splineData'] = [];
          $total_actuals=0;
          foreach ($list as $key => $value) {
              $actual = is_null($value->actual_measure) ? 0.00 : (float) $value->actual_measure;
              $total_actuals += $actual;
              array_push($graph['columnData'], $total_actuals);
              array_push($graph['splineData'], $actual);
          }
          $graph['targetName'] = "Target";
          $graph['targetValueSuffix'] = " ";
          $graph['targetData'] = [];
          for($i=1; $i<=12; $i++){
           array_push($graph['targetData'], $this->viewData['measure']->target);
          }
          
          $this->viewData['graph'] = json_encode($graph);
    }

}
