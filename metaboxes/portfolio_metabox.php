<?php global $meta_attach; ?>

<div class="lowe_meta_control">	
	<div class="float-control">
 		<div class="float-full attachment">
	 	<label>Media Type </label>
			<p>
			<?php $metabox->the_field('featured_attachment_type'); ?>
			<input type="radio" name="<?php $mb->the_name(); ?>" id="mediaother" value="other"<?php echo $mb->is_value('other')?' checked="checked"':''; ?> checked /> Thumbnail Only
			<input type="radio" name="<?php $mb->the_name(); ?>" id="mediaimage" value="images"<?php echo $mb->is_value('images')?' checked="checked"':''; ?>/> With Gallery
			<span>When Changed, please update posts.</span>
			</p>
		</div>
	</div>


	
	
	<script type="text/javascript">



jQuery(document).ready(function($) {
	$("#media-vid-id").hide();
	$(".media-image-id").hide();
	$("#media-oth-id").hide();
	$('#add-image').hide();
	if ($("#_news_metabox").length > 0){
		$("#_news_metabox").hide();	
	}
	
	if ($('#mediavideo').is(':checked')) $("#media-vid-id").show();
	if ($('#mediaimage').is(':checked')){
		$(".media-image-id").show();
		$("#add-image").show();
	}
	if ($('#mediaother').is(':checked')) $("#media-oth-id").show();
	
	
	$("#mediavideo").click(function(){
		$("#media-vid-id").show();
		$(".media-image-id").hide();
		$("#add-image").hide();
		$("#media-oth-id").hide();
		$('a.mediabutton-featured-attachment').html("Select Video");
		$('a.mediabutton-featured-attachment').attr('class', 'mediabutton-featured-attachment thickbox button {label:\'Select Video\'}');
		
		if ($("#_news_metabox").length > 0){
			$("#_news_metabox").show();	
		}

	});
	$("#mediaimage").click(function(){
		$(".media-image-id").show();
		$("#add-image").show();
		$("#media-vid-id").hide();
		$("#media-oth-id").hide();
		// $('a.mediabutton-featured-attachment').html("Select Image");
		// $('a.mediabutton-featured-attachment').addClass("mediabutton-featured-attachment thickbox button {label:\'Select Image\'}");
		
		if ($("#_news_metabox").length > 0){
			$("#_news_metabox").hide();	
		}
	});
	$("#mediaother").click(function(){
		$("#media-vid-id").hide();
		$(".media-image-id").hide();
		$("#add-image").hide();
		$("#media-oth-id").show();
		$('a.mediabutton-featured-attachment').html("Select File");
		$('a.mediabutton-featured-attachment').attr('class', 'mediabutton-featured-attachment thickbox button {label:\'Select File\'}');
		
		if ($("#_news_metabox").length > 0){
			$("#_news_metabox").hide();	
		}
	});
});
</script>
	<?php while($mb->have_fields_and_multi('work_images_group')): ?>
		<?php $mb->the_group_open(); ?>
		<div class="float-control media-image-id">
	 		<div class="float-full">
	 		<?php $mb->the_field('work_img'); ?>
			<label>Slider Image <a href="<?php echo $metabox->get_the_value('featured_attachment-collection'); ?>" rel="shadowbox">View</a></label>
				
				<?php $meta_attach->setGroupName('image-n'.$metabox->get_the_index())->setInsertButtonLabel('Select Image')->setTab('type'); ?>
				<p>
					<?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value())); ?>
					<?php echo $meta_attach->getButton(array('label' => 'Select Image')); ?>
					<span>This is is the main media to attach to this work for example an image. File Type JPG and PNG, please do not exceed 955px Width by 740px Height
						<a href="#" class="dodelete button">Remove Image</a>
					</span>
				</p>
				
			</div>	
		</div>	 
		<?php $metabox->the_group_close(); ?>
		<?php endwhile; ?>
	
		<div class="float-control" id="add-image">
	 		<div class="float-full">
	 			<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-work_images_group button">Add Image</a></p>
	 		</div>
	 	</div>


 	<div class="float-control">
	 		<div class="float-full">
		<p>This is the media associated with this article</p>
	 			<p>
					NOTE: Images will be in the order they were added.
				</p>
			</div>	
		</div>
 	
 		<div class="float-control">
 		<div class="float-full">
 			<label>Thumbnail Image 
 			<?php if($metabox->get_the_value('portfolio_image') != "") { ?> 	
 				<a href="<?php echo $metabox->get_the_value('portfolio_image'); ?>">View</a> 				
 			<?php } ?>	
 			</label>
			
			
			<?php $metabox->the_field('portfolio_image'); ?>	
			<?php $meta_attach->setGroupName('p_img')->setInsertButtonLabel('Insert Portfolio Image')->setTab('type'); ?>
			<p>
				<?php echo $meta_attach->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value())); ?>
				<?php echo $meta_attach->getButton(array('label' => 'Add Work Thumbnail')); ?>
				<span>This image will be used on the details page, as a preview image. Size 475px Width by 317px Height</span>
			</p>
	</div>

	<div class="float-control">
 		<div class="float-full">
	 	<label>Wortk URL</label>
			<p>
				<?php $metabox->the_field('url'); ?>
    			<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"/>
				<span class="support-text">Enter URL</span>
			</p>
		</div>
	</div>
	
</div>


 
	