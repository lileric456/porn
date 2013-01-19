<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($site) ? $site->name : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Alias', 'alias'); ?>

			<div class="input">
				<?php echo Form::input('alias', Input::post('alias', isset($site) ? $site->alias : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Url', 'url'); ?>

			<div class="input">
				<?php echo Form::textarea('url', Input::post('url', isset($site) ? $site->url : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Pattern', 'pattern'); ?>

			<div class="input">
				<?php echo Form::textarea('pattern', Input::post('pattern', isset($site) ? $site->pattern : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Account', 'account'); ?>

			<div class="input">
				<?php echo Form::input('account', Input::post('account', isset($site) ? $site->account : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Password', 'password'); ?>

			<div class="input">
				<?php echo Form::input('password', Input::post('password', isset($site) ? $site->password : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Is camouflage referer', 'is_camouflage_referer'); ?>

			<div class="input">
				<?php echo Form::hidden('is_camouflage_referer', 0, array('class' => 'span8', 'rows' => 8)); ?>
				<?php echo Form::input('is_camouflage_referer', 1, array('type' => 'checkbox', 'checked' => $site->is_camouflage_referer ? 'checked' : false)); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>