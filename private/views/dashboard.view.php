<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<style>
	a{
		text-decoration: none;
	}
	p{
		color: #404040;
		font-size: 18px;
		font-weight: bold;
	}
	i{
		color: #404040;
	}
</style>

<div class="container-fluid p-4 shadow mx-auto bg-light" style="margin-top: 60px; max-width: 1200px;">
	<center><h1>Dashboard</h1></center>

		<div class="row justify-content-center p-4">

			<div class="card my-2 shadow rounded me-3" style="width: 16rem;">
				<a href="profile">
					<div class="card-body">
						<center><h1 class="card-title p-1" style="font-size: 80px;"><i class="fa fa-id-card"></i></h1></center>
					    <p class="card-text text-center">Profile</p>
					</div>
				</a>
			</div>

			<div class="card my-2 shadow rounded me-3" style="width: 16rem;">
				<a href="volunteerot">
					<div class="card-body">
						<center><h1 class="card-title p-1" style="font-size: 80px;"><i class="fa-solid fa-clipboard-check"></i></i></h1></center>
					    <p class="card-text text-center">Volunteer Sign Up</p>
					</div>
				</a>
			</div>

			<div class="card my-2 shadow rounded me-3" style="width: 16rem;">
				<a href="seniority">
					<div class="card-body">
						<center><h1 class="card-title p-1" style="font-size: 80px;"><i class="fa-solid fa-arrow-down-1-9"></i></h1></center>
					    <p class="card-text text-center" style="font-size: 18px;font-weight: bold;">Seniority</p>
					</div>
				</a>
			</div>


			<div class="card my-2 shadow rounded me-3" style="width: 16rem;">
				<a href="votreport">
					<div class="card-body">
						<center><h1 class="card-title p-1" style="font-size: 80px;"><i class="fa-solid fa-handshake-angle"></i></h1></center>
					    <p class="card-text text-center">VOT Log</p>
					</div>
				</a>
			</div>

			<div class="card my-2 shadow rounded me-3" style="width: 16rem;">
				<a href="payperiod">
					<div class="card-body">
						<center><h1 class="card-title p-1" style="font-size: 80px;"><i class="fa-regular fa-clipboard"></i></h1></center>
					    <p class="card-text text-center">Build Pay Period</p>
					</div>
				</a>
			</div>

			<div class="card my-2 shadow rounded me-3" style="width: 16rem;">
				<a href="#">
					<div class="card-body">
						<center><h1 class="card-title p-1" style="font-size: 80px;"><i class="fa-solid fa-people-pulling"></i></i></h1></center>
					    <p class="card-text text-center">FOT Update</p>
					</div>
				</a>
			</div>

			<div class="card my-2 shadow rounded me-3" style="width: 16rem;">
				<a href="settings">
					<div class="card-body">
						<center><h1 class="card-title p-1" style="font-size: 80px;"><i class="fa fa-cogs"></i></h1></center>
					    <p class="card-text text-center">Settings</p>
					</div>
				</a>
			</div>

			<div class="card my-2 shadow rounded me-3" style="width: 16rem;">
				<a href="<?=ROOT?>/logout">
					<div class="card-body">
						<center><h1 class="card-title p-1" style="font-size: 80px;"><i class="fa-solid fa-arrow-right-from-bracket"></i></i></h1></center>
					    <p class="card-text text-center">Logout</p>
					</div>
				</a>
			</div>

			<div class="card my-2 shadow rounded me-3" style="width: 16rem;">
				<a href="signup">
					<div class="card-body">
						<center><h1 class="card-title p-1" style="font-size: 80px;"><i class="fa-solid fa-user-plus"></i></h1></center>
					    <p class="card-text text-center">Add User</p>
					</div>
				</a>
			</div>

			<div class="card my-2 shadow rounded me-3" style="width: 16rem;">
				<a href="#">
					<div class="card-body">
						<center><h1 class="card-title p-1" style="font-size: 80px;"><i class="fa-solid fa-envelopes-bulk"></i></h1></center>
					    <p class="card-text text-center">Email</p>
					</div>
				</a>
			</div>

			<div class="card my-2 shadow rounded me-3" style="width: 16rem;">
				<a href="#">
					<div class="card-body">
						<center><h1 class="card-title p-1" style="font-size: 80px;"><i class="fa-regular fa-message"></i></h1></center>
					    <p class="card-text text-center">Landing Message</p>
					</div>
				</a>
			</div>

			<div class="card my-2 shadow rounded me-3" style="width: 16rem;">
				<a href="passwordupdate">
					<div class="card-body">
						<center><h1 class="card-title p-1" style="font-size: 80px;"><i class="fa-solid fa-key"></i></h1></center>
					    <p class="card-text text-center" style="font-size: 15px;">Update User Password</p>
					</div>
				</a>
			</div>

		</div>
	</div>
<?php $this->view('includes/footer')?>
