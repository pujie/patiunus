<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->  
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Sarung Wadimor</title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/headers/header1.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_responsive.css" />
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" />        
    <!-- CSS Implementing Plugins -->    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/flexslider/flexslider.css" type="text/css" media="screen" />  
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/revolution_slider/css/rs-style.css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/revolution_slider/rs-plugin/css/settings.css" media="screen" />    
    <!-- CSS Theme -->    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/default.css" id="style_color" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/headers/default.css" id="style_color-header-1" />    
</head> 

<body>

<?php $this->load->view('staticview/topnheader');?>

<!--=== Slider ===-->
<div class="fullwidthbanner-container">
    <div class="fullwidthabnner">
        <ul>
<!-- puji 1 start -->
			<li data-transition="3dcurtain-vertical" data-slotamount="10" data-masterspeed="300" data-thumb="<?php echo base_url();?>assets/img/sliders/revolution/thumbs/thumb1.jpg">
				<img src="<?php echo base_url();?>assets/img/sliders/revolution/newcover1b.jpg" />
				
			</li>

<!-- puji 1 end -->
            <!-- THE FIRST SLIDE -->
            <li data-transition="3dcurtain-vertical" data-slotamount="10" data-masterspeed="300" data-thumb="<?php echo base_url();?>assets/img/sliders/revolution/thumbs/thumb1.jpg">

                <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                <img src="<?php echo base_url();?>assets/img/sliders/revolution/newcover2b.jpg" />

            </li>

            <!-- THE SECOND SLIDE -->
            <li data-transition="papercut" data-slotamount="15" data-masterspeed="300" data-delay="9400" data-thumb="<?php echo base_url();?>assets/img/sliders/revolution/thumbs/thumb2.jpg">

                <!-- THE MAIN IMAGE IN THE SECOND SLIDE -->                                               
                <img src="<?php echo base_url();?>assets/img/sliders/revolution/newcover3b.jpg" />

            </li>

            <!-- THE THIRD SLIDE -->
            <li data-transition="slideleft" data-slotamount="1" data-masterspeed="300" data-thumb="assets/img/sliders/revolution/thumbs/thumb3.jpg">

                <!-- THE MAIN IMAGE IN THE THIRD SLIDE -->                                               
                <img src="<?php echo base_url();?>assets/img/sliders/revolution/newcover4b.jpg" />



            </li>

            <!-- THE FOURTH SLIDE -->
            <li data-transition="flyin" data-slotamount="1" data-masterspeed="300" data-thumb="assets/img/sliders/revolution/thumbs/thumb4.jpg">
                
                <!-- THE MAIN IMAGE IN THE FOURTH SLIDE -->                                
                <img src="<?php echo base_url();?>assets/img/sliders/revolution/newcover5b.jpg" />

                <div class="caption lfb boxshadow" data-x="0" data-y="120" data-speed="900" data-start="500" data-easing="easeOutBack">
                     <!--
                     <iframe src="http://player.vimeo.com/video/54035990?title=0&amp;byline=0&amp;portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe> 
                     https://www.youtube.com/watch?v=aBiCgROexuU
                     -->
                     <!-- 
                     <iframe width="420" height="315" src="https://www.youtube.com/embed/aBiCgROexuU" frameborder="0" allowfullscreen></iframe>
                      -->
                     <!--
                     <iframe src="https://www.youtube.com/watch?v=aBiCgROexuU" width="500" height="281" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe> 
                     -->
                </div>

            </li>


        </ul>

        <div class="tp-bannertimer tp-bottom"></div>
    </div>
</div>
<!--=== End Slider ===-->

<!--=== Purchase Block ===-->
<div class="row-fluid purchase margin-bottom-30">
    <div class="container">
		<div class="span9">
            <span>Terasa Istimewa dan Sempurna</span>
            <?php echo $frontblog->content;?>
        </div>
    </div>
</div><!--/row-fluid-->
<!-- End Purchase Block -->

