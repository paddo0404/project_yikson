<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/header.php'); ?>

</head>
<body>
<div class="navbar navbar-default" id="navbar"> 
  <script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
  <div class="navbar-container" id="navbar-container"> 
 
    <!-- /.navbar-header -->
     <?php include('includes/headermenu.php'); ?>
    <!-- /.navbar-header -->
  </div>
  <!-- /.container -->
</div>
<div class="main-container" id="main-container"> 
  <script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
  <div class="main-container-inner"> <a class="menu-toggler" id="menu-toggler" href="#"> 
    <span class="menu-text"></span> </a> 
    <div class="sidebar" id="sidebar"> 
      <script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>
					 <?php include('includes/leftmenu.php'); ?>
      
      <!-- #sidebar-shortcuts -->
       <?php include('includes/side_menu.php'); ?>
      <!-- /.nav-list -->
      <div class="sidebar-collapse" id="sidebar-collapse"> <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i> 
      </div>
      <script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
    </div>
    <div class="main-content"> 
      <div class="breadcrumbs" id="breadcrumbs"> 
        <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
        <ul class="breadcrumb">
          <li> <i class="icon-home home-icon"></i> <a href="<?php echo site_url('administrator/dashboard'); ?>">Home</a> </li>
          <li>  Registered Members List</li>
         
        </ul>
        <!-- .breadcrumb -->
        <div class="nav-search" id="nav-search"> 
           <?php include('includes/search.php'); ?>
        </div>
        <!-- #nav-search -->
      </div>
      <div class="page-content"> 
        <div class="page-header"> 
        <table><tr><td width="1280px" class="table"><h1> Registered Members List </h1></td><td align="right">
        <a href="<?php echo site_url('administrator/new_member');?>" class="btn  btn-primary">Add New Member</a>
															
        </td></tr></table>
        </div>
        <!-- /.page-header -->
        <div class="row"> 
          <div class="col-xs-12"> 
            <!-- PAGE CONTENT BEGINS -->
           
            <!-- /row -->
         
          
            <div class="row"> 
              <div class="col-xs-12"> 
                    <?php
			if(isset($_GET['ferr'])){  ?>
						
                        <div class="alert alert-danger">
									
											<strong>
												<i class="icon-remove"></i>
												Error!
											</strong>

											<?php echo $_GET['ferr']; ?>
											<br />
										</div>
				<?php }  if(isset($_GET['fsuccess'])) {?>		
                      <div class="alert alert-block alert-success">  <p>
												<strong>
													<i class="icon-ok"></i>
													Success!
												</strong>
												<?php echo $_GET['fsuccess']; ?>
											</p></div>
						<?php } ?>
                <div class="table-responsive"> 
                  <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr> 
                       
                        <th>Sno</th>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Date Of Birth</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                         <?php
					   
					  // print_r($all_admins);
					   
					   $ii=0; for($i=0;$i<count($all_category);$i++){$ii++;   ?>
                      <tr> 
						<td><?=$ii?></td>
						<td><?=stripslashes($all_category[$i]->full_name)?></td>
						<td><?=stripslashes($all_category[$i]->email_id)?></td>
						<td><?=date("M d Y",strtotime($all_category[$i]->date_of_birth))?></td>
						<td><?=stripslashes($all_category[$i]->status)?></td>
						<td><?=$all_category[$i]->createdon?></td>
						
						<td> <a class="green"  href="<?=site_url("administrator/new_member")."/".$all_category[$i]->mid?>"> <i class="icon-pencil bigger-130"></i> 
						</a> 
						
						<a class="red" href="#" onClick="var q = confirm('Are you sure you want to delete this member'); if (q) { window.location = '<?=site_url("administrator/delete_member")?>?action=delete&id=<?php echo $all_category[$i]->mid;?>'; return false;}"> <i class="icon-trash bigger-130"></i> 
						</a></td>

                      </tr>
                     <?php  }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
            <!-- PAGE CONTENT ENDS -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.page-content -->
    </div>
    <!-- /.main-content -->
    
    <!-- /#ace-settings-container -->
  </div>
  <!-- /.main-container-inner -->
  <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> 
  <i class="icon-double-angle-up icon-only bigger-110"></i> </a> </div>
<?php include('includes/footer_top.php'); ?>
<script type="text/javascript">
			jQuery(function($) {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null,null, 
				  { "bSortable": false }
				] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
		</script>
</body>
</html>


