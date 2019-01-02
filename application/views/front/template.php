<?php
if($this->config->item('maintenance')) { redirect('maintenance/index/'); } ?>
<!DOCTYPE html>
<html>
	<head>
	<script src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>	
	<script src="<?php echo site_url('assets/js/jquery.ihavecookies.js');?>"></script>

<script async="async" src="https://www.google.com/adsense/search/ads.js"></script>

<!-- other head elements from your page -->

<script type="text/javascript" charset="utf-8">
(function(g,o){g[o]=g[o]||function(){(g[o]['q']=g[o]['q']||[]).push(
  arguments)},g[o]['t']=1*new Date})(window,'_googCsa');
</script>

        
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="<?php if(NULL!==$this->config->item('keywords')) echo $this->config->item('keywords'); ?>" />
		<meta name="description" content="<?php if(NULL!==$this->config->item('description')) echo $this->config->item('description'); ?>">
		<meta name="author" content="<?php if(NULL!==$this->config->item('author')) echo $this->config->item('author'); ?>" />
		<meta http-equiv="default-style" content="text/css">

		<meta property="article:published_time" content="<?php echo date("Y-m-d H:i:s") ?>">
		<meta property="article:section" content="">
		<meta property="og:description" content="" />
		<meta property="og:title" content="<?php if(isset($title)) echo $title; ?>" />
		<meta property="og:url" content="<?php echo current_url(); ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="<?php echo site_url(''); ?>" />

		<link rel="icon" href="<?php echo site_url('assets/images/favicon.ico'); ?>" type="image/x-icon">

		<title><?php if(isset($title)) echo $title; ?></title>

<script> var site_base_url = "<?php echo base_url(); ?>"; </script>

		<!-- Alert js -->
        <link href="<?php echo site_url('assets/css/sweet-alert.css'); ?>" rel="stylesheet" type="text/css">
		<!-- Slider -->
        <link href="<?php echo site_url('assets/css/bootstrap-slider.min.css'); ?>" rel="stylesheet" type="text/css"/>

		<link href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo site_url('assets/css/new.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo site_url('assets/css/core.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo site_url('assets/css/components.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo site_url('assets/css/icons.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo site_url('assets/css/pages.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo site_url('assets/css/responsive.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
		<style>
			#top,.searchForm input,#language-select{
				background-color: <?php echo $this->config->item('header_background'); ?> !important;
			}
			.searchForm input,#language-select{
				border:1px solid #CECECE;
			}
		#caret{
			vertical-align:middle;
			padding-bottom:12px;
		}
		#gdpr-cookie-message button{
		 background-color : <?php echo $this->config->item('header_background'); ?> ! important;
		}
		</style>

		<?php if(isset($JaxonCSS)) echo $JaxonCSS; ?>

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->

		<script src="<?php echo site_url('assets/js/modernizr.min.js'); ?>"></script>
	</head>

<body class="fixed-left front">
<div id="top">
<div id="burger">
<a href="#">
<i class="fa fa-bars fa-2x" aria-hidden="true"></i>
<i class="fa fa-caret-up fa-lg" id="caret"></i>
</a>
</div>
<div id="topMid">
<?php if(!empty($this->config->item('logo'))){ ?>
<a href="<?php echo site_url(''); ?>" class="logo"><?php if(NULL!==$this->config->item('logo')) echo $this->config->item('logo'); ?></a>
<?php }else{ ?>
<a href="<?php base_url();?>">
<h2 id="headerTop">
	<span class="green">C</span><span class="yellow">r</span><span class="orange">a</span><span class="red">z</span><span class="purple">y</span>Games
</h2>
</a>
<?php } ?>

