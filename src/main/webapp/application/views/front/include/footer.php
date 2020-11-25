<script src="<?php echo base_url(); ?>assets/front/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/front/js/05.bootstrap-datepicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/front/js/jquery.validate.min.js"></script>


<script>
  
  // When the browser is ready...
  $(function() {
  
    // New post
    $("#newpost_frm").validate({
    
        // Specify the validation rules
        rules: {
            your_message: "required",
        },
        
        // Specify the validation error messages
        messages: {
            your_message: "Please enter your message",
        },
        
        submitHandler: function(form) {form.submit();}
    });

  
  });

  
  </script>