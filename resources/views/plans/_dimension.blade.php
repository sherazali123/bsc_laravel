 

 <?php $iDimension = 0; ?>
 @foreach ($plan_dimensions as $dimension)
 	<?php $iDimension++; if(empty($dimension->AVERAGE)) $dimension->AVERAGE=0.0;?>
   <h4>@include('_legend') <a href="#">{{ $dimension->name }}</a></h4>
	 <div>
	         <table class="table table-bordered">
	             <colgroup>
	                 <col class="con0" />
	                 <col class="con1" />
	                 <col class="con0" />
	                 <col class="con1" />
	                 <col class="con0" />
	             </colgroup>
	             <thead>
	                 <tr>
	                     <th>&nbsp;</th>
	                     <th>&nbsp;</th>
	                     <th>Target</th>
	                     <th>Actual</th>
	                     <th>%</th>
	                 </tr>
	             </thead>
	             <tbody>
	                	<tr class="dim_row">
	                	   <td>
	                	   @if(isset($dimension_type) && $dimension_type === 'single')
	                	   		Dimension
	                	   @else
	                	   		Dimension {{ $iDimension }}
	                	   @endif
	                	   </td>
	                	   <td>{{ $dimension->name }}</td>
	                	   <td style="  text-align: right;"></td>
	                	   <td style="  text-align: right;"></td>
	                	   <td style="  text-align: right;background-color:@if (round($dimension->AVERAGE,1)<=50)red
                         @elseif((round($dimension->AVERAGE,1)<=80))#FF9900 @elseif((round($dimension->AVERAGE,1)>80))#55BF3B @endif" >{{ round($dimension->AVERAGE, 1) }}%</td>
	                	</tr>
	                	 <?php $iObjective = 0; ?>
	                	 @foreach ($dimension->objectives as $objective)
	                	 	<?php $iObjective++; ?>
                                 <tr class="obj_row">
                                     <td><a style=" margin: 3px; margin-left: 10px padding:2px; padding-left: 4px; padding-right: 4px;color:#FFF; font-size: 20; border: 1px solid #FFF; text-decoration: none;" href="javascript:void()" rel="{{ $iObjective }}">+</a>Objective {{ $iObjective }}</td>
                                     <td><a href="{{url('/objectives/'.$objective->id)}}" style="color: #fff; text-decoration: underline;">{{ $objective->name }}</a></td>
		                	   <td style="  text-align: right;"></td>
		                	   <td style="  text-align: right;"></td>
		                	   <td style="  text-align: right;">{{ round($objective->AVERAGE, 1) }}%</td>
		                	</tr>
		                	<?php $iInitiative = 0; ?>
		                	@foreach ($objective->initiatives as $initiative)
		                	 	<?php $iInitiative++;  if(empty($initiative->AVERAGE)) $initiative->AVERAGE=0;?>
                                        <tr class="ini_row  obj-{{ $iObjective }}" style="display: none">
			                	   <td><a style=" margin: 5px; padding:2px; padding-left: 4px; padding-right: 4px;color:#000; font-size: 20; border: 1px solid #FFF; text-decoration: none;"href="javascript:void()" rel="ini-{{ $initiative->id }}">+</a> Initiative {{ $iInitiative }}</td>
			                	   <td>{{ $initiative->name }}</td>
			                	   <td style="  text-align: right;"></td>
			                	   <td style="  text-align: right;"></td>
			                	   <td style="  text-align: right;">{{ round($initiative->AVERAGE,1) }}%</td>
			                	</tr>
			                	<?php $iMeasure = 0; ?>
			                	 @foreach ($initiative->measures as $measure)
			                	 	<?php $iMeasure++;  if(empty($measure->AVERAGE)) $measure->AVERAGE=0.0?>
			                	 	<tr class="mea_row ini-{{$initiative->id }} obj-{{ $iObjective }}" style="display: none;">
				                	   <td>Measure {{ $iMeasure }}</td>
				                	   <td>{{ $measure->name }}</td>
				                	   <td style="  text-align: right;">{{ round($measure->target) }}</td>
				                	   <td style="  text-align: right;">{{ round($measure->actual) }}</td>
				                	   <td style="  text-align: right;">{{ round($measure->AVERAGE, 1) }}%</td>
				                	</tr>


			                	 @endforeach	

		                	 @endforeach 

	                	 @endforeach
	             </tbody>
	         </table>
	</div>
@endforeach