<div id="language-select">
	<ul class="nav navbar-nav navbar-right pull-right">
		<li class="language_switch dropdown top-menu-item-xs">
			<?php
			if(!$this->session->userdata('site_lang')){
				$this->session->set_userdata('site_lang','english');
			}

			$flag = "";

    		if($this->session->userdata('site_lang')=='english'){
    			$flag = 'flag-icon-us';
    		}
    		if($this->session->userdata('site_lang')=='french'){
    			$flag = 'flag-icon-fr';
    		}
    		if($this->session->userdata('site_lang')=='chinese'){
    			$flag = 'flag-icon-cn';
    		}
    		if($this->session->userdata('site_lang')=='dutch'){
    			$flag = 'flag-icon-nl';
    		}
    		if($this->session->userdata('site_lang')=='philipino'){
    			$flag = 'flag-icon-ph';
    		}
    		if($this->session->userdata('site_lang')=='german'){
    			$flag = 'flag-icon-de';
    		}
    		if($this->session->userdata('site_lang')=='hindi'){
    			$flag = 'flag-icon-in';
    		}
    		if($this->session->userdata('site_lang')=='indonasian'){
    			$flag = 'flag-icon-id';
    		}
    		if($this->session->userdata('site_lang')=='italian'){
    			$flag = 'flag-icon-it';
    		}
    		if($this->session->userdata('site_lang')=='japanese'){
    			$flag = 'flag-icon-jp';
    		}
    		if($this->session->userdata('site_lang')=='korean'){
    			$flag = 'flag-icon-kr';
    		}
    		if($this->session->userdata('site_lang')=='polish'){
    			$flag = 'flag-icon-pl';
    		}
    		if($this->session->userdata('site_lang')=='portuguese'){
    			$flag = 'flag-icon-pt';
    		}
    		if($this->session->userdata('site_lang')=='romanian'){
    			$flag = 'flag-icon-ro';
    		}
    		if($this->session->userdata('site_lang')=='russian'){
    			$flag = 'flag-icon-ru';
    		}
    		if($this->session->userdata('site_lang')=='spanish'){
    			$flag = 'flag-icon-es';
    		}
    		if($this->session->userdata('site_lang')=='turkish'){
    			$flag = 'flag-icon-tr';
    		}
    		if($this->session->userdata('site_lang')=='vietnamese'){
    			$flag = 'flag-icon-vn';
    		}

			?>
			<a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon <?php echo $flag; ?>"> </span><?php echo ucfirst($this->session->userdata('site_lang'));?></a>
		    <div class="dropdown-menu" aria-labelledby="dropdown09">
		    	<?php 
		    	foreach($languages as $language){
		    		$flag = "";

		    		if(lcfirst($language->lang_name)=='english'){
		    			$flag = 'flag-icon-us';
		    		}
		    		if(lcfirst($language->lang_name)=='french'){
		    			$flag = 'flag-icon-fr';
		    		}
		    		if(lcfirst($language->lang_name)=='chinese'){
		    			$flag = 'flag-icon-cn';
		    		}
		    		if(lcfirst($language->lang_name)=='dutch'){
		    			$flag = 'flag-icon-nl';
		    		}
		    		if(lcfirst($language->lang_name)=='philipino'){
		    			$flag = 'flag-icon-ph';
		    		}
		    		if(lcfirst($language->lang_name)=='german'){
		    			$flag = 'flag-icon-de';
		    		}
		    		if(lcfirst($language->lang_name)=='hindi'){
		    			$flag = 'flag-icon-in';
		    		}
		    		if(lcfirst($language->lang_name)=='indonasian'){
		    			$flag = 'flag-icon-id';
		    		}
		    		if(lcfirst($language->lang_name)=='italian'){
		    			$flag = 'flag-icon-it';
		    		}
		    		if(lcfirst($language->lang_name)=='japanese'){
		    			$flag = 'flag-icon-jp';
		    		}
		    		if(lcfirst($language->lang_name)=='korean'){
		    			$flag = 'flag-icon-kr';
		    		}
		    		if(lcfirst($language->lang_name)=='polish'){
		    			$flag = 'flag-icon-pl';
		    		}
		    		if(lcfirst($language->lang_name)=='portuguese'){
		    			$flag = 'flag-icon-pt';
		    		}
		    		if(lcfirst($language->lang_name)=='romanian'){
		    			$flag = 'flag-icon-ro';
		    		}
		    		if(lcfirst($language->lang_name)=='russian'){
		    			$flag = 'flag-icon-ru';
		    		}
		    		if(lcfirst($language->lang_name)=='spanish'){
		    			$flag = 'flag-icon-es';
		    		}
		    		if(lcfirst($language->lang_name)=='turkish'){
		    			$flag = 'flag-icon-tr';
		    		}
		    		if(lcfirst($language->lang_name)=='vietnamese'){
		    			$flag = 'flag-icon-vn';
		    		}
		    		?>
		    			<a class="dropdown-item" href="<?php echo CUSTOM_BASE_URL;?>langswitch/switchlang/<?php echo lcfirst($language->lang_name); ?>"><span class="flag-icon <?php echo $flag;?>"></span><?php echo ucfirst($language->lang_name);?></a>	
		    		<?php
		    	}
		    	?>
		        <!--<a class="dropdown-item" href="<?php echo CUSTOM_BASE_URL;?>langswitch/switchlang/english"><span class="flag-icon flag-icon-us"> </span>  English</a>
		        <a class="dropdown-item" href="<?php echo CUSTOM_BASE_URL;?>langswitch/switchlang/french"><span class="flag-icon flag-icon-fr"> </span> French</a>-->
		    </div>
		</li>
	</ul>
