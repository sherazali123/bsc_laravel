 

 <?php $iDimension = 0; ?>
 @foreach ($plan_dimensions as $dimension)
 	<?php $iDimension++; ?>
	 <h3><a href="#">{{ $dimension->name }}</a></h3>
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
	                	   <td>Dimension {{ $iDimension }}</td>
	                	   <td>{{ $dimension->name }}</td>
	                	   <td style="  text-align: right;"></td>
	                	   <td style="  text-align: right;"></td>
	                	   <td style="  text-align: right;">{{ $dimension->AVERAGE }}%</td>
	                	</tr>
	                	 <?php $iObjective = 0; ?>
	                	 @foreach ($dimension->objectives as $objective)
	                	 	<?php $iObjective++; ?>
	                	 	<tr class="obj_row">
		                	   <td>Objective {{ $iObjective }}</td>
		                	   <td>{{ $objective->name }}</td>
		                	   <td style="  text-align: right;"></td>
		                	   <td style="  text-align: right;"></td>
		                	   <td style="  text-align: right;">{{ $objective->AVERAGE }}%</td>
		                	</tr>
		                	<?php $iInitiative = 0; ?>
		                	 @foreach ($objective->initiatives as $initiative)
		                	 	<?php $iInitiative++; ?>
		                	 	<tr class="ini_row">
			                	   <td>Initiative {{ $iInitiative }}</td>
			                	   <td>{{ $initiative->name }}</td>
			                	   <td style="  text-align: right;"></td>
			                	   <td style="  text-align: right;"></td>
			                	   <td style="  text-align: right;">{{ $initiative->AVERAGE }}%</td>
			                	</tr>
			                	<?php $iMeasure = 0; ?>
			                	 @foreach ($initiative->measures as $measure)
			                	 	<?php $iMeasure++; ?>
			                	 	<tr class="mea_row">
				                	   <td>Measure {{ $iMeasure }}</td>
				                	   <td>{{ $measure->name }}</td>
				                	   <td style="  text-align: right;">{{ $measure->target }}</td>
				                	   <td style="  text-align: right;">{{ $measure->actual }}</td>
				                	   <td style="  text-align: right;">{{ $measure->AVERAGE }}%</td>
				                	</tr>


			                	 @endforeach	

		                	 @endforeach

	                	 @endforeach
	             </tbody>
	         </table>
	</div>
@endforeach