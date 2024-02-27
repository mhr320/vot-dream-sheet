<style>
  nav ul li a{
    width: 130px;
    text-align: center;
    border-left: solid thin #ddd;
    border-right: solid thin #eee;
  }
  nav ul li a:hover{
    background-color: black;
    color: pink !important;
    font-weight: bold;
  }
  a.dropdown-item:hover{
    background-color: black;
    color: pink !important;
  }
  a{
    font-size: 14px !important;
  }
  #username{
    background: none;
    color: black !important;
  }
</style>
<nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <?php if(Auth::logged_in()):?>
    <a class="navbar-brand" href="home">HOME</a>
    <?php endif;?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <?php if(Auth::getRole() == 'super_admin' || Auth::getRole() == 'admin'):?>
          <li class="nav-item">
            <a class="nav-link" href="../public/dashboard">DASHBOARD</a>
          </li>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ADMIN
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="../public/payperiod">BUILD PP</a></li>
                <li><a class="dropdown-item" href="../public/votreport">VOT LOG</a></li>
                <li><a class="dropdown-item" href="#">FOT UPDATE</a></li>
                <div class="dropdown-divider"></div>
                <li><a class="dropdown-item" href="../public/settings">SETTINGS</a></li>
                <li><a class="dropdown-item" href="#">EMAIL</a></li>
                <li><a class="dropdown-item" href="#">LANDING MSG</a></li>
                <li><a class="dropdown-item" href="../public/faq">FAQ</a></li>
                <div class="dropdown-divider"></div>
                <li><a class="dropdown-item" href="../public/signup">ADD USER</a></li>
                <li><a class="dropdown-item" href="../public/passwordupdate">EDIT USER P/W</a></li>
                <li><a class="dropdown-item" href="#">AVAIL</a></li>
                <li><a class="dropdown-item" href="#">AVAIL</a></li>
              </ul>
            </li>
          </ul>

        <?php endif;?>
        <?php if(Auth::logged_in()):?>
        <li class="nav-item">
          <a class="nav-link" href="../public/volunteerot">VOT SIGNUP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../public/seniority">SENIORITY</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">SUGGESTIONS</a>
        </li>
        <?php endif;?>
        
        
        
       
      </ul>
      <?php if(Auth::logged_in()):?>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a id="username" style="margin-right: 60px;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?=strtoupper(Auth::getNom())?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <?php if(Auth::getRole() == 'super_admin' || Auth::getRole() == 'admin'):?>
              <li><a class="dropdown-item" href="../public/profile">PROFILE</a></li>
              <div class="dropdown-divider"></div>
              <li><a class="dropdown-item" href="<?=ROOT?>/logout">LOGOUT</a></li>
            <?php else:?>
              <li><a class="dropdown-item" href="../public/profile">PROFILE</a></li>
              <li><a class="dropdown-item" href="../public/passwordupdate">CHANGE PASSWORD</a></li>
              <div class="dropdown-divider"></div>
              <li><a class="dropdown-item" href="<?=ROOT?>/logout">LOGOUT</a></li>
            <?php endif;?>

          </ul>
        </li>
      </ul>
      <?php endif;?>
    </div>
  </div>
</nav>