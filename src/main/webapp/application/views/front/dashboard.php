<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>All Feeds | Welcome to YIKSON </title>
<?php include("include/header_css.php"); ?>
	<script type="text/javascript">
	$(document).ready(function(){
			 $(".like, .unlike").click(function()
			 {	
			  var id = this.id;
			  var split_id = id.split("_");
			  var text = split_id[0];
			  var postid = split_id[1];  // postid			  
			  var type = 0;
				if(text == "like"){
					type = 1;
				}else{
					type = 0;
				}
				alert(text);

				  $.ajax({
            url: 'likeunlike.php',
            type: 'post',
            data: {postid:postid,type:type},
            dataType: 'json',
            success: function(data){
                var likes = data['likes'];
                var unlikes = data['unlikes'];		
                $("#likes_"+postid).text(likes);        // setting likes
                $("#unlikes_"+postid).text(unlikes);    // setting unlikes

                if(type == 1){
                    $("#like_"+postid).css("color","#ffa449");
                    $("#unlike_"+postid).css("color","lightseagreen");
                }

                if(type == 0){
                    $("#unlike_"+postid).css("color","#ffa449");
                    $("#like_"+postid).css("color","lightseagreen");
                }


            },
            error: function(data){
                alert("error : " + JSON.stringify(data));
            }
        });

	});
});
	</script>
	
</head>
<body>

<!-- Body Start here -->
<div class="wrap">
	
