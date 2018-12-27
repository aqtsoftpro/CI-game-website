<section>
<div class="container m-t-20" id="game_play_page">
        <div class="row">
            <div class="hidden-xs hidden-sm hidden-md col-lg-2 col-xl-2">
                <div class="left-add" >
                <?php echo $this->config->item('sidebartop'); ?> 
                </div>       
               <div class='col-sm-12 fav_title text-center'><div class="card-box"><h4>Your Favourite Games</h4></div></div>
                <div class="col-sm-12" id="FavGames">
                </div> 
                <div class="col-sm-12 col-sm-push-2 play_show_more text-center">
                <a href="<?php echo base_url('/?playedgames');?>" class="btn btn-primary">Show More</a>
                </div>             
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-xl-12">

                <!-- <div class="game-full-box text-center"> -->
              <div class="col-12 fullscreen" id="game_video">
                <div class="game-full-box text-center">                 
                <?php if($type == 1) { ?>
                    <div id="gameBox">
                        <object id="flash" type="application/x-shockwave-flash" data="<?php echo site_url('uploads/files/games/'.$file.''); ?>" title="<?php echo $title_game; ?>" width="800" height="600">
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
                        <iframe id="object" src="<?php if(isset($embed)) echo $embed;  ?>" type="application/vnd.adobe.flash-movie" width="850" height="600" scrolling="no" frameborder="0"></iframe>
                    </div>
                <?php } ?>
                </div>
        
    <div class="game-panel-btn">
                <!-- <button class="btn btn-primary waves-effect waves-light" id="exit-fullscreen" style="float:right;display:none;" onclick="closeFullscreen();">
                    <i class="fa fa-compress" aria-hidden="true"></i></button> -->
                </div>
    </div> <!-- end container -->
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-8" style="text-align: left">
                                <h3 class="inline"><b><a href="<?php echo site_url('game/show/'.$url.'/'); ?>"><?php if(isset($title_game)) echo $title_game; ?></a></b></h3>
                                <div><div id="<?php echo (isset($this->session->id)) ? 'rating' : 'nr-rating'; ?>" class="inline" data-score="<?php if(isset($getNote)) echo $getNote; ?>" data-game="<?php if(isset($id)) echo $id; ?>"></div></div>
                            </div>
                          
                            <div class="col-sm-4" style="text-align: left">
                                <?php if($type != 2) { ?>
                  <!--   <div class="row"> -->
                        <div class="col-sm-6">
                            <!-- <div class="slider slider-inverse">
                                <input id="slider" type="text" data-plugin="range-slider" value="" data-slider-orientation="horizontal" data-slider-min="200" data-slider-max="1300" data-slider-value="800" data-slider-tooltip="hide">
                            </div> -->
                        </div>
                    <!-- </div> -->
                    <?php } ?>
                        <!-- <button class="btn btn-primary waves-effect waves-light" id="fullscreen" onclick="openFullscreen();" style="margin-left:25px;">
                        <i class="fa fa-arrows-alt"></i>
                        </button> -->
                        </div>
                        </div>
                        <div class="bottom-adds">
                        <?php echo $this->config->item('sidebarbottom'); ?>
                        </div>
                    <div class="row" style="margin-top: 8px;">
                        <div class="col-sm-4" style="text-align: left; margin-top: 15px;">                            
                                <a id="<?php echo $id; ?>" href="#" class="make_fav"><i class="text-warning fa fa-star-o" id="fav_star"></i><b style="color:#615555;margin-left: 6px;">Add to your favourites</b></a>
                        </div>
                        <div class="col-sm-4">
                        <h4>Played <?php if(isset($played)) echo $played; ?> times</h4>
                        </div>
                        <div class="col-sm-4 col-sm-push-1">
                        <div class="inline">
                                <p>
                                <div class="col-sm-2 likes_unlike" style="width: 150px;display: inline;">
                                
                                    <div class="nbLikes" style="display:inline-block;float:left; width:60px;">
                                    <a href="#" class="finger-up text-primary"  id="<?php echo $id;?>">
                                    <i class="fa fa-thumbs-up fa-2x" id="like"></i>
                                    </a><span class="likes_no">
                                    <?php echo isset($ClickLikes['nbLike'])? $ClickLikes['nbLike']: '0';?></span>
                                    </div>
                                    <div class="nbUnLike" style="display:inline-block;float:left;width:60px;">                                
                                        <a href="#" class="finger-down text-primary"  id="<?php echo $id;?>">
                                        <i class="fa fa-thumbs-down fa-2x"></i></a>
                                        <span class="unlikes_no"><?php echo isset($ClickLikes['nbUnlike'])? $ClickLikes['nbUnlike']: '0';?></span>
                                    </div>
                                </div>
                                </p>
                                </div>
                        </div>
                    </div><!-------------------play and favourit name--->
                    </div>
                <!-- </div> -->
                <div class="card-box">
                    <h4><b>GAME DESCRIPTION</b></h4>
                    <p class="text-muted"><?php if(isset($description)) echo $description; ?></p>
                </div>
                <div class="card-box">
                    <h4>GAME CONTROLS</h4>
                <div class="row">
                <?php
                if(empty($controls)){
                echo '<h4>No Controls Specified Yet!!!</h4>';
                }else{
                foreach($controls as $control) {
                ?>
                    <div class="col-sm-2">
                        <div class="control">
                        <img src="<?php echo base_url('/uploads/controls/'.$control->image.'')?>" width="100%" height="70px">
                        <div class="text-center control-title"><h5><?php echo $control->control_name; ?></h5></div>
                        </div>
                    </div>
                <?php } } ?>
                </div>
                </div>
                <div class="card-box">                          
                <?php
                if($this->session->has_userdata('message')){ 
                echo $this->session->userdata('message');
                $this->session->unset_userdata('message');
                }

                ?>
          
                <h4><b><?php echo $this->lang->line('comments'); ?>&nbsp;</b><?php echo $nbRows; ?></h4>

                    <?php if(isset($this->session->username)) {    ;?>
                    <form action="<?php echo base_url('comments/add_comment');?>" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="What are your thoughts?" name="comments" id="comments">
                            <input type="hidden" name="author" value="<?php echo $this->session->userdata('id');?>"> 
                            <input type="hidden" name="game_id" value="<?php echo $id; ?>">
                            <input type="hidden" name="back_url" value="<?php echo current_url();?>"> 
                            <span class="input-group-btn">
                            <button type="input" class="btn btn-default" <?php if(($this->session->game_id)==$id) echo 'disabled';?>><?php echo $this->lang->line('send'); ?></button>
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
                    <a href="<?php echo base_url('/login/');?>"><?php echo $this->lang->line('login');?></a><?php echo $this->lang->line('loginForComment'); ?>
                    <?php }else{?>
                        <a href="<?php echo base_url('login/logout/');?>"><?php echo $this->lang->line('logout'); ?></a>
                    <?php }?>
                    <div style="text-align: center">
                        <?php if(isset($getPagination)) echo $getPagination; ?>
                    </div>
                </div>
                <div class="card-box">
                    <h4><b>Related Games</b></h4>
                    <div class="row related_games" >
                        <?php if(isset($getRelatedGames)) echo $getRelatedGames; ?>                 
                    </div>
                    <div style="text-align: center">
                        <a class="btn btn-default" href="<?php echo site_url('category/'.$category.'/'); ?>">Show More</a>
                    </div>
                </div>
                <div class="card-box">
                    <h4><b>Recommended Games</b></h4>
                    <div class="row rec_games">
                <?php if(isset($getRecGame)) echo $getRecGame;?>
                    </div>
                     <div style="text-align: center">
                        <a class="btn btn-default" href="<?php echo base_url('/popular/'); ?>">Show More</a>
                    </div>
                </div>
            </div>
            <div class="hidden-xs hidden-sm col-md-2 col-lg-2 col-xl-2 right-col side_bars">
                <div class="col-sm-12 right-add" >             
                <?php echo $this->config->item('sidebarcontent');?>
                </div>
                <div class="col-sm-12" id="played_games_panel">
                   <?php echo $getPlayedGames;?>
                </div>
                <div class="col-sm-12 col-sm-pull-2 play_show_more play_show_more-right text-center">
                <a href="<?php echo base_url('/played_games');?>" class="btn btn-primary show_more" >Show More</a>
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
    $("#exit-fullscreen").css("display","none");
	$("a#reply").click(function() {
		var id = $(this).parent().data("id");
		$("input#related").val(id);
	});
	$("a.finger-up").click(function(e) {
        e.preventDefault();
		var id = $(this).attr('id');
		$.get("<?php echo site_url('/game/likesComs/')?>"+id+"/1")
        .done(function( data ) {
        var res_like = JSON.parse(data);             
        $(".likes_no").html(res_like.nbLike);
        $(".unlikes_no").html(res_like.nbUnlike);        
        }, "json");
		/*var pos = $(this);
        console.log(pos);
		pos.children().toggleClass('text-primary');
		pos.next().children().removeClass('text-danger');*/
	});

	$("a.finger-down").click(function(e) {
        e.preventDefault();
		var id = $(this).attr('id');
		// $.get("/game/likesComs/"+id+"/0");
        $.get("<?php echo site_url('/game/likesComs/')?>"+id+"/0")
        .done(function( data ) {
        var res_unlike = JSON.parse(data);              
        $(".likes_no").html(res_unlike.nbLike);
        $(".unlikes_no").html(res_unlike.nbUnlike);        
        }, "json");
		
		
	});
    $(".make_fav").click(function(e){
        e.preventDefault();
        var game_id = $(this).attr('id');
        var starElement = document.getElementById("fav_star");     
        var fav_ids = [];
        
        
        if(localStorage.getItem("favrote_games")){
            fav_ids=JSON.parse(localStorage.getItem("favrote_games"));
        }
       
        var index = fav_ids.indexOf(game_id);
        if(index > -1){
            fav_ids.splice(index,1);           
            $("#fav_star").toggleClass("fa-star fa-star-o");
            localStorage.setItem("favrote_games", JSON.stringify(fav_ids));            
            loadFavGames();
        }else{
        fav_ids.push(game_id);     
        localStorage.setItem("favrote_games", JSON.stringify(fav_ids));
        $("#fav_star").toggleClass("fa-star-o fa-star");             
        loadFavGames();
        }
    });

    var game_id = $(".make_fav").attr('id');
    // console.log(game_id);
    addFav(game_id);

    loadFavGames();
    // get the max length of localstorage
    displayShowMore();

    // $("#like").click(function(){
    //     var game_id = $(this).attr('id');
    //     alert('You have liked'+game_id);
    // })    


};
function loadFavGames(){
    var fav_ids = JSON.parse(localStorage.getItem("favrote_games"));
        fav_ids = fav_ids.slice(0,10);
        console.log(fav_ids);
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
            $('#FavGames').html(html);            
            /*var cw = $('.thumb-img').width()/1.3;
            $('.thumb-img').css({'height':cw+'px'});*/
        }
    });
}
</script>
<script>

