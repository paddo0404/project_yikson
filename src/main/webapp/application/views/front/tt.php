<script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#singup_frm").validate({
    
        // Specify the validation rules
        rules: {
            txtFullName: "required",

            txtEmailID: {
                required: true,
                email: true
            },
		   txtDob: "required",
		   txtPwd: {
					required: true,
					minlength: 6
				},
			 txtRetypePassword: {
					required: true,
					minlength: 6,
					equalTo: "#txtPwd"
				},
				
				city: "required",
				state: "required",
				country: "required",
				/*zip: "required",*/
				mobile:"required"
				
           
        },
        
        // Specify the validation error messages
        messages: {
            txtFullName: "Please enter your full name",
			
             txtEmailID: { required:"Please enter your email address",
					 email:"Please enter valid email address"
					 },
                 txtPwd: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
						
                    },
             txtRetypePassword: {
                        required: "Re-type password",
                        minlength: "Your re-type password must be at least 6 characters long",
						equalTo:"Re-type password must be match with password"
                    },
				txtDob: "Please enter Date of birth",
				city: "Please enter city",
				state: "Please enter state",
				country: "Please choose country",
				/* zip: "Please enter zip code", */
				mobile: "Please enter your first name"
			
        },
        
        submitHandler: function(form) {form.submit();}
    });

  });

  
  </script>


  <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#registerform").validate({
    
        // Specify the validation rules
        rules: {
            first_name: "required",
        	sur_name: "required",
            email: {
                required: true,
                email: true
            },
		   pwd: {
					required: true,
					minlength: 6
				},
			 cnf_password: {
					required: true,
					minlength: 6,
					equalTo: "#pwd"
				},
				address: "required",
				city: "required",
				state: "required",
				country: "required",
				/*zip: "required",*/
				mobile:"required"
				
           
        },
        
        // Specify the validation error messages
        messages: {
            first_name: "Please enter your first name",
			sur_name: "Please enter your sur name",
             email: { required:"Please enter your email address",
					 email:"Please enter valid email address"
					 },
             pwd: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
						
                    },
             cnf_password: {
                        required: "Re-type password",
                        minlength: "Your re-type password must be at least 6 characters long",
						equalTo:"Re-type password must be match with password"
                    },
				address: "Please enter address",
				city: "Please enter city",
				state: "Please enter state",
				country: "Please choose country",
				/* zip: "Please enter zip code", */
				mobile: "Please enter your first name"
			
        },
        
        submitHandler: function(form) {  jQuery.post("http://webstaging.info/irish/user/member_registration", jQuery("#registerform").serialize()) 
          		  .done(function(json) {                        
        try{        
            var obj = jQuery.parseJSON(json);
		
			  var  err=obj['STATUS'].toString();
			
		     if(err=="success")
			 {
				 window.location.href="http://webstaging.info/irish/myaccount/profile";
			 }
			else if(err=="exists")
			 {
			 	document.getElementById("emailerr_msg").innerHTML ="Email Id already existed";
				document.getElementById('email').value='';
				document.getElementById('email').focus();
			 }

			 else
			 {
			 	document.getElementById("err_msg").innerHTML =obj['STATUS'];
			 }

        }catch(e) {     
            alert('Exception while request..');
        }       
        });}
    });

  });
  
  </script>