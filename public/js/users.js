$(function(){

//trust circle request send
$(document).on('submit','.formtrust',function (event){
        event.preventDefault();

        var $form=$(this),
        data = $form.serialize();
        url = $form.attr('action');
          
        var posting = $.post(url,{formData:data});
        var posting = $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function (data) {
               if(data='success'){
                $form.find("input[type='submit']").hide();
                $form.find("span").html("<center class='alert alert-success' style='padding:5px;'>Your Trust Circle Request has been sent</center>").delay(4000).hide('slow');
                $form.parent().delay(4500).hide('slow');
               }
            }
        });
        posting.done(function(data){
          //  alert(data)
            if(data.fail){
                   $form.find("input[type='submit']").hide().delay(4001).show('slow');
                  $form.find("span").html("<center class='alert alert-danger' style='padding:5px;'>Sorry there has been a server error please try again</center>").delay(4000).hide('slow');
            }//fail function 
                else if(data.success){
                  
           }//success
            //function done
        });
          posting.fail(function(data) {
            $form.find("input[type='submit']").hide().delay(4001).show('slow');
                  $form.find("span").html("<center class='alert alert-danger' style='padding:5px;'>Sorry there has been a server error please try again</center>").delay(4000).hide('slow');  
            var err=data;
     console.log( data );
       });

           });

          $(document).on('submit','.formtrust2',function (event){
        event.preventDefault();

        var $form=$(this),
        data = $form.serialize();
        url = $form.attr('action');
          
        var posting = $.post(url,{formData:data});
        var posting = $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function (data) {
               if(data='success'){
                $form.find("input[type='submit']").hide();
                $form.find("span").html("<center class='alert alert-success' style='padding:5px;'>Your Trust Circle Request has been sent</center>");
               
               }
            }
        });
        posting.done(function(data){
          //  alert(data)
            if(data.fail){
                   // $form.find("input[type='submit']").hide().delay(4001).show('slow');
                  $form.find("span").html("<center class='alert alert-danger' style='padding:5px;'>Sorry there has been a server error please try again</center>").delay(4000).hide('slow');
            }//fail function 
                else if(data.success){
                  
           }//success
            //function done
        });
          posting.fail(function(data) {
            // $form.find("input[type='submit']").hide().delay(4001).show('slow');
                  $form.find("span").html("<center class='alert alert-danger' style='padding:5px;'>Sorry there has been a server error please try again</center>").delay(4000).hide('slow');  
            var err=data;
     console.log( data );
       });
        //alert(data);

    });
  
  //Request to send to user to join group       
$(document).on('submit','.requestgroup',function (event){
        event.preventDefault();

        var $form=$(this),
        data = $form.serialize();
        url = $form.attr('action');
          
        var posting = $.post(url,{formData:data});
        var posting = $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function (data) {
              
            }
        });
        posting.done(function(data){
          //  alert(data)
            if(data.fail){
                   $form.find("input[type='submit']").hide().delay(4001).show('slow');
                  $form.find("span").show().html("<center class='alert alert-danger' style='padding:1px;'>Sorry a server error occured please try again</center>").delay(4000).hide('slow');
            }//fail function 
                else if(data.success){
                    $form.find("input[type='submit']").hide();
                $form.find("span").html("<center class='alert alert-success' style='padding:5px;'>Your Request to join the group has been sent</center>").delay(4000).hide('slow');
                $form.parent().delay(4500).hide('slow');
           }//success
            //function done
        });
          posting.fail(function(data) {
            $form.find("input[type='submit']").hide().delay(4001).show('slow');
                  $form.find("span").show().html("<center class='alert alert-danger' style='padding:5px;'>Sorry a server error occured please try again</center>").delay(4000).hide('slow');  
            var err=data;
     console.log( data );
       });

           });

  $(document).on('click','.userloanrqst',function(){
    var $el= $(this);
    var gids = $el.attr('info');
     var users = $el.attr('user');
    $("#userto").val(gids);
    $("#userloanname").html(users);
  });

   // Date time picker for signup
       var d = new Date();
            var month = d.getMonth();
            var day = d.getDate();
            var year = d.getFullYear()-1;
               
                $('#paydate1').datetimepicker({
                format: 'YYYY-MM-DD HH:ss',
                minDate:day+'/'+month+'/'+year
             });

                //pass values to the modal part
                $(document).on('click','.userceditselect',function(){
                  var $el = $(this);
                  var name = $el.attr('name');
                  var ids = $el.attr('info');

                  $('#usercreditname').empty().html(name);
                  $('#usercreditval').val(ids);
                });


                
                // branch admin crediting system
        $(document).on('submit','#usercedit',function (event){
        event.preventDefault();

        var $form=$(this),
        data = $form.serialize();
        url = $form.attr('action');

        var posting = $.post(url,{formData:data});
        posting.done(function(data){
          //  alert(data)
            if(data.fail){
                 $("#errmsg").html("<center class='alert alert-danger'>"+data.message+"</center>");    
                $.each(data.errors,
                function (index,value){
                     var errorDiv = "#"+index+"_error";
                   $(errorDiv).html("<center class='text-danger'>"+value+"</center>");
                });
                  
            }//fail function 
                else if(data.success){
                 $("#errmsg").html("<center class='alert alert-success'>"+data.message+"</center>"); 
                }//success
            //function done
        });
          posting.fail(function(data) {
            var err=data;
     console.log( data );
     $("#errmsg").html("<center class='alert alert-danger'>Inernal Server Error please try again</center>")   
                
  });

});
  
  //user activate deactivate accounts
   $(document).on('click','.userdeactivate',function (event){
        event.preventDefault();

        var $form=$(this),
        data = $form.attr('info'),
        url = $form.attr('url'),
        send = 'ids='+data;

        var posting = $.ajax({
            type: 'post',
            url: url,
            data: send,
            success: function (data) {
            
            }
        });

        posting.done(function(data){
          //  alert(data)
            if(data.fail){
                 $("#errmsg").html("<center class='alert alert-danger'>"+data.message+"</center>");    
                  
            }//fail function 
                else if(data.success){
                 $($form).html("Activate").removeClass('btn-danger').addClass('btn-primary'); 
                }//success
            //function done
        });
          posting.fail(function(data) {
            var err=data;
     console.log( data );
     $("#errmsg").html("<center class='alert alert-danger'>Inernal Server Error please try again</center>");   
                
  });
});

           //user activate deactivate accounts
   $(document).on('click','.useractivate',function (event){
        event.preventDefault();

        var $form=$(this),
        data = $form.attr('info'),
        url = $form.attr('url'),
        send = 'ids='+data;


        var posting = $.ajax({
            type: 'post',
            url: url,
            data: send,
            success: function (data) {
            
            }
        });
        posting.done(function(data){
          //  alert(data)
            if(data.fail){
                 $("#errmsg").html("<center class='alert alert-danger'>"+data.message+"</center>");    
            }//fail function 
                else if(data.success){
                 $($form).html("deactive").removeClass('btn-primary').addClass('btn-danger'); 
                }//success
            //function done
        });
          posting.fail(function(data) {
            var err=data;
     console.log( data );
     $("#errmsg").html("<center class='alert alert-danger'>Inernal Server Error please try again</center>");   
                
  });

});

});