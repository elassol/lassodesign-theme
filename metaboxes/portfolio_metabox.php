<?php global $media_access; ?>
<div class="lowe_meta_control">	

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

	<div class="float-control">
 		<div class="float-full">
	 	<label>Work Thumbnail</label>
			<?php $metabox->the_field('portfolio_image'); ?>
    		<?php $media_access->setGroupName('p_img')->setInsertButtonLabel('Insert Portfolio Image')->setTab('type'); ?>
		    <p>
		        <?php echo $media_access->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value())); ?>
		        <?php echo $media_access->getButton(array('label' => 'Add Work Thumbnail')); ?>
		    </p>



		</div>
	</div>

</div>