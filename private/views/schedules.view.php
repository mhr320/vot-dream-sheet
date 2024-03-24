<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<script>
	// $(document).ready(function(){
	//     setInterval(function(){
	//         $.ajax({
	//             url: 'schedules/tableDataOis', // URL of the server-side script
	//             success: function(data) {
	//                 $('#ois').html(data); // Update the content of the DIV element
	//             }
	//         });
	    // }, 3000); // Refresh the content every 5 seconds
	// });
	// $(document).ready(function(){  
    //     setInterval(function(){   
    //         $("ois").load("schedules/tableDataOis");
    //     }, 3000);
    // });
</script>
<?php $i=1; $grpcount=0;?> 
<div  style="min-width: 350px;">
	
	<div id="sched"  class="row container-fluid justify-content-center">
		<h1  class="text-center" style="margin-top: 60px;margin-bottom: 4px;">Area 3 2024</h1>
		<?php 
			$trimesters = array ( $schedules1, $schedules2, $schedules3 );		
			$tri_dates = array ( "14 January - 27 April", "28 April - 14 September", 	"15 September - 11 January" );		
			$t = 1;
			$p = 0;	
			foreach($trimesters as $tri):?>
			<div  class="col-4 p-4 rounded" style="margin-top:5px;width:100%;max-width: 480px;background-color: white;">
				<table class="table table-hover">
					<p class="h1 text-center mb-1">Trimester <?=$t?></p>
						<p class="text-center mt-1 mb-1 fw-bold" style="font-size: 12px;"><?=$tri_dates[$p]?></p>
					<?php $t++;$p++;?>
					<tr class="table-dark"><th>#</th><th>OI</th><th></th><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>
					<?php foreach($tri as $line):?>
						<?php $days = explode(',', strtoupper($line->schedule))?>
						<tr>
							<td><?=$i;$i++?></td>
							<th id="ois"><?=$line->ois?></th>
							<td><?php if($line->mid_drop == 'y'):?><i class="fa-solid fa-arrow-down-long" style="color: red; font-weight: bolder;"></i><?php endif?></td>
							<td><?=$days[0]?></td>
							<td><?=$days[1]?></td>
							<td><?=$days[2]?></td>
							<td><?=$days[3]?></td>
							<td><?=$days[4]?></td>
							<td><?=$days[5]?></td>
							<td><?=$days[6]?></td>
						</tr>
						<?php 
							$storedCountGRP = getGrpCount($tri);
							$groups = ['a','b','c','d','e','f','g'];
							foreach($groups as $g) {
								if($line->grp == $g) {
									$grpcount++;
									if($grpcount == $storedCountGRP[$g]) {
										$grpcount = 0;
										echo "<tr class='table-dark'>
										<th>#</th><th>OI</th><th></th><th>S</th><th>M</th>
										<th>T</th><th>W</th><th>T</th><th>F</th><th>S</th>
										</tr>";
									}
								} 
							} 		?>
					<?php endforeach;?>
				</table>
			</div>
		<?php $i=1;?>
		<?php endforeach?>
	</div>
</div>
<?php $this->view('includes/footer')?>
