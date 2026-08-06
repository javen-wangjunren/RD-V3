<?php
	if(isset($_GET['reaction'])){
		$likes = (int) get_field('likes_u78i');
		$dislikes = (int) get_field('dislikes_u78i');
		if($_GET['reaction'] == "like"){
			$likes++;
			update_field('likes_u78i', $likes);
		}
		if($_GET['reaction'] == "dislike"){
			$dislikes++;
			update_field('dislikes_u78i', $dislikes);
		}
		$data = array("likes" => $likes, "dislikes" => $dislikes);
		header("Content-Type: application/json");
		echo json_encode($data);
		exit();
	}
?>
<?php the_content();?>
<script>
	jQuery( document ).on("ready ajaxSuccess", function() {
		jQuery('body').on('click',".ajax-likes",function(e){
			e.preventDefault();
			e.stopPropagation();
        	reaction = jQuery(this).data('reaction');
			jQuery(this).addClass("activee");
			jQuery(this).removeClass('ajax-likes');
			if(reaction == "like"){
			   jQuery(".reaction-dislike").hide(200);
			}else{
				 jQuery(".reaction-like").hide(200);
			 }
// 			console.log(window.location.href+"?reaction="+reaction);
			jQuery.get(window.location.href+"?reaction="+reaction, function(data, status){
				jQuery(".like-reaction").html(data.likes);
				jQuery(".total-reaction").html(data.likes + data.dislikes);
// 				console.log("Data: " + data + "\nStatus: " + status, data.likes);
			});
		});
	});
	jQuery( document ).on("ready ajaxSuccess", function() {
		starArt = jQuery('.star-article');
		jQuery('.star-article-container').html(starArt);
		starArt.hide();
		jQuery('.star-article-container .star-article').show();
	});
</script>