<section>
<div class="container-fluid">

		<div class="row">
            <div class="col-sm-3">
                <div>
                    <img class="img-responsive" src="http://visarity-ad-pakfiles.s3.amazonaws.com/web/images/v3ad-8b8f-9a7f-8ea7-7c30b_regular.jpg" style="width: 80%; height: 100%; float: right;">
                </div>
                <div id="FavGames">

                </div>
                <!--<div class="panel panel-default" style="width: 80%; float: right; margin-top: 15px;">
                    <div class="panel-heading" style="padding: 0px;">
                        <img src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg" class="img-responsive">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
                <div class="panel panel-default" style="width: 80%; float: right;">
                    <div class="panel-heading" style="padding: 0px;">
                        <img src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg" class="img-responsive">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
                <div class="panel panel-default" style="width: 80%; float: right;">
                    <div class="panel-heading" style="padding: 0px;">
                        <img src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg" class="img-responsive">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
                <div class="panel panel-default" style="width: 80%; float: right;">
                    <div class="panel-heading" style="padding: 0px;">
                        <img src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg" class="img-responsive">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
                <div class="panel panel-default" style="width: 80%; float: right;">
                    <div class="panel-heading" style="padding: 0px;">
                        <img src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg" class="img-responsive">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
                <div class="panel panel-default" style="width: 80%; float: right;">
                    <div class="panel-heading" style="padding: 0px;">
                        <img src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg" class="img-responsive">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
                <div class="panel panel-default" style="width: 80%; float: right;">
                    <div class="panel-heading" style="padding: 0px;">
                        <img src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg" class="img-responsive">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>-->
            </div>
			<div class="col-sm-6">

				<div class="game-full-box text-center">
