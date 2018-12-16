<?php
if($this->config->item('maintenance')) { redirect('maintenance/index/'); } ?>
<!DOCTYPE html>
<html>
	<head>
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
<input type="button" class="button" value="search" id="search_form_submit" onclick="window.location='<?php echo site_url('/'); ?>?q='+document.getElementById('search').value;"/>
</form>

</div>
</div>
<div id="rest">
<div id="menu">
<ul  style="display:block;">
<li>
    <ul class="menu_main">
        <li><a href="<?php echo site_url(''); ?>" class="<?php echo ($this->uri->segment(1) == '')?'active':'';?> waves-effect waves-light"><?php echo $this->lang->line('home'); ?></a></li>
        <li><a href="<?php echo site_url('popular/'); ?>" class="<?php echo ($this->uri->segment(1) == 'best')?'active':'';?> waves-effect waves-light"><?php echo $this->lang->line('best'); ?></a></li>
        <li><a href="<?php echo site_url('news/'); ?>" class="<?php echo ($this->uri->segment(1) == 'news')?'active':'';?> waves-effect waves-light"><?php echo $this->lang->line('news'); ?></a></li>        
        <li><a href="<?php echo site_url('rated/'); ?>" class="<?php echo ($this->uri->segment(1) == 'rated')?'active':'';?> waves-effect waves-light"><?php echo $this->lang->line('topRated'); ?></a></li>
        <li><a href="<?php echo site_url('featured/'); ?>" class="<?php echo ($this->uri->segment(1) == 'featured')?'active':'';?> waves-effect waves-light"><?php echo $this->lang->line('featured'); ?></a></li>
        
        <!--<li><a href="<?php echo site_url(); ?>" class="waves-effect waves-light"><?php echo $this->lang->line('alphabetic'); ?></a></li>-->
   </ul>
</li>
								<?php if(isset($getCategories)) echo $getCategories; ?>
								<!-- <li><a href="<?php echo site_url('members/'); ?>" class="waves-effect waves-light hidden-xs"><?php echo $this->lang->line('members'); ?></a></li> -->

