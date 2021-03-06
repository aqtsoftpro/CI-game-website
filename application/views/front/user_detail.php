<section>
	<div class="container">
		<div class="row m-t-20">

			<div class="col-md-4 col-lg-3">
				<div class="profile-detail card-box">
					<img src="<?php echo ($image) ? site_url('uploads/images/users/'.$image) : site_url('assets/images/default-user.png'); ?>" class="img-circle" alt="<?php if(isset($username)) echo $username; ?>">
					<ul class="list-inline status-list m-t-20">
						<li>
							<h3 class="text-danger m-b-5"><?php if(isset($nb_favs)) echo $nb_favs; ?></h3>
							<p class="text-muted"><?php echo $this->lang->line('favorites'); ?></p>
						</li>
						<li>
							<h3 class="text-warning m-b-5"><?php if(isset($nb_notes)) echo $nb_notes; ?></h3>
							<p class="text-muted"><?php echo $this->lang->line('notes'); ?></p>
						</li>
						<li>
							<h3 class="text-primary m-b-5"><?php if(isset($nb_coms)) echo $nb_coms; ?></h3>
							<p class="text-muted"><?php echo $this->lang->line('comments'); ?></p>
						</li>
					</ul>
					<hr>
					<h4 class="text-uppercase font-600 m-t-30"><?php echo $this->lang->line('aboutMe'); ?></h4>
					<p class="text-muted font-13 m-b-30"><?php if($about) echo $about; ?></p>
					<div class="text-left">
						<p class="text-muted font-13"><strong><?php echo $this->lang->line('username'); ?> :</strong> <span class="m-l-15"><?php if(isset($username)) echo $username; ?></span></p>

						<?php if($location) echo '<p class="text-muted font-13"><strong>Location :</strong> <span class="m-l-15">'.$location.'</span></p>'; ?>
					</div>
					<div class="button-list m-t-20">
						<?php if($facebook) { ?>
						<a href="<?php echo $facebook; ?>" class="btn btn-facebook waves-effect waves-light"><i class="fa fa-facebook"></i></a>
						<?php } ?>
						<?php if($twitter) { ?>
						<a href="<?php echo $twitter; ?>" class="btn btn-twitter waves-effect waves-light"><i class="fa fa-twitter"></i></a>
						<?php } ?>
						<?php if($google) { ?>
						<a href="<?php echo $google; ?>" class="btn btn-googleplus waves-effect waves-light"><i class="fa fa-google"></i></a>
						<?php } ?>
						<?php if($linkedin) { ?>
						<a href="<?php echo $linkedin; ?>" class="btn btn-linkedin waves-effect waves-light"><i class="fa fa-linkedin"></i></a>
						<?php } ?>
					</div>
				</div>
				<div class="panel panel-color panel-inverse">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<?php echo $this->config->item('sidebartop'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-9 col-md-8">
				<div class="card-box">
					<?php if($seg = $this->uri->segment(2) === 'favorites') { ?>
						<div class="row">
							<div class="col-xs-9">
								<h2 class="header-title m-t-0"><?php echo $this->lang->line('favorites'); ?></h2>
							</div>
							<div class="col-xs-3">
								<div class="pull-right"><a href="<?php echo site_url('user/'.$url.'/'); ?>"><?php echo $this->lang->line('seeAll'); ?></a></div>
							</div>
						</div>
						<?php echo (($getFavsGames) ? $getFavsGames : $this->lang->line('noDataYet'));  ?>
						<div class="text-right">
							<?php if(isset($pagination)) echo $pagination; ?>
						</div>
					<?php } elseif($seg = $this->uri->segment(2) === 'notes') { ?>
						<div class="row">
							<div class="col-xs-9">
								<h2 class="header-title m-t-0"><?php echo $this->lang->line('notes'); ?></h2>
							</div>
							<div class="col-xs-3">
								<div class="pull-right"><a href="<?php echo site_url('user/'.$url.'/'); ?>"><?php echo $this->lang->line('seeAll'); ?></a></div>
							</div>
						</div>
						<table class="table table-striped m-0 text-center">
							<thead>
								<tr>
									<th class="text-center"><?php echo $this->lang->line('game'); ?></th>
									<th class="text-center"><?php echo $this->lang->line('note'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php echo (($getNotesGames) ? $getNotesGames : $this->lang->line('noDataYet')); ?>
							</tbody>
						</table>
						<div class="text-right">
							<?php if(isset($pagination)) echo $pagination; ?>
						</div>
					<?php } else { ?>
						<div class="row">
							<div class="col-xs-9">
								<h2 class="header-title m-t-0"><?php echo $this->lang->line('comments'); ?></h2>
							</div>
							<div class="col-xs-3">
								<div class="pull-right"><a href="<?php echo site_url('user/'.$url.'/'); ?>"><?php echo $this->lang->line('seeAll'); ?></a></div>
							</div>
						</div>
						<?php echo (($getComsGames) ? $getComsGames : $this->lang->line('noDataYet')); ?>
						<div class="text-right">
							<?php if(isset($pagination)) echo $pagination; ?>
						</div>
					<?php } ?>
				</div>
			</div>

		</div>
	</div> <!-- end container -->
</section>
