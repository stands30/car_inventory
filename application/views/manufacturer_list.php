<!DOCTYPE html>
<html>
<head>
  <title>Manufacturer List | <?php echo PROJECT_NAME; ?></title>
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
                 <div class="manufacturer-form-view" style="display: none">
                  <div class="portlet-body">
                    <form id="manufacturer-form">
                     <div class="row">
                      <h3>Manufacturer </h3>
                           <input type="hidden"  id="manufacturerId" name="manufacturerId" required=""> 
                       <div class="col-md-3">
                          <div class="form-group">
                           <label class="control-label"><b>Manfacturer Name</b><span style="color: red"> *</span></label>
                           <input type="text" class="form-control" id="manufacturerName" name="manufacturerName" required=""> 
                          </div>
                       </div>
                       <div class="col-md-1">
                        <label class="control-label" style="display: inline-block;">&nbsp;</label>
                         <button type="submit" class="btn btn-success form-control" id="submit">Save</button>
                        <button type="button" class="btn btn-button bunker-color-bg white btn-hover" name="processing" id="processing" style="display:none"> <i class="fa fa-spinner fa-spin" style="font-size:18px"></i>Processing</button>
                       </div >
                     </div>
                   </form>
                  </div>
                 </div>    
            <div class="row">
                  <div class="">
                      <!-- BEGIN EXAMPLE TABLE PORTLET-->
                      <div class="portlet light bordered">
                          <div class="portlet-title">
                              <div class="caption font-dark">
                                  <span class="caption-subject bold uppercase">Manufacturer List</span> 
                                  <div class="btn-group">
                                     <button id="" class="btn orange manufacturer">
                                     Add New <i class="fa fa-plus"></i>
                                     </button>
                                  </div>
                              </div>
                              <div class="tools"> </div>
                          </div>
                          <div class="portlet-body">
                              <table class="table table-striped table-bordered table-hover" id="sample_1">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Added On</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($manufacturer as $mfrData) { ?>
                                    <tr>
                                      <td><?php echo $mfrData->mfr_name ?></td>
                                      <td><?php echo DateTimeDisplay($mfrData->mfr_crtd_dt) ?></td>
                                      <td><a class="" onclick="return updateData('<?php echo $mfrData->mfr_id ?>','<?php echo $mfrData->mfr_name ?>')">Edit</a></td>
                                    </tr>

                                   <?php } ?>
                                     
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
<script src="<?php echo$this->config->item('base_url')?>assets/js/manufacturer.js" type="text/javascript"></script>
<script src="<?php echo $this->config->item('base_url');?>assets/plugins/sweetalert/sweetalert.min.js"></script>

<script type="text/javascript">
  $('.manufacturer').click(function (){
    $('.manufacturer-form-view').toggle();
  });
  function updateData(mfrId,mfrName)
  {
    $('.manufacturer-form-view').toggle();
    $('#manufacturerId').val(mfrId);
     $('#manufacturerName').val(mfrName);
  }
</script>
</body>
</html>