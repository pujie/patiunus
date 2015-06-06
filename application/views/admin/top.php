<div class="top">
    <div class="container">			
        <ul class="loginbar pull-right">
            <li class="devider">&nbsp;</li>
            <li><a href='#'>USER: <?php echo $this->session->userdata['username'];?></a></li>
            <li class="devider">&nbsp;</li>
            <li><a href="page_faq.html" class="login-btn">Help</a></li>	
            <li class="devider">&nbsp;</li>
            <li><a href="<?php echo base_url();?>admin/logout" class="login-btn">Logout</a></li>	
        </ul>
    </div>		
</div><!--/top-->