<!--=== Content Part ===-->
<div class="container">	

	<!-- Information Blokcs -->
	<div class="row-fluid margin-bottom-20">
    	<!-- Who We Are -->
		<div class="span8">
			<div class="headline"><h3></h3></div>
			<p>
			<!--
			<iframe width="420" height="315" src="https://www.youtube.com/embed/aBiCgROexuU" frameborder="0" allowfullscreen></iframe>
			-->
			<video width="320" height="240" controls>
			<source src="<?php echo base_url();?>media/tvc.mp4" type="video/mp4">
			</video> 
			</p>	
            <!-- 
            <ul class="unstyled">
            	<li><i class="icon-ok color-green"></i> Jaminan Kualitas</li>
            	<li><i class="icon-ok color-green"></i> Dinamis dan Gaya</li>
            	<li><i class="icon-ok color-green"></i> Produk Unggulan Terpercaya</li>
            	<li><i class="icon-ok color-green"></i> ...</li>
            </ul>
            --><br />

        </div><!--/span8-->        

        <!-- Latest Shots -->
	</div><!--/row-fluid-->	
	<!-- //End Information Blokcs -->

	<!-- Recent Works -->
	<div class="headline"><h3>New Releases</h3></div>
    <ul class="thumbnails">
        <li class="span3">
            <div class="thumbnail-style">
                <a class="fancybox-button zoomer" data-rel="fancybox-button" title="Project #1" href="<?php echo base_url();?>newreleases">
                    <div class="overlay-zoom">	
                        <img src="<?php echo base_url();?>media/new_releases/coverbali.jpg" alt="" />
                        <div class="zoom-icon"></div>					
                    </div>												
                </a>
                <p></p>
            </div>
        </li>
        <li class="span3">
            <div class="thumbnail-style">
                <a class="fancybox-button zoomer" data-rel="fancybox-button" title="Project #1" href="<?php echo base_url();?>newreleases">
                    <div class="overlay-zoom">	
                        <img src="<?php echo base_url();?>media/new_releases/coverbali.jpg" alt="" />
                        <div class="zoom-icon"></div>					
                    </div>												
                </a>
                <p></p>
            </div>
        </li>
        <li class="span3">
            <div class="thumbnail-style">
                <a class="fancybox-button zoomer" data-rel="fancybox-button" title="Project #1" href="<?php echo base_url();?>newreleases">
                    <div class="overlay-zoom">	
                        <img src="<?php echo base_url();?>media/new_releases/coverbali.jpg" alt="" />
                        <div class="zoom-icon"></div>					
                    </div>												
                </a>
                <p></p>
            </div>
        </li>
        <li class="span3">
            <div class="thumbnail-style">
                <a class="fancybox-button zoomer" data-rel="fancybox-button" title="Project #1" href="<?php echo base_url();?>newreleases">
                    <div class="overlay-zoom">	
                        <img src="<?php echo base_url();?>media/new_releases/coverbali.jpg" alt="" />
                        <div class="zoom-icon"></div>					
                    </div>												
                </a>
                <p></p>
            </div>
        </li>
    </ul><!--/thumbnails-->
	<!-- //End Recent Works -->

    
	<!-- Information Blokcs -->
	<div class="row-fluid margin-bottom-20">
    	<!-- Who We Are -->

        <!-- Latest Shots -->
        <div class="span4">
			<div class="headline"><h3>Ragam Produk Wadimor <b></b></h3></div>
			<div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                	<div class="item active">
                    	<img src="<?php echo base_url();?>assets/img/kelas/aac.jpg" alt="" />
                    	<div class="carousel-caption">
                   			<p>AAC</p>
                    	</div>
                  	</div>
	                <?php foreach($kelases as $kelas){?>
    	            	<div class="item">
	                    	<img src="<?php echo base_url();?>assets/img/kelas/<?php echo $kelas->img;?>" alt="" />
                    		<div class="carousel-caption">
	                   			<p><?php echo $kelas->name;?></p>
                    		</div>
                  		</div>
            		<?php }?>
                </div>
                
                <div class="carousel-arrow">
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="icon-angle-left"></i></a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="icon-angle-right"></i></a>
                </div>
			</div>
        </div><!--/span4-->
	</div><!--/row-fluid-->	
	<!-- //End Information Blokcs -->
<?php $this->load->view('staticview/carousel');?>
</div><!--/container-->		
<!-- End Content Part -->

<?php $this->load->view('staticview/footerncopyright');?>

<!-- JS Global Compulsory -->			
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>		
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>	
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<!-- JS Page Level -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/index.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/sarungwadimor.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
      	App.init();
        App.initSliders();
        Index.initRevolutionSlider();     
        playSoundLoop();
		//var snd = new Audio("<?php echo base_url();?>assets/jingle.mp3"); // buffers automatically when created
		//snd.play();			
   
    });
    playSoundLoop = function(){
		myAudio = new Audio('<?php echo base_url();?>assets/jingle.mp3');
		myAudio.addEventListener('ended',function(){
			this.currentTime = 0;
			this.play();
		},false);
		myAudio.play();
	}
</script>
<!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/js/respond.js"></script>
<![endif]-->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29166220-1']);
  _gaq.push(['_setDomainName', 'htmlstream.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>	
