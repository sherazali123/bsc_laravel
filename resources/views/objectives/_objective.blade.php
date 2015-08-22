 
<h4 class="widgettitle">Summary</h4>


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
	                
	                	 <?php $iObjective = 0; ?>
	                	 @foreach ($objectives as $objective)
	                	 	<?php $iObjective++; ?>
	                	 	<tr class="obj_row">
		                	   <td>Objective </td>
		                	   <td>{{ $objective->name }}</td>
		                	   <td style="  text-align: right;"></td>
		                	   <td style="  text-align: right;"></td>
		                	   <td style="  text-align: right;">{{ round($objective->AVERAGE, 2) }}%</td>
		                	</tr>
		                	<?php $iInitiative = 0; ?>
		                	 @foreach ($objective->initiatives as $initiative)
		                	 	<?php $iInitiative++; ?>
		                	 	<tr class="ini_row">
			                	   <td>Initiative {{ $iInitiative }}</td>
                                                   <td><a href="{{url('/initiatives/'.$initiative->id)}}" style="color: #fff; text-decoration: underline;">{{ $initiative->name }}</a></td>
			                	   <td style="  text-align: right;"></td>
			                	   <td style="  text-align: right;"></td>
			                	   <td style="  text-align: right;">{{ round($initiative->AVERAGE, 2) }}%</td>
			                	</tr>
			                	<?php $iMeasure = 0; ?>
			                	 @foreach ($initiative->measures as $measure)
			                	 	<?php $iMeasure++; ?>
			                	 	<tr class="mea_row">
				                	   <td>Measure {{ $iMeasure }}</td>
				                	   <td>{{ $measure->name }}</td>
				                	   <td style="  text-align: right;">{{ $measure->target }}</td>
				                	   <td style="  text-align: right;">{{ $measure->actual }}</td>
				                	   <td style="  text-align: right;">{{ round($measure->AVERAGE, 2) }}%</td>
				                	</tr>


			                	 @endforeach	

		                	 @endforeach

	                	 @endforeach
	             </tbody>
	         </table>
