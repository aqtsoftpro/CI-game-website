<section>
	<div class="container-fluid">
		<div class="row m-t-20">
			<input type="hidden" name="page" id="page" value="2">
			<input type="hidden" name="orderby" id="orderby" value="<?php  echo $this->uri->segment(1);?>">
			<input type="hidden" name="search_para" id="search_para" value="<?php echo $_REQUEST['q']; ?>">
			<ul id="loadGames">
				<?php echo $getBlocGame['getBlocGame']; ?>
			</ul> <!-- end col -->
			<div id="loadingDiv"><img src="<?php echo base_url('assets/images/load_page.gif');?>" width="100px"/></div>
		</div> <!-- end row -->

	</div> <!-- end container -->
</section>

<script>
	window.onload = function() {
		//sload_data($("#page").val(),$("#orderby").val(),$("#search_para").val());
		/*var cw = $('.thumb-img').width()/1.3;
		 $('.thumb-img').css({'height':cw+'px'});*/
		$(window).scroll(function(){
			if(($(window).scrollTop() == $(document).height() - $(window).height())){
				load_data($("#page").val(),$("#orderby").val(),$("#search_para").val());
			}
		});
	};
	function load_data(page,orderby,search){
		$.ajax({
			type:'POST',
			url:'<?php echo base_url('Home/loadGames');?>',
			data:{page:page,orderby:orderby,search:search},
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
				/*var cw = $('.thumb-img').width()/1.3;
				 $('.thumb-img').css({'height':cw+'px'});*/
			}
		});
	}
</script>
