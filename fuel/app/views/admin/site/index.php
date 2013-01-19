<h2>Listing Sites</h2>
<br>
<?php if ($sites): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Alias</th>
			<th>Url</th>
			<th>Pattern</th>
			<th>Account</th>
			<th>Password</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($sites as $site): ?>		<tr>

			<td><?php echo $site->name; ?></td>
			<td><?php echo $site->alias; ?></td>
			<td><?php echo $site->url; ?></td>
			<td><?php echo $site->pattern; ?></td>
			<td><?php echo $site->account; ?></td>
			<td><?php echo $site->password; ?></td>
			<td>
				<?php echo Html::anchor('admin/site/view/'.$site->id, 'View'); ?> |
				<?php echo Html::anchor('admin/site/edit/'.$site->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/site/delete/'.$site->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Sites.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/site/create', 'Add new Site', array('class' => 'btn btn-success')); ?>

</p>