</div>
<form class="searchForm cf" method="get">
<input id="search" type="text" name="q" placeholder="" value="<?php echo $_REQUEST['q']; ?>" required />
<?php
	$search_url = site_url('/');
	if($this->uri->segment(1)){
		$search_url.=$this->uri->segment(1)."/";
	}
	if($this->uri->segment(2)){
		$search_url.=$this->uri->segment(2)."/";
	}
	if($this->uri->segment(1)=='game' || $this->uri->segment(1)=='tags'){
		$search_url=site_url('/');	
	}
?>
<input type="button" class="button" value="search" id="search_form_submit" onclick="window.location='<?php echo $search_url; ?>?q='+document.getElementById('search').value;"/>
</form>

</div>
</div>
<div id="rest">
<div id="menu">
<ul  style="display:block;">
<li>
    <ul class="menu_main">
        <li>
        	<?php
        		$home_url = site_url('');
        		/*if($_REQUEST['q']){
        			$home_url .="?q=".$_REQUEST['q'];
        		}*/
        	?>
        	<a href="<?php echo $home_url; ?>" class="<?php echo ($this->uri->segment(1) == '')?'active':'';?> waves-effect waves-light"><?php echo $this->lang->line('home'); ?></a>
        </li>
        <li>
        	<?php
        		$popular_url = site_url('popular/');
        		/*if($_REQUEST['q']){
        			$popular_url .="?q=".$_REQUEST['q'];
        		}*/
        	?>
        	<a href="<?php echo $popular_url; ?>" class="<?php echo ($this->uri->segment(1) == 'popular')?'active':'';?> waves-effect waves-light"><?php echo $this->lang->line('best'); ?></a>
        </li>
        <li>
        	<?php
        		$news_url = site_url('news/');
        		/*if($_REQUEST['q']){
        			$news_url .="?q=".$_REQUEST['q'];
        		}*/
        	?>
        	<a href="<?php echo $news_url; ?>" class="<?php echo ($this->uri->segment(1) == 'news')?'active':'';?> waves-effect waves-light"><?php echo $this->lang->line('news'); ?></a>
        </li>        
        <li>
        	<?php
        		$rated_url = site_url('rated/');
        		/*if($_REQUEST['q']){
        			$rated_url .="?q=".$_REQUEST['q'];
        		}*/
        	?>
        	<a href="<?php echo $rated_url; ?>" class="<?php echo ($this->uri->segment(1) == 'rated')?'active':'';?> waves-effect waves-light"><?php echo $this->lang->line('topRated'); ?></a>
        </li>
        <li>
        	<?php
        		$featured_url = site_url('featured/');
        		/*if($_REQUEST['q']){
        			$featured_url .="?q=".$_REQUEST['q'];
        		}*/
        	?>
        	<a href="<?php echo $featured_url; ?>" class="<?php echo ($this->uri->segment(1) == 'featured')?'active':'';?> waves-effect waves-light"><?php echo $this->lang->line('featured'); ?></a>
        </li>
        
        <!--<li><a href="<?php echo site_url(); ?>" class="waves-effect waves-light"><?php echo $this->lang->line('alphabetic'); ?></a></li>-->
   </ul>
</li>
								<?php if(isset($getCategories)) echo $getCategories; ?>
								<!-- <li><a href="<?php echo site_url('members/'); ?>" class="waves-effect waves-light hidden-xs"><?php echo $this->lang->line('members'); ?></a></li> -->

<li id="tags" class="cf">
<div class="d-inline">
<a href="<?php echo site_url('tags');?>">tags <img border="0" src="data:image/gif;base64,R0lGODlhBwAIALMAAAAAAP///xMTFF1gYlteYCgqKzEzNDo8PTk7PB8gIP///wAAAAAAAAAAAAAAAAAAACH5BAEAAAoALAAAAAAHAAgAAAQTcMg5kLjXjAJ6IhL3UQdInWgaAQA7" alt="arrow" width="7" />
</a>
<span>
	<?php 
		if(isset($tags)) echo $tags;
	?>
