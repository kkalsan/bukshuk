<div style="margin:10px;">
<h3 style="margin-top: 10px;" class="headers"><span> Login Form</span></h3>
<?php echo CHtml::beginForm(); ?>
<?php echo CHtml::errorSummary($model); ?>
<div class="fieldwrapper">
	<label class="styled" for="username">Login Id:</label>
	<div class="thefield">		
		<?php echo CHtml::activeTextField($model,'username') ?>
	</div>
</div>

<div class="fieldwrapper">
	<label class="styled" for="email">Password:</label>
	<div class="thefield">
		<?php echo CHtml::activePasswordField($model,'password') ?><br>
		<span style="font-size: 80%;">*Note: Please make sure it's correctly entered!</span>
	</div>
</div>
<div>
	<?php echo CHtml::submitButton('Login'); ?>
</div>
<?php echo CHtml::endForm(); ?>
</div>