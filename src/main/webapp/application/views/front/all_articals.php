<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designingmedia.com/html/estate-plus/ by HTTrack Website Copier/3.x [XR&CO'2005], Fri, 15 Jul 2016 04:18:49 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>All Images | Welcome to YIKSON </title>
	<?php include("include/header_css.php"); ?>
	<?php
		 $uid=$this->session->userdata('user_id');
		 $user_data=$this->usermodel->getUserData($uid);
		 $main_user_url='';
		  if($user_data['0']->member_photo!='')
		 {
			 $main_user_url=base_url()."assets/uploads/profiles/".$user_data['0']->member_photo;
		 }
		 else
		 {
			 $main_user_url=base_url()."assets/front/images/page_2/profile_pic_left.png";
		 }
	 ?>
</head>
<body>

<!-- Body Start here -->
<div class="wrap">
	<!-- header start -->
		<?php include('include/inner_header.php');?>
	<!-- header end -->
	<!-- images tabs starts -->
			<div>

				<!-- Nav tabs -->
				<div class="secnd_main">
					<div class="container">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
							<ul class="nav nav-tabs img_tabs" role="tablist">
								<!--<li role="presentation" class="active"><a href="#home1" aria-controls="home1" role="tab" data-toggle="tab">&nbsp;</a></li>
								<li role="presentation"><a href="#profile1" aria-controls="profile1" role="tab" data-toggle="tab">&nbsp;</a></li> -->
								<li role="presentation" class="active">&nbsp;</li>
								<li role="presentation">&nbsp</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="home1">
						<section class="secnd_main2">
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				<p class="hidden-lg hidden-md hidden-sm menu_bar" id="list_page"> CATEGORIES &nbsp; &nbsp; &nbsp; <i class="fa fa-bars" aria-hidden="true"></i></p>
				<!---- for mobile --->
				<ul class="img_tabs_menu menu_view" id="list_view" style="display:none;">

				    <?php if(count($all_categories)>0){ for($ij=0;$ij<count($all_categories);$ij++){ ?>
					<li><a href="<?php echo site_url('all_images_category/'.$all_categories[$ij]->cid); ?>"><?php echo $all_categories[$ij]->cname;?></a></li>
					<?php } } ?>
				</ul>
				<!---- for desktop --->
				<ul class="img_tabs2 hidden-xs" id="list_view">
					 <?php if(count($all_categories)>0){ for($ij=0;$ij<count($all_categories);$ij++){ ?>
					<li><a href="<?php echo site_url('all_images_category/'.$all_categories[$ij]->cid); ?>"><?php echo $all_categories[$ij]->cname;?></a></li>
					<?php } } ?>
				</ul>
			</div>
		</div>
	</section>
	<section class="clearfix main_page pad_tp11_px">
		<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 tb_pad hidden-xs">
					<div class="row">
					<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 tb_pad">
						<div class="row">
							<div class="col-lg-3 col-xs-2 col-md-3 col-sm-4">
							<img src="<?php echo $main_user_url;?>" alt="Profile Pic"> 
							</div>
							<div class="col-lg-9 col-xs-10 col-md-9 col-sm-8">
								<p class="user_name"><?php echo $this->session->userdata('full_name');?></p>
							</div>
						</div>
						<p class="switch pull-left hidden-xs"><a href="#" class="ash">Switch Profile &nbsp; <i class="fa fa-caret-right" style="vertical-align: sub"></i></a></p>
					</div>
					<!-- desktop following -->
					<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 hidden-xs tb_pad">
						<h2 class="ash fol"><b>Following : </b></h2>
						<ul class="following">
						<?php 
							 if(count($all_followings)>0)
							 { 
								 for($ij=0;$ij<count($all_followings);$ij++)
								 {
							?>
								<li><a href="<?php echo site_url('friend_profile/'.$all_followings[$ij]['mid']); ?>" ><span class="glyphicon glyphicon-user user_img"></span>&nbsp;&nbsp;<?php echo $all_followings[$ij]['full_name'];?> </a></li>
							<?php } } ?>
						</ul>
					</div>
					</div>
					</div>
				
				<div class="col-lg-10 col-sm-10 col-xs-12 col-md-10">
					<!-- Row 1 Start -->

                       <?php if(count($all_posts)>0){ for($ij=0;$ij<count($all_posts);$ij++){
					   $uid=$all_posts[$ij]['posted_by'];
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
					   
					   ?>

			<div class="col-lg-3 col-xs-11 col-sm-4 col-md-3 mbl_mrg_tp">
						<div class="row">
							<div class="multi_img">
								<div class="img" data-toggle="modal" data-target=".bs-example-modal-lg1"><img src="<?php echo base_url(); ?>assets/uploads/articals_post/<?php echo $all_posts[$ij]['file_name']; ?>" alt="" width="225px" class="img-responsive"></div>
								
								<div class="row">
									<div class="col-lg-6 pull-left">
										<span class="font_9 black"><?php echo $user_data['0']->full_name;?></span>
									</div>
									<div class="col-lg-6 pull-right"> 
										<!--<span class=" pull-right font_9 black"><?php echo $all_gif_posts[$ij]['post_view'];?> &nbsp;<img src="<?php echo base_url(); ?>assets/front/images//page_2/view_small.png"></span> -->
									</div>
								</div>
							</div>
						</div>
					</div>

						<?php } }else{?>
						<div class="error">No images available</div>
					<?php } ?>
					<!-- Row 1 End -->
					
					
					</div>
			</div>
			</div>
		</div>
	</section>
	
					</div>
					<div role="tabpanel" class="tab-pane fade " id="profile1">
						<section class="secnd_main2">
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				<p class="hidden-lg hidden-md hidden-sm menu_bar" id="list_page"> CATEGORIES &nbsp; &nbsp; &nbsp; <i class="fa fa-bars" aria-hidden="true"></i></p>
				<!---- for mobile --->
				<ul class="img_tabs_menu menu_view" id="list_view" style="display:none;">
					 <?php if(count($all_categories)>0){ for($ij=0;$ij<count($all_categories);$ij++){ ?>
					<li><a href="<?php echo site_url('all_images_category/'.$all_categories[$ij]->cid); ?>"><?php echo $all_categories[$ij]->cname;?></a></li>
					<?php } } ?>
				</ul>
				<!---- for desktop --->
				<ul class="img_tabs2 hidden-xs" id="list_view">
					 <?php if(count($all_categories)>0){ for($ij=0;$ij<count($all_categories);$ij++){ ?>
					<li><a href="<?php echo site_url('all_images_category/'.$all_categories[$ij]->cid); ?>"><?php echo $all_categories[$ij]->cname;?></a></li>
					<?php } } ?>
				</ul>
			</div>
		</div>
	</section>

		<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 tb_pad">
					<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 tb_pad">
						<div class="row">
							<div class="col-lg-3 col-xs-2 col-md-3 col-sm-4">
							<img src="<?php echo $main_user_url;?>" alt="Profile Pic"> 
							</div>
							<div class="col-lg-9 col-xs-10 col-md-9 col-sm-8">
								<p class="user_name"><?php echo $this->session->userdata('full_name');?></p>
								<!-- mobile switch -->
								<p class="switch pull-left hidden-lg hidden-sm hidden-md"><a href="#" class="ash">Switch Profile &nbsp; <i class="fa fa-caret-right" style="vertical-align: sub"></i></a></p>
							</div>
						</div>
						<p class="switch pull-left hidden-xs"><a href="#" class="ash">Switch Profile &nbsp; <i class="fa fa-caret-right" style="vertical-align: sub"></i></a></p>
						<!-- mobile following -->
						<h2 class="ash fol pull-left mobile_flw visible-xs hidden-sm hidden-lg hidden-md" id="following"><b>Following  </b></h2>
						<ul class="following mbl_folow" id="flwing" style="display:none;">
							<?php 
							 if(count($all_followings)>0)
							 { 
								 for($ij=0;$ij<count($all_followings);$ij++)
								 {
							?>
								<li><a href="<?php echo site_url('friend_profile/'.$all_followings[$ij]['mid']); ?>" ><span class="glyphicon glyphicon-user user_img"></span>&nbsp;&nbsp;<?php echo $all_followings[$ij]['full_name'];?> </a></li>
							<?php } } ?>
						</ul>
					</div>
					<!-- desktop following -->
					<div class="col-lg-12 col-xs-12 hidden-xs tb_pad">
						<h2 class="ash fol"><b>Following : </b></h2>
						<ul class="following">
						<?php 
							 if(count($all_followings)>0)
							 { 
								 for($ij=0;$ij<count($all_followings);$ij++)
								 {
							?>
								<li><a href="<?php echo site_url('friend_profile/'.$all_followings[$ij]['mid']); ?>" ><span class="glyphicon glyphicon-user user_img"></span>&nbsp;&nbsp;<?php echo $all_followings[$ij]['full_name'];?> </a></li>
							<?php } } ?>
						</ul>
					</div>
					</div>
						
				<div class="col-lg-10 col-sm-10 col-xs-12 col-md-10">
					<!-- Row 1 Start -->

			
                       <?php if(count($all_gif_posts)>0){ for($ij=0;$ij<count($all_gif_posts);$ij++){
					   $uid=$all_gif_posts[$ij]['posted_by'];
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
					   
					   ?>

					<div class="col-lg-3 col-xs-11 col-sm-4 col-md-3 mbl_mrg_tp">
						<div class="row">
							<div class="multi_img">
								<div class="img" data-toggle="modal" data-target=".bs-example-modal-lg1"><img src="<?php echo base_url(); ?>assets/uploads/posts/<?php echo $all_posts[$ij]['file_name']; ?>" alt="" width="225px" class="img-responsive"></div>
								<a href="" class="title_tag"><?php echo $all_gif_posts[$ij]['title'];?></a>
								<div class="row">
									<div class="col-lg-6 pull-left">
										<span class="font_9 black"><?php echo $user_data['0']->full_name;?></span>
									</div>
									<div class="col-lg-6 pull-right"> 
										<span class=" pull-right font_9 black"><?php echo $all_gif_posts[$ij]['post_view'];?> &nbsp;<img src="<?php echo base_url(); ?>assets/front/images//page_2/view_small.png"></span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php } }else{?>
						<div class="error">No gif images available</div>
					<?php } ?>
					<!-- Row 1 End -->
					</div>
			</div>
			</div>
		</div>
	</section>
	
					</div>
				</div>
			</div>
	
	
				
				
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

<!-- Customise JavaScripts -->
<script>
$(document).ready(function(){
    $("#list_page").click(function(){
        $("#list_view").toggle();
    });
});
</script>


<!-- JavaScripts -->
<?php include("include/inner_footer.php"); ?>
		<?php include("include/footer.php"); ?>
<!-- End JavaScripts -->
</body>
</html>