<section>
	<div class="container">

		<div class="row m-t-20">
			<div class="col-sm-12 m-l-10">
				<a href="<?php echo site_url('news/'); ?>" class="btn btn-inverse btn-custom btn-rounded waves-effect waves-light"><?php echo $this->lang->line('news'); ?></a>
				<a href="<?php echo site_url('popular/'); ?>" class="btn btn-inverse btn-custom btn-rounded waves-effect waves-light"><?php echo $this->lang->line('popular'); ?></a>
				<a href="<?php echo site_url('rated/'); ?>" class="btn btn-inverse btn-custom btn-rounded waves-effect waves-light"><?php echo $this->lang->line('topRated'); ?></a>
				<a href="<?php echo site_url(); ?>" class="btn btn-inverse btn-custom btn-rounded waves-effect waves-light"><?php echo $this->lang->line('alphabetic'); ?></a>
			</div> <!-- end col -->
		</div> <!-- end row -->

		<div class="row m-t-20">
			<input type="hidden" name="page" id="page" value="1">
			<input type="hidden" name="orderby" id="orderby" value="<?php  echo $this->uri->segment(1);?>">
			<div id="loadGames" class="col-sm-12 col-lg-12 col-md-12">
			</div> <!-- end col -->
			<div id="loadingDiv"><img src="<?php echo  CUSTOM_BASE_URL;?>assets/images/loading.gif" /></div>
		</div> <!-- end row -->

	</div> <!-- end container -->
</section>

<script>
	window.onload = function() {
		load_data($("#page").val(),$("#orderby").val());

		$(window).scroll(function(){
		 	if(($(window).scrollTop() == $(document).height() - $(window).height())){
	            load_data($("#page").val());
	        }
		});
	};
	function load_data(page,orderby){
		$.ajax({
	        type:'POST',
	        url:'<?php echo base_url('Home/loadGames');?>',
	        data:{page:page,orderby:orderby},
	        beforeSend:function(){
	            //$('.load-more').show();
	            $('#loadingDiv').show('');
	        },
	        success:function(html){
	            // /$('.load-more').remove();
	            $('#loadingDiv').hide();
	            $('#loadGames').append(html);
            	var cw = $('.thumb-img').width()/1.3;
				$('.thumb-img').css({'height':cw+'px'});
	            $("#page").val(Number($("#page").val())+Number(1));

	            $(".game-list-box img").mouseover(function() {
				//   $(this).parent().next().next().slideToggle();
				  $(this).parent().next().slideToggle();

				  $(this).parent().find('video').show();
				});
	            $(".game-list-box").mouseleave(function() {
				  $(this).parent().find('video').hide();
				});
	        }
	    });
	}
</script>