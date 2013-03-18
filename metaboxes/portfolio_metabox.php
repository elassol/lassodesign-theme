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

	<?php while($mb->have_fields_and_multi('docs')): ?>
<?php $mb->the_group_open(); ?>
	<div class="float-control">
 		<div class="float-full"> 
    <?php $mb->the_field('title'); ?>
    <label>Title and URL</label>
    <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
     
    <?php $mb->the_field('link'); ?>
    <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
 
    <?php $mb->the_field('access'); ?>
    <p><strong>Access:</strong>
        <input type="radio" name="<?php $mb->the_name(); ?>" value="admin"<?php echo $mb->is_value('admin')?' checked="checked"':''; ?>/> Admin
        <input type="radio" name="<?php $mb->the_name(); ?>" value="editor"<?php echo $mb->is_value('editor')?' checked="checked"':''; ?>/> Editor
        <input type="radio" name="<?php $mb->the_name(); ?>" value="subscriber"<?php echo $mb->is_value('subscriber')?' checked="checked"':''; ?>/> Subscriber
         
        <a href="#" class="button" style="margin-left:10px;" onclick="jQuery(this).siblings().removeAttr('checked'); return false;">Remove Access</a>
        <a href="#" class="dodelete button">Remove Document</a>
    </p>
		</div>
	</div> 
<?php $mb->the_group_close(); ?>
<?php endwhile; ?>
 
<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-docs button">Add Document</a></p>

</div>