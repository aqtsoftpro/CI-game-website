<section>
	<div class="container">

		<div class="row m-t-20">
			<input type="hidden" name="page" id="page" value="1">
			<input type="hidden" name="orderby" id="orderby" value="<?php  echo $this->uri->segment(3);?>">
			<input type="hidden" name="cat_url" id="cat_url" value="<?php  echo $this->uri->segment(2);?>">
			<div id="loadGames" class="col-sm-12 col-lg-12 col-md-12">
			</div> <!-- end col -->
			<div id="loadingDiv"><img src="<?php echo base_url('assets/images/load_page.gif');?>" width="100px"/></div>
		</div> <!-- end row -->

	</div> <!-- end container -->
</section>

<script>
	window.onload = function() {
		load_data($("#page").val(),$("#orderby").val(),$("#cat_url").val());

		$(window).scroll(function(){
		 	if(($(window).scrollTop() == $(document).height() - $(window).height())){
	            load_data($("#page").val(),$("#orderby").val(),$("#cat_url").val());
	        }
		});
	};
	function load_data(page,orderby,cat_url){
		$.ajax({
	        type:'POST',
	        url:'<?php echo base_url('Category/loadGames');?>',
	        data:{page:page,orderby:orderby,cat_url:cat_url},
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
	            $('#loadGames').append(html);
            	var cw = $('.thumb-img').width()/1.3;
				$('.thumb-img').css({'height':cw+'px'});
	        }
	    });
	}
</script>