<!--					--><?php //if($type != 2) { ?>
<!--					<div class="row">-->
<!--						<div class="col-sm-12">-->
<!--							<div class="slider slider-inverse">-->
<!--								<input id="slider" type="text" data-plugin="range-slider" value="" data-slider-orientation="horizontal" data-slider-min="200" data-slider-max="1300" data-slider-value="800" data-slider-tooltip="hide">-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					--><?php //} ?>
				<?php if($type == 1) { ?>
					<div id="gameBox">
						<object id="flash" type="application/x-shockwave-flash" data="<?php echo site_url('uploads/files/games/'.$file.''); ?>" title="<?php echo $title_game; ?>" width="800" height="666">
							<param name="movie" value="<?php echo site_url('uploads/files/games/'.$file); ?>">
							<param name="quality" value="high">
							<param name="wmode" value="transparent">
							<param name="bgcolor" value="#000000">
							<param name="allowFullScreen" value="true">
                            <p><a href="http://get.adobe.com/flashplayer"><?php echo $this->lang->line('installFlash'); ?></a></p>
						</object>
					</div>
				<?php } elseif($type == 2) { ?>
					<div id="gameBox" class="p-t-20 p-b-20">
						<object type="application/x-shockwave-flash" data="/assets/flash/emulator.swf" title="<?php echo $title_game; ?>" width="<?php echo emul($console, 'width'); ?>" height="<?php echo emul($console, 'height'); ?>">
							<param name="movie" value="/assets/flash/emulator.swf">
							<param name="bgcolor" value="#000000">
							<param name="allowscriptaccess" value="sameDomain">
							<param name="allowFullScreen" value="true">
							<param name="allowFullScreenInteractive" value="true">
							<param name="flashvars" value="system=<?php if(isset($console)) echo $console; ?>&amp;url=<?php echo site_url('uploads/files/games/'.$file.''); ?>">
                            <p><a href="http://get.adobe.com/flashplayer"><?php echo $this->lang->line('installFlash'); ?></a></p>
						</object>
					</div>
				<?php } else { ?>
					<div id="gameBox">
						<iframe id="object" src="<?php if(isset($embed)) echo $embed;  ?>" type="application/vnd.adobe.flash-movie" width="850" height="800" scrolling="no" frameborder="0" style="width: 831px; height: 600px;"></iframe>
					</div>
				<?php } ?>
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-4" style="text-align: left">
                                <h3 class="inline"><b><a href="<?php echo site_url('game/show/'.$url.'/'); ?>"><?php if(isset($title_game)) echo $title_game; ?></a></b></h3>
                                <div><div id="<?php echo (isset($this->session->id)) ? 'rating' : 'nr-rating'; ?>" class="inline" data-score="<?php if(isset($getNote)) echo $getNote; ?>" data-game="<?php if(isset($id)) echo $id; ?>"></div></div>
                            </div>
                            <div class="col-sm-4" style="text-align: left">
                                <h4 class="inline">Played <?php if(isset($played)) echo $played; ?> times</h4>
                                <div class="inline">
                                    <p>
                                        <i class="fa fa-thumbs-up"></i>&nbsp;&nbsp;1234&nbsp;&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-thumbs-down"></i>&nbsp;&nbsp;1234
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4" style="text-align: left">
                                <div class="slider slider-inverse">
                                    <input id="slider" type="text" data-plugin="range-slider" value="" data-slider-orientation="horizontal" data-slider-min="200" data-slider-max="718" data-slider-value="718" data-slider-tooltip="hide">
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary waves-effect waves-light" id="fullscreen"> <i class="fa fa-arrows-alt"></i></button>
                            </div>
                        </div>
                        <div>
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV3pT1OEqd9RoXvBj9dWm42IfH3SWidy5hRDJdUnVjDOklimyS">
                        </div>
                        <div style="text-align: left; margin-top: 15px;">
                            
                                <a id="<?php echo $id; ?>" href="#" class="make_fav"><i class="text-warning fa fa-star-o"></i></a> <b>Add to your favourites</b>
                        </div>
                    </div>
				</div>
                <div class="card-box">
                    <h4><b>GAME DESCRIPTION</b></h4>
                    <p class="text-muted"><?php if(isset($description)) echo $description; ?></p>
                </div>
                <div class="card-box">
                <h4><b><?php echo $this->lang->line('comments'); ?></b><?php echo $nbRows; ?></h4>

                    <?php if(isset($this->session->username)) {    ;?>
                    <form action="<?php echo base_url('comments/add_comment');?>" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="What are your thoughts?" name="comments" id="comments">
                            <input type="hidden" name="author" value="<?php echo $this->session->userdata('id');?>"> 
                            <input type="hidden" name="game_id" value="<?php echo $id; ?>">
                            <input type="hidden" name="back_url" value="<?php echo current_url();?>">                       
                            <span class="input-group-btn">
                            <button type="input" class="btn btn-default" <?php if(isset($this->session->commented)) echo 'disabled';?>><?php echo $this->lang->line('send'); ?></button>
                            </span>
                        </div>
                    </form>
                    <?php } ?>
                    <div class="row" style="margin-top: 20px;">
                        <?php if(isset($getBestComs)) {
                        
                        echo $getBestComs['getCommments'];

                        } else { ?>
                            <p>&nbsp;&nbsp;&nbsp;No comments found.</p>
                        <?php } ?>
                    </div>                   
                    <hr>
                    <?php if(!isset($this->session->username)){?>
                    <a href="<?php echo base_url('/login/');?>"><?php echo $this->lang->line('loginForComment'); ?></a>
                    <?php }else{?>
                        <a href="<?php echo base_url('login/logout/');?>"><?php echo $this->lang->line('logout'); ?></a>
                    <?php }?>
                    <div style="text-align: center">
                        <?php if(isset($getPagination)) echo $getPagination; ?>
                    </div>
                </div>
                <div class="card-box">
                    <h4><b>Related Games</b></h4>
                    <div class="row" style="all: inherit; border: none;">
                        <?php if(isset($getRelatedGames)) echo $getRelatedGames; ?>                 
                    </div>
                    <div style="text-align: center">
                        <a class="btn btn-default" href="<?php echo site_url('category/'.$category.'/'); ?>">Show More</a>
                    </div>
                </div>
                <div class="card-box">
                    <h4><b>Recommended Games</b></h4>
                    <div class="row" style="all: inherit; border: none;">
                <?php if(isset($getRecGame)) echo $getRecGame;?>
                    </div>
                     <div style="text-align: center">
                        <a class="btn btn-default" href="<?php echo base_url('/popular/'); ?>">Show More</a>
                    </div>
                </div>
			</div>
            <div class="col-sm-3 right-col">
                <div class="card-box">
                    <img class="img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-W64DLCjhQNC53b6lQaAlO8wLqoGFvF52UoqjRpCm76rkfLpo">
                </div>
                <div class="card-box">
                    <img class="img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-W64DLCjhQNC53b6lQaAlO8wLqoGFvF52UoqjRpCm76rkfLpo">
                </div>
                <div class="panel panel-default" style="margin-top: 50px;">
                    <div class="panel-heading" style="padding: 0px;">
                        <img class="img-responsive" src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 0px;">
                        <img class="img-responsive" src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 0px;">
                        <img class="img-responsive" src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 0px;">
                        <img class="img-responsive" src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 0px;">
                        <img class="img-responsive" src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 0px;">
                        <img class="img-responsive" src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 0px;">
                        <img class="img-responsive" src="http://www.pebhub.com/wp-content/uploads/2015/10/300x200-300x200.jpg">
                    </div>
                    <div class="panel-body">
                        <b>Game Name</b>
                        <p style="margin-top: 10px;">Rating: 80% &nbsp; &middot; &nbsp; 123,231,000 plays</p>
                    </div>
                </div>
            </div>
		</div>
      

	</div> <!-- end container -->
