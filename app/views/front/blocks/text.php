<div class="control-group<?php echo (empty($errors) && trim($errors)) ? ' error': ''; ?>">
	<div class="controls">
		<?php if($type !== 'hidden') : ?>
		<label class="help-inline"><?php echo empty($errors) ? $errors : $label; ?></label>
		<?php endif; ?>
		<input type="<?php echo $type; ?>" class="input-block-level" <?php echo isset($readonly) ? $readonly : NULL; ?>
		placeholder="<?php echo isset($placeholder) ? $placeholder : NULL; ?>"
		name="<?php echo $name; ?>" value="<?php echo isset($value) ? $value : NULL; ?>">    
	</div>
</div>	