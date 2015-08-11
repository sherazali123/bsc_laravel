<?php 
namespace App\Http\Controllers;
use Request;
use Auth;
use Session;
use App\Dimension;
use App\Objective;
use App\Initiative;
use App\Measure;
use App\Plan;
use App\ActualMeasure;
use DB;
 
class DashBoardController extends Controller {
 
    /**
     * Create a new controller instance.
     * */
     public $controller = "dashboard";
     /*
     *  
     * This controller common view data
     */
    public $viewData = array();
    /*
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->viewData['user_id'] = (int) Auth::User()->id;
        $this->viewData['plans'] = Plan::where('user_id', $this->viewData['user_id'])->where('status', 0)->orderBy('name')->select('plans.*')
                ->get();

    }
 
    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
         $this->populatePlansGraph();
        return view('dashboard',compact('list'), $this->viewData);
    }
 
      /**
     * Populate graph for plans graph
     *
     * @return void
     */
    public function populatePlansGraph()
    {
          $graph = [];  
          $index=0;
            
            foreach ($this->viewData['plans'] as $plan) {
             $to_achived_plan=0; 
             $to_achived_plan_count=0;   
          $graph[$index]['id']=$plan->id;
          $graph[$index]['title'] =$plan->name.' from '.date('F, Y',strtotime($plan->starting_date)).' to '.date('F, Y',  strtotime($plan->ending_date));
          $graph[$index]['SeriesName'] = "Average";
          $graph[$index]['columnValueSuffix'] = " %";
          $graph[$index]['columnData'] = [];
          $dimensions = Dimension::leftJoin('plans', 'plans.id', '=', 'dimensions.plan_id')
                ->where('plans.user_id', '=', $this->viewData['user_id'])
                ->where('plans.id', '=', $plan->id)
                ->select('dimensions.*')
                ->get();
          $count=count($dimensions);
         
           foreach ($dimensions as $dimension){
          $dimension['name']=$dimension->name;
          $dimension_av= $this->getAverageDimension($dimension);
          $dimension['y']=$dimension_av->AVERAGE;
          $dimension['AVERAGE']=$dimension_av->AVERAGE;
          $dimension['link']= url('/dimensions/'.$dimension->id);
          array_push($graph[$index]['columnData'], $dimension);
          $to_achived_plan +=$dimension_av->AVERAGE;
          $to_achived_plan_count++;
            }
          $total_achived=$to_achived_plan/$to_achived_plan_count;
          $dimension2['name']='<span style="color:red;">Need to be achive plan</span>';
          $dimension2['y']=100-$total_achived;
          $dimension2['AVERAGE']=100-$total_achived;;
          $dimension2['link']= '#';
          array_push($graph[$index]['columnData'], $dimension2);
         $index++;
            }
          
      
          $this->viewData['graph'] = json_encode($graph);
    }

     public function getAverageDimension($dimension){
         
            $dimension->AVERAGE = 0;
            // get objectives list related to dimension
            $objectives = Objective::where('objectives.dimension_id', '=', (int) $dimension->id)
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
                $dimension->AVERAGE= (float)$objective_AVERAGE / $objective_count;


           return $dimension;
     }
}