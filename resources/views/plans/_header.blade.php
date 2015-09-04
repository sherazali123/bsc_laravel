<div class="row-fluid" style="margin-bottom: 20px;">
        <div class="span12">
          <table class="table table-bordered table-invoice">
              <tbody>
                <tr>
                  <td class="width30">Plan:</td>
                  <td class="width70"><strong>{{ $plan->name }}</strong></td>
              </tr>
               <tr>
                  <td class="width30">Vision:</td>
                  <td class="width70"><strong>{{ $plan->vision }}</strong></td>
              </tr>
             
              <tr>
                  <td>Period:</td>
                  <td>{{ $periods[$plan->period] }}</td>
              </tr>
              <tr>
                <td>Start date:</td>
               <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $plan->starting_date)->format('M j, Y') }}</td> 
            </tr>
            <tr>
                <td>End date:</td>
               <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $plan->ending_date)->format('M j, Y') }}</td> 
            </tr>
          </tbody></table>
        </div><!--span6-->

</div>
