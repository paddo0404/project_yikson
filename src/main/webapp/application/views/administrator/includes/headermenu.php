
   <div class="navbar-header pull-left"> <a href="#" class="navbar-brand"> <small> 
      <i class="icon-leaf"></i> <?php echo stripslashes($site_settings['0']->title); ?> </small> </a>
      <!-- /.brand -->
    </div>
<div class="navbar-header pull-right" role="navigation" style="width:150px;"> 
      <ul class="nav ace-nav">
        
        

        <li class="light-blue" style="width:150px;"> <a data-toggle="dropdown" href="#" class="dropdown-toggle"> 
         
          <span class="user-info"  style="width:150px;text-align:right;" > <small>Welcome,</small> <?php  echo $this->session->userdata("admin_username"); ?> </span> <i class="icon-caret-down"></i> 
          </a> 
          <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close"  >
            <li> <a href="<?php echo site_url('administrator/settings'); ?>"> <i class="icon-cog"></i> Settings </a> </li>
            <li> <a href="<?php echo site_url('administrator/myprofile'); ?>"> <i class="icon-user"></i> My Profile </a> </li>
            <li class="divider"></li>
            <li> <a href="<?php echo site_url('administrator/logout'); ?>"> <i class="icon-off"></i> Logout </a> </li>
          </ul>
        </li>
      </ul>
      <!-- /.ace-nav -->
    </div>