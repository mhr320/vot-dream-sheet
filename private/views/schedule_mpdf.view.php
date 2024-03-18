<?php

require_once __DIR__ . "/vendor/autoload.php";

$mpdf = new \Mpdf\Mpdf();

ob_start();

$i=1; 
$grpcount=0;

echo '<div style="min-width: 350px;">
	<h1 style="margin-top: 60px;margin-bottom: 4px;">Area 3 2024</h1>
	<div>
		<div style="margin-top:30px;width:100%;max-width: 460px;background-color: white;">
			<table>
				<p>Trimester 1</p>
				<p>14 January - 27 April</p>
				<tr><th>#</th><th>OI</th><th></th><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>';
				foreach($schedules1 as $line) {
				$days = explode(',', strtoupper($line->schedule));
					echo '<tr>
						<td>'.$i;$i++.'</td>';
						echo '<th>'.strtoupper($line->ois).'</th>';

						echo '<td>'; 
						if($line->mid_drop == 'y') {
							echo '<i class="fa-solid fa-arrow-down-long" style="color: red;"></i>';
							} 
						echo '</td>';
						echo '<td>'.$days[0].'</td>';
						echo '<td>'.$days[1].'</td>';
						echo '<td>'.$days[2].'</td>';
						echo '<td>'.$days[3].'</td>';
						echo '<td>'.$days[4].'</td>';
						echo '<td>'.$days[5].'</td>';
						echo '<td>'.$days[6].'</td>
					</tr>';
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
						} 
			}
		echo '</table>
		</div>';
		$i=1;
		echo '</div>
	</div>
</div>';



	$html = ob_get_contents();

	ob_end_clean();


	$mpdf->WriteHTML($html);

	$mpdf->Output();

?>