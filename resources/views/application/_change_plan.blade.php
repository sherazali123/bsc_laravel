<div class="row-fluid" style="margin-bottom: 20px;">
        <div class="span12">
          <table class="table table-bordered table-invoice">
              <tbody>
                <tr>
                  <td class="width30">Change Plan:</td>
                  <td class="width70">
                  {!! Form::model($currentPlan,['method' => 'POST','id' => 'change_plan','route'=>[$controller_name.'.index']]) !!}
                      {!! Form::select('id', $plans, null, ['class' => 'form-control']) !!}
                    {!! Form::close() !!}

                  </td>
              </tr>
             
          </tbody></table>
        </div><!--span6-->
</div>
