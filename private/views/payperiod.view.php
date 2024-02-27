<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

	<div class="row container-fluid justify-content-center">
		<div class="p-4 shadow rounded" style="margin-top:50px;width:100%;max-width: 1500px;">
			<table class="table table-striped table-hover">

				<tr>
					<th class=""></th>
					<th class="text-center">Day Prior</th>
					<th class="text-center text-primary">Day Working</th>
					<th class="text-center">Day +1</th>
					<th class="text-center">Day +2</th>
				</tr>

				<tr>
		<!--AM-->		
						<th class="">AM</th>
							<td class="text-center">MR,RJ</td>
							<td class="text-center text-primary">XV,VB</td>
							<td class="text-center">XV,VB</td>
							<td class="text-center">XV,VB</td>
				</tr>

				<tr>
		<!--PM-->		
						<th class="">PM</th>
							<td class="text-center">MR,PL,RJ</td>
							<td class="text-center text-primary">XV,VB</td>
							<td class="text-center">VB</td>
							<td class="text-center">XV,VB</td>
				</tr>
				<tr>
		<!--Mid-->		
						<th class="">M </th>
							<td class="text-center">MR</td>
							<td class="text-center text-primary">RA</td>
							<td class="text-center">CQ</td>
							<td class="text-center">XV,VB</td>
				</tr>
			</table>
		</div>
	</div>

<?php $this->view('includes/footer')?>