<li id="tags" class="cf">
<div class="d-inline">
<a href="#">tags <img border="0" src="data:image/gif;base64,R0lGODlhBwAIALMAAAAAAP///xMTFF1gYlteYCgqKzEzNDo8PTk7PB8gIP///wAAAAAAAAAAAAAAAAAAACH5BAEAAAoALAAAAAAHAAgAAAQTcMg5kLjXjAJ6IhL3UQdInWgaAQA7" alt="arrow" width="7" />
</a>
<span>
<?php if(isset($tags)) echo $tags;?>
</span>
</div>
</li>
</ul>
</div>
</div>
		<!-- Begin page -->
		<div id="wrapper">

			<!-- Top Bar Start -->
		<!-- 	<div class="topbar">

				<!-- LOGO -->
				
				<!-- Button mobile view to collapse sidebar menu -->
				<!-- <div class="navbar navbar-default" role="navigation">

				<div class="container bg-primary">
				<div class="col-lg-6">
				<div class="col-lg-1">
				 <button class="toggle-button" data-toggle="collapse" data-target="#"
    				aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">    				
    				<i class="glyphicon glyphicon-align-justify"></i>
    			</button>
				</div>
				<div class="col-lg-5 col-lg-offset-4">
					<div class="topbar-left">
						<div class="text-center">
							<a href="<?php echo site_url(''); ?>" class="logo"><?php if(NULL!==$this->config->item('logo')) echo $this->config->item('logo'); ?></a>
						</div>
				    </div>
				</div>
				</div>
				<div class="col-lg-6"> -->
						
							<!-- <ul class="nav navbar-nav">
								<li><a href="<?php echo site_url(''); ?>" class="waves-effect waves-light"><?php echo $this->lang->line('home'); ?></a></li>
								<?php if(isset($getCategories)) echo $getCategories; ?>
								<li><a href="<?php echo site_url('members/'); ?>" class="waves-effect waves-light hidden-xs"><?php echo $this->lang->line('members'); ?></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tags<span class="caret"></span></a>
									<ul class="dropdown-menu">							
								    <?php if(isset($tags)) echo $tags;?>
									</ul>
								</li>
							</ul> -->


							<!-- <ul class="nav navbar-nav">
								<li>
								<form role="search" class="navbar-left app-search pull-left hidden-xs hidden-md">
								 <input type="text" id="search" name="q" placeholder="<?php echo $this->lang->line('searchForm'); ?>" value="<?php echo $_REQUEST['q'] ?>" class="form-control">
								 <a href="#" onclick="window.location.href='<?php echo site_url('search?q='); ?>'+document.getElementById('search').value;"><i class="fa fa-search"></i></a>
							    </form>
								</li> -->
							<!-- 	<li class="language_switch dropdown top-menu-item-xs">
									<?php
									if(!$this->session->userdata('site_lang')){
										$this->session->set_userdata('site_lang','english');
									}
									?>
									<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon <?php if($this->session->userdata('site_lang')=='english'){ echo "flag-icon-us";} if($this->session->userdata('site_lang')=='french'){ echo "flag-icon-fr";} ?>"> </span><?php echo ucfirst($this->session->userdata('site_lang'));?></a>
		                            <div class="dropdown-menu" aria-labelledby="dropdown09">
		                                <a class="dropdown-item" href="<?php echo CUSTOM_BASE_URL;?>langswitch/switchlang/english"><span class="flag-icon flag-icon-us"> </span>  English</a>
		                                <a class="dropdown-item" href="<?php echo CUSTOM_BASE_URL;?>langswitch/switchlang/french"><span class="flag-icon flag-icon-fr"> </span>French</a>
		                            </div>
								</li> -->
							<!-- 	<li class="dropdown top-menu-item-xs">
									<a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo (isset($this->session->name_image)) ? (site_url('uploads/images/users/'.$this->session->name_image)) : (site_url('assets/images/default-user.png')); ?>" alt="<?php echo $this->session->username; ?>" class="img-circle"> </a>
									<ul class="dropdown-menu">

									<?php if($this->session->id) { ?>
										<li><a href="<?php echo site_url('user/'.$this->session->url.'/'); ?>"><i class="ti-user m-r-10 text-custom"></i> <?php echo $this->lang->line('profile'); ?></a></li>
										<li><a href="<?php echo site_url('myprofile/'); ?>"><i class="ti-agenda m-r-10 text-custom"></i> <?php echo $this->lang->line('settings'); ?></a></li>
									<?php } ?>

									<?php if($this->session->admin) { ?>
										<li><a href="<?php echo site_url('dashboard/'); ?>"><i class="ti-settings m-r-10 text-custom"></i> <?php echo $this->lang->line('dashboard'); ?></a></li>
									<?php } ?>

									<?php if(!$this->session->id) { ?>
										<li><a href="<?php echo site_url('login/register/'); ?>"><i class="ti-lock m-r-10 text-custom"></i><?php echo $this->lang->line('signup'); ?></a></li>
									<?php } ?>

										<li class="divider"></li>
										<li><a href="<?php echo site_url((isset($_SESSION['username'])) ? 'login/logout' : 'login/'); ?>"><i class="ti-power-off m-r-10 <?php echo (isset($_SESSION['username'])) ? 'text-danger' : 'text-success'; ?>"></i> <?php echo (isset($_SESSION['username'])) ? $this->lang->line('logout') : $this->lang->line('login'); ?></a></li>
									</ul>
								</li> -->
					<!-- 		</ul>
					</div> -->
						<!--/.nav-collapse -->
				<!-- 	</div>
					<div class="row">
					<div class="lower-nav">
						<div class="col-lg-1">
						</div>
						<div class="col-lg-11">
						<ul class="nav navbar-nav">
								<li><a href="<?php echo site_url(''); ?>" class="waves-effect waves-light"><?php echo $this->lang->line('home'); ?></a></li>
								<?php if(isset($getCategories)) echo $getCategories; ?>
								<li><a href="<?php echo site_url('members/'); ?>" class="waves-effect waves-light hidden-xs"><?php echo $this->lang->line('members'); ?></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tags<span class="caret"></span></a>
									<ul class="dropdown-menu">							
								    <?php if(isset($tags)) echo $tags;?>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
				</div>
			</div> -->

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
		<script src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
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
		<?php //echo $this->config->item('google_analytics'); ?>

<script type="text/javascript">
$(document).ready(function(){
    $("#burger").click(function(){
        $("#rest").toggleClass("hidden-xs hidden-sm hidden-md hidden-lg");      
        $("#content").toggleClass("m-t-40 m-t-0");        
        $("#caret").toggleClass("fa-caret-down fa-caret-up");
    });
});
</script>

</body>
</html>
