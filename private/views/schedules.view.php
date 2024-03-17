<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $i=1; $grpcount=0;?> 

<div style="min-width: 350px;">
	<h1 class="text-center" style="margin-top: 60px;margin-bottom: 4px;">Area 3 2024</h1>

	<div class="row container-fluid justify-content-center">
		<div class="col-4 p-4 rounded" style="margin-top:60px;width:100%;max-width: 460px;background-color: white;">
			<table class="table table-hover">
				<p class="h1 text-center">Trimester 1</p>
				<p class="text-center">14 January - 27 April</p>
				<tr class="table-dark"><th>#</th><th>OI</th><th></th><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>
				<?php foreach($schedules1 as $line):?>
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
						$storedCountGRP = getGrpCount($schedules1);
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
		</div>
		<?php $i=1;?>
		<div class="col-4 p-4 rounded" style="margin-top:60px;width:100%;max-width: 460px;background-color: white;">
			<table class="table  table-hover">
				<p class="h1 text-center">Trimester 2</p>
				<p class="text-center">28 April - 14 September</p>
				<tr class="table-dark"><th>#</th><th>OI</th><th></th><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>
				<?php foreach($schedules2 as $line):?>
					<?php $days = explode(',', strtoupper($line->schedule))?>
					<tr>
						<td><?=$i;$i++?></td>
						<th><?=strtoupper($line->ois)?></th>
						
						<td><?php if($line->mid_drop == 'y'):?><i class="fa-solid fa-droplet" style="color: blue;font-size: small;"></i></i><?php endif?></td>
						<!-- <i class="fa-solid fa-arrow-down-long" style="color: red;"> -->
						<td><?=$days[0]?></td>
						<td><?=$days[1]?></td>
						<td><?=$days[2]?></td>
						<td><?=$days[3]?></td>
						<td><?=$days[4]?></td>
						<td><?=$days[5]?></td>
						<td><?=$days[6]?></td>
					</tr>
					<?php 
						$storedCountGRP = getGrpCount($schedules2);
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
		</div>
		<div class="col-4 p-4 rounded" style="margin-top:60px;width:100%;max-width: 460px;background-color: white;">
			<?php $i=1;?>
				<table class="table  table-hover">
					<p class="h1 text-center">Trimester 3</p>
					<p class="text-center">15 September - 11 January 2025</p>
					<tr class="table-dark"><th>#</th><th>OI</th><th></th><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>
					<?php foreach($schedules3 as $line):?>
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
							$storedCountGRP = getGrpCount($schedules3);
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
		</div>
	</div>
</div>


<?php $this->view('includes/footer')?>