<?php include('include/inner_header.php');?>
	
	<!-- body start -->
	<section class="clearfix main_page">
		<div class="container mbl_padd">
		<div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12 mbl_padd">
				        <?php
					if(isset($_GET['ferr'])){  ?>
						
                        <div class="alert alert-danger" style="font-size:12px;">
									
											<strong>
												<i class="icon-remove"></i>
												Error!
											</strong>

											<?php echo $_GET['ferr']; ?>
											<br />
										</div>
				<?php }  if(isset($_GET['fsuccess'])) {?>		
                      <div class="alert alert-block alert-success" style="font-size:12px;"> 
												<strong>
													<i class="icon-ok"></i>
													Success!
												</strong>
												<?php echo $_GET['fsuccess']; ?>
											</div>
						<?php } ?>



			<div class="">
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 tb_pad hidden-xs">
					<div class="row">
					<?php include("include/left_menu.php");?>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					
					 <!-- Middle content -->
					 <?php if(count($all_posts)>0)
					 { 
						 for($i=0;$i<count($all_posts);$i++)
						 {
						 $uid=$all_posts[$i]->posted_by;
						 $posts_id = $all_posts[$i]->post_id;
						
						 $user_data=$this->usermodel->getUserData($uid);
						 $user_url='';
						  if($user_data['0']->member_photo!='')
						 {
							 $user_url=base_url()."assets/uploads/profiles/".$user_data['0']->member_photo;
						 }
						 else
						 {
							 $user_url=base_url()."assets/front/images/page_2/profile_pic_left.png";
						 }
						 $friend_url=site_url('edit_profile');
						 if($user_data['0']->mid!=$this->session->userdata('user_id'))
						 {
							$friend_url=site_url('friend_profile/'.$user_data['0']->mid);
						 }
						
						$like_data=$this->usermodel->getlikeunlikecount($posts_id, '1');						
						$unlike_data=$this->usermodel->getlikeunlikecount($posts_id, '0');
						
					 ?>
					 <div class="middle_div  ">
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<div class="col-lg-1 col-xs-2 col-sm-1 col-md-1 no-padding">
									<a href="<?php echo $friend_url;?>"><img src="<?php echo $user_url;?>" alt="Profile Pic" width="28px" style="vertical-align: top"></a>
								</div>
								<div class="col-lg-11 col-xs-10 col-sm-11 col-md-11 no-padding">
									<p class="prof_name1"><a class="" href="<?php echo $friend_url;?>"> <?php echo $user_data['0']->full_name;?> </a> shared <a class="font_16" href=""> User Y</a>'s content</p>
									<p class="prof_name"><small>11 mins</small></p>
								</div>
							</div>
							
						</div>
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<h2 class="title ash"><?php echo stripslashes($all_posts[$i]->message); ?></h2>
								<?php if($all_posts[$i]->extension=='gif' || $all_posts[$i]->extension=='jpg' || $all_posts[$i]->extension=='png' || $all_posts[$i]->extension=='jpeg'){?>
								<div class="img" data-toggle="modal" data-target=".bs-example-modal-lg1">
								<img src="<?php echo base_url(); ?>assets/uploads/posts/<?php echo $all_posts[$i]->file_name; ?>" alt="poster"   class="img_middle  img-responsive cursr">
								</div>
								<?php } ?>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
							<div class="row">
								<ul class="extra_options">
									<li><button id="like_<?php echo $all_posts[$i]->post_id; ?>" class="like"><img id='arrowRotate' class="cursr" src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-left.png" data-swap='<?php echo base_url(); ?>assets/images/page_2/red-thumb.png' /></button><br/><small class="font_9 balck"><?php echo $like_data['0']->cntStatus;?></small></li>
									<li><button id="unlike_<?php echo $all_posts[$i]->post_id; ?>" class="unlike"><img id='arrowRotate1' class="cursr" src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-right.png"  data-swap='<?php echo base_url(); ?>assets/images/page_2/red-unlike.png'></button><br/><small class="font_9 balck"><?php echo $unlike_data['0']->cntStatus;?></small></li>
									<li><button><img src="<?php echo base_url(); ?>assets/front/images/page_2/arrow-down.png"" ></button><br/><small class="font_9 balck">486k</small></li>
									<li><a id="commentss"><img src="<?php echo base_url(); ?>assets/front/images/page_2/comment.png" id='arrowRotate2' class="cursr" data-swap='<?php echo base_url(); ?>assets/images/page_2/red-comment.png'></a><br/><small class="font_9 balck">486k</small></li>
									<li><img id='arrowRotate3' class="cursr"  src="<?php echo base_url(); ?>assets/front/images/page_2/view.png" data-swap='<?php echo base_url(); ?>assets/images/page_2/red-view.png'><br/><small class="font_9 balck">486k</small></li>
								</ul>
								
								<div class="comment_back" id="comments_view" style="display:none;">
									<div class="row">
										<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
											<div class="row">
												<div class="col-lg-1 col-xs-3">
													<img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="Profile Pic">
												</div>
												<div class="col-lg-11">
													<p class="comment_p"><a href="#">Tanisha Mademinetti</a> Hii suma I admire u as a good anchor well u r a good home maker too well a coincidence naa Peru kuda Suma u r inspiror to me to handle profession and family equal</p>
												</div>
											</div>
											
											<div class="row">
												<div class="col-lg-1 col-xs-3">
													<img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="Profile Pic">
												</div>
												<div class="col-lg-11">
													<p class="comment_p"><a href="#">Tanisha Mademinetti</a> Hii suma I admire u as a good anchor well u r a good home maker too well a coincidence naa Peru kuda Suma u r inspiror to me to handle profession and family equal</p>
												</div>
											</div>
											
											<div class="row">
												<div class="col-lg-1 col-xs-1">
													<img src="<?php echo base_url(); ?>assets/front/images/page_2/profile_pic_left.png" alt="Profile Pic">
												</div>
												<div class="col-lg-9 col-xs-8 ">
													<input class="form-control pull-left form-custom1" type="text" placeholder="Write A Comment..." >
												</div>
												<div class="col-lg-2 row col-xs-1">
													<a href="#" class="btn comment_send_btn"> SEND </a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
					<?php } }else{ ?>
						<div class="error">No feed details available</div>
					<?php } ?>
					 <!-- End Middle content -->
				</div>
				<div class="col-lg-3  col-md-3  col-sm-4 col-xs-12 col-lg-offset-0 col-sm-offset-0">
					<?php include 'include/right_advertisements.php';?>
				</div>
				
			</div>
			</div>
		</div>
	</section>
	<!-- body start -->
	<section class="clearfix copyright">
		<div class="container">
			<div class="row">
				
			</div>
		</div>
	</section>
							
	
								<!-- Image Zoom Start -->
								
								<?php include 'include/zoom_image.php' ?>
								<!-- Image Zoom End -->
								
								<!-- Add Post Start -->
								
								<?php include 'include/add_post.php' ?>
								<!-- Add Post End -->
	
										  </div>
										  
										</div>
									  </div>
									</div>
</div>

<script>
$(document).ready(function(){
    $("#commentss").click(function(){
	$(this).toggleClass("comment_i");
        $("#comments_view").toggle();
    });
});
</script>
<!-- JavaScripts -->
<?php include("include/inner_footer.php"); ?>
		<?php include("include/footer.php"); ?>
<!-- End JavaScripts -->
</body>
</html>

