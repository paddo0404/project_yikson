	<section class="clearfix navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12 mbl_padd">
					<div class="col-lg-2 col-xs-1 mbl_padd col-sm-1 col-md-2">
						<a href="<?php echo site_url('dashboard'); ?>" class="img"><img class="img-responsive" src="<?php echo base_url(); ?>assets/front/images/ico/logo_original.png" alt="logo" ></a>
					</div>
					<div class="col-lg-10 mbl_padd col-xs-11 col-sm-11 col-md-10">
						<ul class="menu_list">
							<li class="active"><a href="<?php echo site_url('all_images'); ?>" class="first images"></a></li>
							<li><a href="all_video.php" class="video"></a></li>
							<li><a href="articles.php" class="article"></a></li>
							<li><button type="button" data-toggle="modal" data-target="#myModal" class="addpost"></button></li>
							
							<li class="search_width hidden-xs">
								<div class="input-group">
									<input class="form-control pull-left form-custom" type="text" placeholder="Search..." style="border-width:1px;">
									<span class="input-group-btn">
										<button class="btn btn-search" title="Search" type="button"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</li>
							<!----mobile search--->
							<li class="visible-xs hidden-sm hidden-lg hidden-md"><span  class="search" id="users_search" style="cursor:pointer;"></span></li>
							<li class="profil_name"><a href="Profile_edit.php"><span class="hidden-xs name font_16 pad_tp3_px">Yeswolf </span><img class="vertl_tp" src="assets/images/page_2/profile_pic_left.png" alt="Profile Pic"></a></li>
							<li ><a href="feed.php" class="home"></a></li>
							<!----mobile Timeline--->
							<li><span  class="users name" id="users_details" style="cursor:pointer;"></span></li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>