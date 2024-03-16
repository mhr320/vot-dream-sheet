<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $i=1; $grpcount=0;?> 

<div style="min-width: 350px;">
	<div class="row container-fluid justify-content-center">
		<div class="p-4 shadow rounded" style="margin-top:60px;width:100%;max-width: 460px;background-color: white;">
			<table class="table">
				<p class="h1 text-center">Trimester 1</p>
				<tr class="table-dark"><th>#</th><th>OI</th><th></th><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>
				<?php foreach($schedules as $line):?>
					<?php $days = explode(',', strtoupper($line->schedule))?>
					<tr>
						<td><?=$i;$i++?></td>
						<th><?=strtoupper($line->ois)?></th>
						<td><?php if($line->mid_drop == 'y'):?><i class="fa-solid fa-arrow-down-long" style="color: red;"></i><?php endif?></td>
						<td><?=$days[0]?></td>
						<td><?=$days[1]?></td>
						<td><?=$days[2]?></td>
						<td><?=$days[3]?></td>
						<td><?=$days[4]?></td>
						<td><?=$days[5]?></td>
						<td><?=$days[6]?></td>
					</tr>
					<?php 
						$storedCountGRP = getGrpCount($schedules);
						$groups = ['a','b','c','d','e','f','g'];
						foreach($groups as $g) {
							if($line->grp == $g) {
								$grpcount++;
								if($grpcount == $storedCountGRP[$g]) {
									$grpcount = 0;
									echo "<tr class='table-dark'>
													<th>#</th>
													<th>OI</th>
													<th></th>
													<th>S</th>
													<th>M</th>
													<th>T</th>
													<th>W</th>
													<th>T</th>
													<th>F</th>
													<th>S</th>
												</tr>";
								}
							} 
						} ?>
				<?php endforeach;?>

			</table>
			<i class="fa-solid fa-arrow-down-long" style="color: red;"></i> Denotes mid drop line
		</div>
	</div>
</div>

<?php $this->view('includes/footer')?>
