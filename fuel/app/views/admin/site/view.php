<h2>Viewing #<?php echo $site->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $site->name; ?></p>
<p>
	<strong>Alias:</strong>
	<?php echo $site->alias; ?></p>
<p>
	<strong>Url:</strong>
	<?php echo $site->url; ?></p>
<p>
	<strong>Pattern:</strong>
	<?php echo $site->pattern; ?></p>
<p>
	<strong>Account:</strong>
	<?php echo $site->account; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $site->password; ?></p>

<?php echo Html::anchor('admin/site/edit/'.$site->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/site', 'Back'); ?>