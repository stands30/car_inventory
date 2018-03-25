 $(function() {
//alert('hello');
    // Setup form validation on the #register-form element
    $("#carmodel-form").validate({  

        // Specify the validation rules
        // ignore: 'input[type="hidden"]',
                      rules: {
                        mdl_mfr_id: {
                            required: true,
                        },
                        mdlName: {
                            required: true,
                        },
                    },
                  messages: {
                         mdl_mfr_id: {
                            message :"Please Select Manufacturer "
                        },
                         mdlName: {
                            message :"Please enter Model name"
                        },
                      }, 
        
        // Specify the validation error messages
        submitHandler: function(form) {

          try
          {
              $("#submit").attr("display","none");
              $("#processing").attr("display","inline-block");
              var mdlId = $('#mdlId').val();
              var mdl_mfr_id = $('#mdl_mfr_id').val();
              var mdlName = $('#mdlName').val();
              var mdlCount = $('#mdlCount').val();

             data =
               {
                mdlId:mdlId,
                mdl_mfr_id:mdl_mfr_id,
                mdlName:mdlName,
                mdlCount:mdlCount
               },
               $.ajax({
                   type: "POST",
                   url: base_url+"CarModel/carMdlSaveData", 
                   data : data,
                   dataType:"json",
                    success: function(response){
                        if(response.success==true){
                           $("#submit").attr("display","inline-block");
                           $("#processing").attr("display","none");
                               swal({title: response.message, text: "", type: "success"},
                                             function(){ 
                                                 location.reload();
                                             }
                                          );
                        }else{
                                 swal(response.message);
                                $("#submit").attr("display","none");
                                $("#processing").attr("display","inline-block");

                                          }
          
        }
    });
          }
          catch(e)
          { 
            console.log(e);
          }


        }
    });

  });