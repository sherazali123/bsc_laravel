<div class="row-fluid" style="margin-bottom: 20px;">
        <div class="span6">
          <table class="table table-bordered table-invoice">
              <tbody>
                <tr>
                  <td class="width30">Measure:</td>
                  <td class="width70"><strong>{{ $measure->name }}</strong></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td>{{ $measure->description }}</td>
            </tr>
                <tr>
                  <td>Target:</td>
                  <td>{{ $measure->target }}</td>
              </tr>
              <tr>
                <td>Starting date:</td>
                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $measure->starting_date)->format('M j, Y') }}</td>
            </tr>
          </tbody></table>
        </div><!--span6-->

    </div>
