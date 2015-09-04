<div class="row-fluid" style="margin-bottom: 20px;">
        <div class="span12">
          <table class="table table-bordered table-invoice">
              <tbody>
                <tr>
                  <td class="width30">Initiative:</td>
                  <td class="width70"><strong>{{ $initiative->name }}</strong></td>
              </tr>
             
              <tr>
                <td>Objective:</td>
                <td>{{ $initiative->objective->name }}</td>
            </tr>
             <tr>
                <td>Dimension:</td>
                <td>{{ $initiative->objective->dimension->name }}</td>
            </tr>
              <tr>
                <td>Plan:</td>
                <td>{{ $initiative->objective->dimension->plan->name }}</td>
            </tr>
          </tbody></table>
        </div><!--span6-->

</div>