var elem = document.getElementById("game_video");
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();    
    document.getElementById("exit-fullscreen").style.display="block";
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
     document.getElementById("exit-fullscreen").style.display="block";    
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
     document.getElementById("exit-fullscreen").style.display="block";    
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
     document.getElementById("exit-fullscreen").style.display="block";   
  }
}

/* Close fullscreen */
function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();    
    $("#exit-fullscreen").css("display", "none");
  } else if (document.mozCancelFullScreen) { /* Firefox */
    document.mozCancelFullScreen();
    $("#exit-fullscreen").css("display", "none");
  } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
    document.webkitExitFullscreen();
    $("#exit-fullscreen").css("display", "none");
  } else if (document.msExitFullscreen) { /* IE/Edge */
    document.msExitFullscreen();
    $("#exit-fullscreen").css("display", "none");
  }
}

function addFav(game_id){    
    var add_favs = [];
        if(localStorage.getItem("favrote_games")){
            add_favs = JSON.parse(localStorage.getItem("favrote_games"));
            var index = add_favs.indexOf(game_id);
            if(index > -1 ){
            $("#fav_star").toggleClass("fa-star-o fa-star");
            }
        }
    }

function displayShowMore(){
    var fav_games = [];
        if(localStorage.getItem("favrote_games")){
            fav_games = JSON.parse(localStorage.getItem("favrote_games"));
            if(fav_games.length>10){
            $(".play_show_more").css("display","block");
            
            }
        }
}

</script>
