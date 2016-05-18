<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?= $this->TWBForm->create('purchase', ['url' => ['action' => 'confirm'], 'id' => 'form']) ?>
			<input type="hidden" name="sourceRoute" value="<?= $requestData['sourceRoute'] ?>">
			<input type="hidden" name="destinationRoute" value="<?= $requestData['destinationRoute'] ?>">
			<input type="hidden" name="hour" value="<?= $this->Time->format($requestData['hour'], 'HH:mm:ss') ?>">
			<input type="hidden" name="date" value="<?= $requestData['date'] ?>">
			<input type="hidden" name="route_id" value="<?= $requestData['route_id'] ?>">
			<p>Precio completo</p>
			<?php for ($i = 0; $i < $requestData['adults']; $i++): ?>
					<div class="form-group">
						<label for=<?php echo 'regular['.$i.']'; ?> class="col-sm-2 control-label">Nombre: </label>
						<div class="col-sm-10">
						<input type="text" class="form-control" name=<?php echo 'regular['.$i.']'; ?> id=<?php echo 'regular['.$i.']'; ?> placeholder="Nombre" required>
						</div>
					</div>
			<?php endfor ?>
			<p>Mitad de precio</p>
			<?php for ($i = 0; $i < $requestData['half']; $i++): ?>
					<div class="form-group">
						<label for=<?php echo 'half['.$i.']'; ?> class="col-sm-2 control-label">Nombre: </label>
						<div class="col-sm-10">
						<input type="text" class="form-control" name=<?php echo 'half['.$i.']'; ?> id=<?php echo 'half['.$i.']'; ?> placeholder="Nombre" required>
						</div>
					</div>
			<?php endfor ?>
			<?= $this->TWBForm->submit(__('Buy'), ['class' => 'btn-primary btn-lg pull-right']) ?>
		<?= $this->TWBForm->end() ?>
	</div>
</div>
