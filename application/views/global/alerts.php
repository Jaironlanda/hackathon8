<!-- alert-->
<div class="container">
<div style="padding-top: 20px;">
  <?php
    if($this->session->flashdata('msg_error') != '')
    {
      echo
      '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4><i class="fa fa-exclamation-circle"></i> Opss!</h4>
            <p>'.$this->session->flashdata('msg_error').'</p>
      </div>';
    }
    if($this->session->flashdata('msg_noti') != '')
    {
      echo
      '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4><i class="fa fa-check-circle"></i> Success!</h4>
            <p>'.$this->session->flashdata('msg_noti').'</p>
      </div>';
    }
    if($this->session->flashdata('msg_warning') != '')
    {
      echo
      '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4><i class="fa fa-warning"></i> Warning!</h4>
            <p>'.$this->session->flashdata('msg_warning').'</p>
      </div>';
    }  
  ?>
</div>
</div>
<!-- ./alert -->
