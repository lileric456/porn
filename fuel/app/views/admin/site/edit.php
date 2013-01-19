<h2>Editing Site</h2>
<br>

<?php echo render('admin\site/_form'); ?>
<p>
	<?php echo Html::anchor('admin/site/view/'.$site->id, 'View'); ?> |
	<?php echo Html::anchor('admin/site', 'Back'); ?></p>
