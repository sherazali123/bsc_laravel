 
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
	                
	                	
		                	 @foreach ($initiatives as $initiative)
		                	 	<tr class="ini_row">
			                	   <td>Initiative </td>
			                	   <td>{{ $initiative->name }}</td>
			                	   <td style="  text-align: right;"></td>
			                	   <td style="  text-align: right;"></td>
			                	   <td style="  text-align: right;background-color:@if (round($initiative->AVERAGE,1)<=50)red
                         @elseif((round($initiative->AVERAGE,1)<=80))#FF9900 @elseif((round($initiative->AVERAGE,1)>80))#55BF3B @endif">{{ round($initiative->AVERAGE, 1) }}%</td>
			                	</tr>
			                	<?php $iMeasure = 0; ?>
			                	 @foreach ($initiative->measures as $measure)
			                	 	<?php $iMeasure++; ?>
			                	 	<tr class="mea_row">
				                	   <td>Measure {{ $iMeasure }}</td>
                                                           <td><a href="{{url('/measures/'.$measure->id.'/actual_measures')}}" style="color: #666; text-decoration: underline;">{{ $measure->name }}</a></td>
				                	   <td style="  text-align: right;">{{ $measure->target }}</td>
				                	   <td style="  text-align: right;">{{ $measure->actual }}</td>
				                	   <td style="  text-align: right;">{{ round($measure->AVERAGE, 1) }}%</td>
				                	</tr>


			                	 @endforeach	

		                	 @endforeach

	             </tbody>
	         </table>
