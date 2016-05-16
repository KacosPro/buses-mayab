<div class="row">
	<div class="col-md-8 col-md-offset-2">
	<?= $this->TWBForm->create('purchase', ['url' => ['action' => 'sale']]) ?>
		<?php foreach ($request as $key => $value): ?>
			<?php $myKey = $key ?>
			<?php if (is_array($value)): ?>
				<?php foreach ($value as $llave => $valor): ?>
					<input type="hidden" name="<?= $myKey .'['.$llave.']' ?>" value="<?= $valor ?>">
				<?php endforeach ?>
			<?php else: ?>
				<input type="hidden" name="<?= $key ?>" value="<?= $value ?>">
			<?php endif ?>
		<?php endforeach ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Total regulares</label>
			<div class="col-sm-10">
				<?php if (isset($request['regular'])): ?>
					<p class="form-control-static"><?= $this->Number->currency(count($request['regular'])*250, 'USD') ?></p>
				<?php else: ?>
					<p>0</p>
				<?php endif ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Total descuento</label>
			<div class="col-sm-10">
				<?php if (isset($request['half'])): ?>
					<p class="form-control-static"><?= $this->Number->currency(count($request['regular'])*125, 'USD') ?></p>
				<?php else: ?>
					<p>0</p>
				<?php endif ?>
			</div>
		</div>
		<?= $this->TWBForm->submit(__('PayPal'), ['class' => 'btn-primary btn-lg pull-left']) ?>
		<?= $this->TWBForm->submit(__('Tarjeta'), ['class' => 'btn-primary btn-lg pull-right']) ?>
	<?= $this->TWBForm->end() ?>
	</div>
</div>
