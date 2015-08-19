<p>
                        {!! Form::label('Name', 'Name:') !!}
                        <span class="field">
                            {!! Form::text('name',null,['class'=>'input-xxlarge', 'placeholder' => 'Name']) !!}
                        </span>
                    </p>
                    <p>
                        {!! Form::label('Strategic plan', 'Strategic plan:') !!}
                        <span class="field">
                             {!! Form::select('plan_id', $plans, $currentPlan->id, ['class' => 'form-control']) !!}
                        </span>
                    </p>
                    <p>
                        {!! Form::label('Dimension', 'Dimension:') !!}
                        <span class="field">
                             {!! Form::select('dimension_id', $dimensions, null, ['class' => 'form-control']) !!}
                        </span>
                    </p>
                    <p>
                        {!! Form::label('description', 'Name:') !!}
                        <span class="field">
                            {!! Form::textarea('description',null,['class'=>'span6', 'placeholder' => 'Description']) !!}
                        </span>
                    </p>
                    <div class="form-group">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>