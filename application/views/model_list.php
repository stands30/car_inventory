<!DOCTYPE html>
<html>
<head>
  <title>Model List | <?php echo PROJECT_NAME; ?></title>
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
                 <div class="carmodel-form-view" style="display: none">
                  <div class="portlet-body">
                    <form id="carmodel-form">
                     <div class="row">
                      <h3>Model </h3>
                           <input type="hidden"  id="mdlId" name="mdlId" > 
                       <div class="col-md-3">
                           <label class="control-label"><b>Manufacturer Name</b><span style="color: red"> *</span></label>
                          <select class="form-control select2" id="mdl_mfr_id" name="mdl_mfr_id" required="required">
                         <?php echo $this->Home_model->getCombo('SELECT mfr_id as f1,mfr_name as f2 from manufacturer where mfr_status="'.ACTIVE_STATUS.'" '); ?> 
                          </select>
                       </div>
                       <div class="col-md-3">
                          <div class="form-group">
                           <label class="control-label"><b>Model Name</b><span style="color: red"> *</span></label>
                           <input type="text" class="form-control" id="mdlName" name="mdlName" required=""> 
                          </div>
                       </div>
                       <div class="col-md-3">
                          <div class="form-group">
                           <label class="control-label"><b>No. of Models</b><span style="color: red"> *</span></label>
                           <input type="text" class="form-control" id="mdlCount" name="mdlCount" required=""> 
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
                                     <button id="" class="btn orange carmodel">
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
                                          <th>Manufacturer</th>
                                          <th>Name</th>
                                          <th>No. of Models</th>
                                          <th>Added On</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($Carmodel_ as $mdlData) { ?>
                                    <tr>
                                      <td><?php echo $mdlData->mfr_name ?></td>
                                      <td><?php echo $mdlData->mdl_name ?></td>
                                      <td><?php echo $mdlData->mdl_count ?></td>
                                      <td><?php echo DateTimeDisplay($mdlData->mdl_crtd_dt) ?></td>
                                      <td><a class="" onclick="return updateData('<?php echo $mdlData->mdl_id ?>','<?php echo $mdlData->mdl_mfr_id ?>','<?php echo $mdlData->mdl_count ?>','<?php echo $mdlData->mdl_name ?>')">Edit</a></td>
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
<script src="<?php echo$this->config->item('base_url')?>assets/js/carmodel.js" type="text/javascript"></script>
<script src="<?php echo $this->config->item('base_url');?>assets/plugins/sweetalert/sweetalert.min.js"></script>

<script type="text/javascript">
  $('.carmodel').click(function (){
    $('.carmodel-form-view').toggle();
  });
  function updateData(mdlId,mdl_mfr_id,mdlCount,mdlName)
  {
    $('#mdlId').val(mdlId);
     $('#mdl_mfr_id').val(mdl_mfr_id);
     $('#mdlName').val(mdlName);
     $('#mdlCount').val(mdlCount);
    $('.carmodel-form-view').toggle();
    
  }
</script>
</body>


</html>