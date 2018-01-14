$(document).ready(function(){  

	$(window).scroll(function() {
	var scrollPos = $(window).scrollTop(),
	    navbar = $('.x-navbar');

	if (scrollPos > 100) {
	  navbar.addClass('alt-color');
	} else {
	  navbar.removeClass('alt-color');
	}
	});

// <div class="alert alert-success">
// <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
//   <strong>Success!</strong> Indicates a successful or positive action.
// </div>

	$('#submit_up').click(function(event){  
	   var signup = 1;
	   var name = $('#name').val();  
	   var roll = $('#roll').val();  
	   var list = $('#list').val();  
	   var password = "";

	   

	   var pattern_strong = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{9,}/i);
	   // var pattern_medium = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z0-9]{6,8}/i);
	   var pattern_medium = new RegExp(/^[A-Za-z\d$@$!%*?&]{6,8}/i);
	   // var pattern_weak = new RegExp(/^(?=.*[a-z])(?=.*\d)[a-z0-9]{0,4}/i);
	   var pattern_weak = new RegExp(/^[A-Za-z\d$@$!%*?&]{0,5}/i);
	   var pattern_weak_2 = new RegExp(/^[A-Za-z\d]{0,}/i);

	   
	   if (pattern_strong.test($('#password').val())) {
	   		password = $('#password').val(); //add md5 later
	   		$.ajax({  
	             url:"validation.php",
	             method:"POST",  
	             data:{name:name, roll:roll, password:password, list:list, signup:signup},  
	             success:function(data){  
	              $("form").trigger("reset"); 
	              if (data == '<h5 style="color:green; text-align:center;">Successfully registered!</h5>') 
	              {
	                  $('#signup_error').removeClass('alert alert-danger').fadeIn().html('');
	                  $('#signup_success').addClass('alert alert-success').css({"padding-top": "2px", "padding-bottom": "2px"}).fadeIn().html(data); 
	              }  
	              else
	              {
	                  $('#signup_success').removeClass('alert alert-success').fadeIn().html(''); 
	                  $('#signup_error').addClass('alert alert-danger').css({"padding-top": "2px", "padding-bottom": "2px"}).fadeIn().html(data);  
	              } 
	                  // $('#signup_success').fadeIn().html(data);  
	                  // setTimeout(function(){  
	                  //      $('#success_message').fadeOut("Slow");  
	                  // }, 2000);  
	             }  
	        });  
	        event.preventDefault();
	   }
	   else if (pattern_medium.test($('#password').val())) {
	   		// alert("Medium strength of password.");
	   		$.ajax({    
			     success:function(){  
			      // $("form").trigger("reset");  
			      // $('#signup_error').removeClass('alert alert-danger');
			      $('#signup_error').addClass('alert alert-danger').fadeIn().html("Medium strength of password! Try again.<br>Strong password should have at least<br>1 uppercase, 1 lowercase<br>1 special character<br>1 numeric value.");                   
			     }  
			});
	   		event.preventDefault();
	   }
	   else if (pattern_weak.test($('#password').val()) || pattern_weak_2.test($('#password').val())) {
	   		
	   		$.ajax({    
			     success:function(){  
			      // $("form").trigger("reset"); 
			      // $('#signup_error').removeClass('alert alert-danger');
			      $('#signup_error').addClass('alert alert-danger').fadeIn().html("Weak password!. Try again.<br>Strong password should have at least<br>1 uppercase, 1 lowercase<br>1 special character<br>1 numeric value.");                   
			     }  
			});
	   		event.preventDefault();
	   }
	   	      
	});  

	$('#submit_in').click(function(event){  
		
	 var signin = 1;
	 var password_login = $('#password_login').val(); //add md5 later
	 var roll_login = $('#roll_login').val();
	 
	  
	  $.ajax({  
	         url:"validation.php",  
	         method:"POST",  
	         data:{roll_login:roll_login, password_login:password_login, signin:signin},  
	         success:function(data){  
	              // $("form").trigger("reset");
	              if (data == '<h5 style="color:red; text-align:center;">Data did not macth.</h5>' || data == '<h5 style="color:red; text-align:center;">All fields are required.</h5>') 
	              {
	                    $('#signin_error').addClass('alert alert-danger').css({"padding-top": "2px", "padding-bottom": "2px"}).fadeIn().html(data);  
	                   
	              }

	              
	              // $('#signin_success').fadeIn().html(data);
	              // setTimeout(function(){  
	              //      $('#success_message').fadeOut("Slow");  
	              // }, 2000);  
	         }  
	    }); 
	  

	});  

 });  