</section>

<script>
window.onload = function() {
	$(".fullscreen .slider").hover(
	  function() {
	    $(this).toggleClass('slidershow');
	});
	$("a#reply").click(function() {
		var id = $(this).parent().data("id");
		$("input#related").val(id);
	});
	$("a.finger-up").click(function() {
		var id = $(this).parent().data("id");
		$.get("/game/likesComs/"+id+"/1");
		var pos = $(this);
		pos.children().toggleClass('text-primary');
		pos.next().children().removeClass('text-danger');
	});
	$("a.finger-down").click(function() {
		var id = $(this).parent().data("id");
		$.get("/game/likesComs/"+id+"/0");
		var pos = $(this);
		pos.children().toggleClass('text-danger');
		pos.prev().children().removeClass('text-primary');
	});
    $(".make_fav").click(function(e){
        e.preventDefault();
        var game_id = $(this).attr('id');
        var fav_ids = [];
        if(localStorage.getItem("favrote_games")){
            fav_ids=JSON.parse(localStorage.getItem("favrote_games"));
        }
        fav_ids.push(game_id);
        //console.log(fav_ids);
        localStorage.setItem("favrote_games", JSON.stringify(fav_ids));
        alert("Game Has Been Added As Favourites!!!!");
    });


    var fav_ids = JSON.parse(localStorage.getItem("favrote_games"));

    $.ajax({
        type:'POST',
        url:'<?php echo base_url('favrote/loadGames');?>',
        data:{fav_ids:fav_ids},
        beforeSend:function(){
            //$('.load-more').show();
            if($("#page").val()>1){
            $('#loadingDiv').show('');
            }
            $("#page").val(Number($("#page").val())+Number(1));
        },
        success:function(html){
            // /$('.load-more').remove();
            $('#loadingDiv').hide();
            $('#FavGames').append(html);
            /*var cw = $('.thumb-img').width()/1.3;
            $('.thumb-img').css({'height':cw+'px'});*/
        }
    });

};
</script>