</span>
</div>
</li>
</ul>
</div>
</div>

		<!-- Begin page -->
		<div id="wrapper">

			<!-- Top Bar Start -->			

			<!-- Top Bar End -->

			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page m-t-0" id="content">
				<!-- Start content -->
				<div class="content">
					<?php if(isset($content)) echo $content; ?>
				</div> <!-- End content -->
				<footer class="footer navbar-default">
					<div class="container">
						<div class="row">
							<div class="col-md-3 col-lg-offset-1">
								<a href="<?php echo site_url(''); ?>" class="logo"><?php if(NULL!==$this->config->item('logo')) echo $this->config->item('logo'); ?></a>
							</div>
							<div class="col-md-5 col-md-offset-1">
								<ul class="nav navbar-nav pull-right">
									<?php if(isset($getFooter)) echo $getFooter; ?>
								</ul>
							</div>
							<div class="col-lg-2 col-md-3">
								<ul class="social-icons">
									<?php if($this->config->item('demo')) { ?>
									<li><a href="http://www.coffeetheme.com"><i class="fa fa-coffee"></i></a></li>
									<?php } ?>
									<?php if($this->config->item('facebook')) { ?>
									<li><a href="<?php echo $this->config->item('facebook'); ?>"><i class="fa fa-facebook"></i></a></li>
									<?php } ?>
									<?php if($this->config->item('twitter')) { ?>
									<li><a href="<?php echo $this->config->item('twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
									<?php } ?>
									<?php if($this->config->item('google')) { ?>
									<li><a href="<?php echo $this->config->item('google'); ?>"><i class="fa fa-google-plus"></i></a></li>
									<?php } ?>
								</ul>
							</div>
						</div> <!-- end row -->
					</div> <!-- end container -->
				</footer>
			</div>
			<!-- ============================================================== -->
			<!-- End Right content here -->
			<!-- ============================================================== -->

			<!-- Back to top -->
	        <a href="#" class="back-to-top" id="back-to-top"> <i class="fa fa-angle-up"></i> </a>
		</div>
		<div class="background"></div>
		<!-- END wrapper -->
		<script>
			var resizefunc = [];
		</script>
		<!-- jQuery  -->
		<script src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo site_url('assets/js/detect.js'); ?>"></script>
		<script src="<?php echo site_url('assets/js/fastclick.js'); ?>"></script>
		<script src="<?php echo site_url('assets/js/jquery.slimscroll.js'); ?>"></script>
		<script src="<?php echo site_url('assets/js/jquery.blockUI.js'); ?>"></script>
		<script src="<?php echo site_url('assets/js/waves.js'); ?>"></script>
		<script src="<?php echo site_url('assets/js/wow.min.js'); ?>"></script>
		<script src="<?php echo site_url('assets/js/jquery.nicescroll.js'); ?>"></script>
		<script src="<?php echo site_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>
		<!-- Rating js -->
        <script src="<?php echo site_url('assets/plugins/raty-fa/jquery.raty-fa.js'); ?>"></script>
        <script src="<?php echo site_url('assets/js/jquery.rating.js'); ?>"></script>
        <!-- Alert js -->
        <script src="<?php echo site_url('assets/js/sweet-alert.min.js'); ?>"></script>
        <script src="<?php echo site_url('assets/js/jquery.sweet-alert.init.js'); ?>"></script>
		<!-- Slider js -->
        <script src="<?php echo site_url('assets/js/bootstrap-slider.min.js'); ?>"></script>
		<script src="<?php echo site_url('assets/js/jquery.ui-sliders.js'); ?>"></script>
        <!-- jQuery Core -->
		<script src="<?php echo site_url('assets/js/jquery.core.js'); ?>"></script>
		<script src="<?php echo site_url('assets/js/jquery.app.js'); ?>"></script>
        <!-- Bootstrap Files  -->
		<script src="<?php echo site_url('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js');?>"></script>
		<!-- Google Analytic -->
		<?php echo $this->config->item('google_analytics'); ?>

<script type="text/javascript">
$(document).ready(function(){
    $("#burger").click(function(){
        $("#rest").toggleClass("hidden-xs hidden-sm hidden-md hidden-lg");      
        $("#content").toggleClass("m-t-40 m-t-0"); 
        $("#game_play_page").toggleClass("m-t-0 m-t-30");       
        $("#caret").toggleClass("fa-caret-down fa-caret-up");
    });
// $('#exampleModal').modal('show');
$('body').ihavecookies({
  title: "<?php echo ucfirst($this->config->item('sitename'))." ".ucfirst($this->config->item('terms'))." Policy";?>",
  message: "We and our partners collect data and use cookies for ad personalization and measurement, content personalization and traffic analysis. By continuing on our website you consent to it. Learn how reading our Privacy Policy and Cookie Policy.",
  link:"<?php echo base_url('page/privacy-policy/');?>",
  delay: 2000,
  expires: 30, // 30 days  
});
	
});


</script>

</body>
</html>
