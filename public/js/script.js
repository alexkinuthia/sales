// Homepage carousel
$(function(){

    // $("#myCarousel").load(function(){
    //     $('.carousel-caption').css({'transform': 'rotate(0deg) scale(1) skew(1deg) translate(10px)',
    // 'transition': 'all 1s ease 0s'});

    //     $("#firstimg").on('hover',function(e){
    //     $('.carousel-caption').css({
    //         'text-align': 'center',
    // 'top': '55%',
    // 'font-size': '19px',
    // 'margin-left':'0%',
    // 'height': '25%',
    // 'border-radius': '5px',
    // 'opacity': '0.7',
    // 'color':'#ecf0f1',
    // 'width': '60%',
    // 'background-color': '#2980b9',
    // 'padding-bottom':'20px',
    //  'padding-top':'0px',
    // 'transform': 'rotate(0deg) scale(0) skew(1deg) translate(0px)'
    //     });
    // });

    // });  
    $("#myCarousel").bind('slid.bs.carousel',function(e){
    	$('.carousel-caption').css({'transform': 'rotate(0deg) scale(1) skew(1deg) translate(10px)',
    'transition': 'all 1s ease 0s'});
    });
    $("#myCarousel").bind('slide.bs.carousel',function(e){
    	$('.carousel-caption').css({
    		'text-align': 'center',
 	'top': '55%',
 	'font-size': '19px',
 	'margin-left':'0%',
 	'height': '25%',
 	'border-radius': '5px',
 	'opacity': '0.7',
    'color':'#ecf0f1',
 	'width': '60%',
 	'background-color': '#2980b9',
     'padding-bottom':'20px',
     'padding-top':'0px',
 	'transform': 'rotate(0deg) scale(0) skew(1deg) translate(0px)'
    	});
    });

     //signup form and validation form submit
    $("#signupform").submit(function (event){
        event.preventDefault();

        var $form=$(this),
        data = $form.serialize();
        url = $form.attr('action');

        var posting = $.post(url,{formData:data});
        posting.done(function(data){
          //  alert(data)
            if(data.fail){
                $.each(data.errors,
                function (index,value){
                     var errorDiv = "#"+index+"_error";
                   $(errorDiv).html("<center class='text-danger'>"+value+"</center>");

                    $("#successMessage").html("<center class='alert alert-danger'>You cannot proceed check your fields above</center>");
                });
            }//fail function 
                if(data.success){
                  $("#successMessage").html("<center class='alert alert-success'>You have successfully created your account please go <a href='http://localhost/rosca/public/login'>login</a> with your details</center>")   
                }//success
            //function done
        });
          posting.fail(function(data) {
            var err=data;
     console.log( data );
     $("#successMessage").html("<center class='alert alert-danger'>Inernal Server Error please try again</center>")   
                
  });

    });

$("#loginform").submit(function (event){
        event.preventDefault();

        var $form=$(this),
        data = $form.serialize();
        url = $form.attr('action');

        var posting = $.post(url,{formData:data});
        posting.done(function(data){
          //  alert(data)
            if(data.fail){
                if(data.cred =='wrong')
                {
                 $("#successMessage").html("<center class='alert alert-danger'>"+data.errors+"</center>");    
                }
                 $('#errmsg').html("<center class='alert alert-danger'>"+data.message+"</center>");
                $.each(data.errors,
                function (index,value){
                     var errorDiv = "#"+index+"_error";
                   $(errorDiv).html("<center class='text-danger'>"+value+"</center>");
                });
                  
            }//fail function 
                else if(data.success){
                  //   alert(data.success);
                  //alert(data.url)
                  if(data.from=='branch')
                  {
                    window.location ='http://localhost/martins/public/seeproduct';
                  }
                  else{
                  // $("#successMessage").html("<center class='alert alert-success'>You have successfully created your account please go <a href='http://localhost/rosca/public/login'>login</a> with your details</center>")   
                  window.location ='http://localhost/martins/public/seeproduct';
                  }
                }//success
            //function done
        });
          posting.fail(function(data) {
            var err=data;
     console.log( data );
     $("#successMessage").html("<center class='alert alert-danger'>Inernal Server Error please try again</center>")   
                
  });
        //alert(data);

    });



});