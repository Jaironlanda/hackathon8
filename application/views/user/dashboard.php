<h1>Dashboard</h1>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
</ol>
<!-- Icon Cards-->
<div class="row">
    <!-- <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
            <div class="card-body-icon">
                <i class="fas fa-fw fa-users"></i>
            </div>
            <div class="mr-5">Admin</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View List</span>
            <span class="float-right">
                <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div> -->
    <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
            <i class="fas fa-fw fa-newspaper"></i>
        </div>
        <div class="mr-5">{countNews} News</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url()?>Post/index/1">
        <span class="float-left">View List</span>
        <span class="float-right">
            <i class="fas fa-angle-right"></i>
        </span>
        </a>
    </div>

    </div>
    <!-- <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
            <div class="card-body-icon">
                <i class="far fa-calendar-alt"></i>
            </div>
            <div class="mr-5">{countEvent} Event(s)</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url()?>Post/index/2">
            <span class="float-left">View List</span>
            <span class="float-right">
                <i class="fas fa-angle-right"></i>
            </span>
            </a>
        </div>
    </div> -->

</div>
