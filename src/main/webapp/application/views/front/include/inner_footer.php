<!-- Customise JavaScripts -->
<script>


$("#arrowRotate").click(function() { 
       var _this = $(this);
       var current = _this.attr("src");
       var swap = _this.attr("data-swap");     
     _this.attr('src', swap).attr("data-swap",current);   
});
$("#arrowRotate1").click(function() { 
       var _this = $(this);
       var current = _this.attr("src");
       var swap = _this.attr("data-swap");     
     _this.attr('src', swap).attr("data-swap",current);   
});
$("#arrowRotate2").click(function() { 
       var _this = $(this);
       var current = _this.attr("src");
       var swap = _this.attr("data-swap");     
     _this.attr('src', swap).attr("data-swap",current);   
});
$("#arrowRotate3").click(function() { 
       var _this = $(this);
       var current = _this.attr("src");
       var swap = _this.attr("data-swap");     
     _this.attr('src', swap).attr("data-swap",current);   
}); 

$("#arrowRotate4").click(function() { 
       var _this = $(this);
       var current = _this.attr("src");
       var swap = _this.attr("data-swap");     
     _this.attr('src', swap).attr("data-swap",current);   
}); 

$('.extra_options li').click(function(e){
    e.preventDefault();
    $(this).find('small').toggleClass('balck red');
});
</script>
<script>
$(document).ready(function(){
    $("#following").click(function(){
        $("#flwing").toggle();
    });
});

$(document).ready(function(){
    $("#public_post").click(function(){
        $("#public_view").toggle();
    });
});
</script>
<script>
$(document).ready(function(){
    $("#users_details").click(function(){
	$(this).toggleClass("comment_i");
        $("#users_view").toggle();
    });
});
</script>
<script>
$(document).ready(function(){
    $("#users_search").click(function(){
	$(this).toggleClass("comment_i");
        $("#users_vserc").toggle();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#commnets_tag").click(function(){
	$(this).toggleClass("comment_i");
        $("#comments").toggle();
    });
	
	$("#commnets_tag1").click(function(){
	$(this).toggleClass("comment_i");
        $("#comments1").toggle();
    });
	
	$("#commnets_tag2").click(function(){
	$(this).toggleClass("comment_i");
        $("#comments2").toggle();
    });
	
	$("#commnets_tag3").click(function(){
	$(this).toggleClass("comment_i");
        $("#comments3").toggle();
    });
});

</script>


<script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#newpost_frm").validate({
    
        // Specify the validation rules
        rules: {
            your_message: "required"
        },
        
        // Specify the validation error messages
        messages: {
            your_message: "Please enter your message"
        },
        
        submitHandler: function(form) {form.submit();}
    });

	 $("#newpost_frm").validate({
    
        // Specify the validation rules
        rules: {
            upload_image: "required",
			image_title: "required",
			image_desc: "required"
        },
        
        // Specify the validation error messages
        messages: {
			upload_image: "Please upload Image",
            image_title: "Please enter title",
			image_desc :"Please enter message"
        },
        
        submitHandler: function(form) {form.submit();}
    });

	

  });

  
  </script>