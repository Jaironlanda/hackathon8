<?php
    //check session if exist or not.
    if ($this->session->has_userdata('logged_in') == false) {
        if(current_url() != base_url('login')){
            $this->render_lib->_flashdata('msg_error', 'Session does not exist.');      
            redirect(base_url("login"));
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Style -->
    {global_css}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <!-- /. Style -->
</head>
<body id="page-top">
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo base_url(); ?>">FKI SYSTEM</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>user/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-newspaper"></i>
          <span>Post Quiz</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Quiz Management</h6>
          <a class="dropdown-item" href="<?php echo base_url(); ?>post/create">Create Quiz</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>post/create">Index Quiz</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
    </ul>
    <div id="content-wrapper"> <!-- content wrapper -->
        <div class="container-fluid">