<!DOCTYPE html>
<html>
<head>
  <title>Inventory List | <?php echo PROJECT_NAME; ?></title>
<link href="<?php echo $this->config->item('base_url') ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->config->item('base_url') ?>assets/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo $this->config->item('base_url') ?>assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
<!-- Datatable css-->
<link href="<?php echo $this->config->item('base_url') ?>assets/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->config->item('base_url') ?>assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->config->item('base_url') ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo $this->config->item('base_url');?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<!-- Datatable css-->
<style type="text/css">

</style>
</head>
<body  class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
  <?php  $this->load->view('common/sidebar') ?>
  <div class="row">
    <div class="content">
        <div class="container"> 
                  
            <div class="row">
                  <div class="">
                      <!-- BEGIN EXAMPLE TABLE PORTLET-->
                      <div class="portlet light bordered">
                          <div class="portlet-title">
                              <div class="caption font-dark">
                                  <span class="caption-subject bold uppercase">Inventory List</span> 
                              </div>
                              <div class="tools"> </div>
                          </div>
                          <div class="portlet-body">
                              <table class="table table-striped table-bordered table-hover" id="sample_1">
                                  <thead>
                                      <tr>
                                          <th>Sr no</th>
                                          <th>Manufacturer Name</th>
                                          <th>Model Name</th>
                                          <th>Count</th>
                                          <th>Added On</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php $i=1; foreach ($inventory as $invData) { ?>
                                    <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $invData->mfr_name ?></td>
                                      <td><?php echo $invData->mdl_name ?></td>
                                      <td><?php echo $invData->mdl_count ?></td>
                                      <td><?php echo DateTimeDisplay($invData->mdl_crtd_dt) ?></td>
                                      <td><a onclick="return updateCount('<?php echo $invData->mdl_id ?>','<?php echo $invData->mdl_count ?>')">Sold</a></td>
                                    </tr>

                                   <?php $i++;  } ?>
                                     
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
             </div> 
             
        </div>
</div>
  </div>
         
<script src="<?php echo $this->config->item('base_url') ?>assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $this->config->item('base_url') ?>assets/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo $this->config->item('base_url') ?>assets/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo $this->config->item('base_url') ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
 <script src="<?php echo $this->config->item('base_url') ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo $this->config->item('base_url') ?>assets/scripts/table-datatables-buttons.js" type="text/javascript"></script> 
<script src="<?php echo$this->config->item('base_url')?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo $this->config->item('base_url');?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
  function updateCount(mdlId,mdlCount)
  {
    data = {
      mdlId:mdlId,
      mdlCount:mdlCount

    },
    $.ajax({

             type: "POST",
             url: base_url+"CarModel/updateSoldData", 
             data : data,
             dataType:"json",
              success: function(response)
              {
                  if(response.success==true)
                  {
                     $("#submit").attr("display","inline-block");
                     $("#processing").attr("display","none");
                         swal({title: response.message, text: "", type: "success"},
                                       function(){ 
                                           location.reload();
                                       }
                                    );
                  }
                  else
                  {
                    swal(response.message);
                    $("#submit").attr("display","none");
                    $("#processing").attr("display","inline-block");

                  }
    
             }
    
    });
  }
</script>
</body>
</html>