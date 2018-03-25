 $(function() {
//alert('hello');
    // Setup form validation on the #register-form element
    $("#manufacturer-form").validate({  

        // Specify the validation rules
        ignore: 'input[type="hidden"]',
                      rules: {
                        manufacturerName: {
                            required: true,
                        }
                    },
                  messages: {
                         manufacturerName: {
                            message :"Please enter Manufacturer name"
                        },
                      }, 
        
        // Specify the validation error messages
        submitHandler: function(form) {

          try
          {
              $("#submit").attr("display","none");
              $("#processing").attr("display","inline-block");
              var formData = new FormData();
              var mfrId = $('#manufacturerId').val();
              var mfrName = $('#manufacturerName').val();

             data =
               {
                mfrId:mfrId,
                mfrName:mfrName
               },
               $.ajax({
                   type: "POST",
                   url: base_url+"manufacturer/manufacturerSaveData", 
                   data : data,
                   dataType:"json",
                    success: function(response)
                    {
                        if(response.success==true){
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
          catch(e)
          { 
            console.log(e);
          }


        }
    });

  });