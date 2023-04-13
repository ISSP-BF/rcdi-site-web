<?php 
	$actions = $this->recommended_actions;
	$actions_todo = get_option( 'honeypress_recommended_actions', false );
?>
<div id="one_click_demo" class="honeypress-tab-pane active" style="display: none;">
<div class="action-list">
	<?php if($actions): foreach ($actions as $key => $action): 
		if($action['id']=='install_one-click-demo-import' || $action['id']=='install_honeypress-blocks'):?>
	<div class="action col-md-6" id="<?php echo esc_attr($action['id']); ?>">
		<div class="action-box">
		<div class="action-watch">
		<?php if(!$action['is_done']): ?>
			<?php if(!isset($actions_todo[$action['id']]) || !$actions_todo[$action['id']]): ?>
				<span class="dashicons dashicons-visibility"></span>
			<?php else: ?>
				<span class="dashicons dashicons-hidden"></span>
			<?php endif; ?>
		<?php else: ?>
			<span class="dashicons dashicons-yes"></span>
		<?php endif; ?>
		</div>
		<div class="action-inner">
			<h3 class="action-title"><?php echo esc_html($action['title']); ?></h3>
			<div class="action-desc"><?php echo wp_kses_post($action['desc']); ?></div>
			<?php echo $action['link']; ?>
		</div>
		</div>
	</div>
	<?php endif; endforeach; endif; ?>
</div>
</div>