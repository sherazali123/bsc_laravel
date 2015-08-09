<div class="row-fluid" style="margin-bottom: 20px;">
        <div class="span12">
          <table class="table table-bordered table-invoice">
              <tbody>
                <tr>
                  <td class="width30">Objective:</td>
                  <td class="width70"><strong>{{ $objective->name }}</strong></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td>{{ $objective->description }}</td>
            </tr>
              <tr>
                <td>Dimension:</td>
                <td>{{ $objective->dimension->name }}</td>
            </tr>
              <tr>
                <td>Plan:</td>
                <td>{{ $objective->dimension->plan->name }}</td>
            </tr>
          </tbody></table>
        </div><!--span6-->

</div>
