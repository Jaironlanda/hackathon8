<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- Style -->
    {global_css}
    {global_css_link}
    <!-- /. Style -->
</head>
<body>
<!-- <header>
        <div class="container">
          <div class="row">
              <div class="ums-logo col-lg-6">
                  <a href="<?php echo base_url()?>">
                     <img src="<?php echo base_url()?>logo/ums-fki.png" alt="Logo UMS" width="411px" height="80px" class="img-fluid">
                  </a>
              </div>
              <div class="fki-social-network-search-bar col-lg-6 d-none d-sm-block">
                  <div class="float-md-right">
                  <img src="<?php echo base_url()?>logo/eco-campus.png" alt="Logo UMS" width="111px" height="40px" class="img-fluid">
                   
                  </div>
              </div>
          </div>
        </div>
    </header> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav w-100 container">
            <a class="nav-item nav-link active" href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#"><i class="fas fa-users"></i> Donate</a>
            <!-- <a class="nav-item nav-link" href="#"><i class="fas fa-users"></i> Student</a>
            <a class="nav-item nav-link" href="#"><i class="fas fa-search"></i> Research</a>
            <a class="nav-item nav-link" href="#"><i class="fas fa-users"></i> Staff</a>
            <a class="nav-item nav-link" href="#"><i class="fas fa-users"></i> Alumni</a>
            <a class="nav-item nav-link" href="#"><i class="fas fa-download"></i> Download</a>
            <a class="nav-item nav-link" href="#"><i class="far fa-address-card"></i> Contact Us</a>
            <a class="nav-item nav-link" href="#"><i class="fas fa-link"></i> Other Link</a> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo base_url()?>login">Login</a>
                    <a class="dropdown-item" href="<?php echo base_url()?>register">Register</a>
                </div>
            </li>
          </div>
        </div>
      </nav>