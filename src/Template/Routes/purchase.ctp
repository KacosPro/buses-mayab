<div class="row">
	<div class="col-md-6 col-md-offset-3">

		<?= $this->TWBForm->create($route, ['url' => ['action' => 'buy']]) ?>
			<div style="display:none;"><input type="hidden" class="form-control" name="_method" value="PUT"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label"><?= __('Origen') ?></label>
				<div class="col-sm-10">
					<input type="hidden" name="sourceRoute" value="<?= $route->source ?>">
					<p class="form-control-static"><?= $route->source ?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label"><?= __('Destino') ?></label>
				<div class="col-sm-10">
					<input type="hidden" name="destinationRoute" value="<?= $route->destination ?>">
					<p class="form-control-static"><?= $route->destination ?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label"><?= __('Hora') ?></label>
				<div class="col-sm-10">
					<input type="hidden" name="hour" value="<?= $this->Time->format($route->hour, 'HH:mm:ss') ?>">
					<p class="form-control-static"><?= $this->Time->format($route->hour, 'HH:mm:ss') ?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label"><?= __('Fecha') ?></label>
				<div class="col-sm-10">
					<input type="hidden" name="date" value="<?= $date ?>">
					<p class="form-control-static"><?= $date ?></p>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label"><?= __('Adultos') ?></label>
				<div class="col-sm-10">
					<select name="adults" class="form-control">
						<?php for ($i = 0; $i <= $seatsLeft; $i++): ?>
							<option value="<?= $i; ?>"><?= $i; ?></option>
						<?php endfor ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label"><?= __('Descuento') ?></label>
				<div class="col-sm-10">
					<select name="half" class="form-control">
						<?php for ($i = 0; $i <= $seatsLeft; $i++): ?>
							<option value="<?= $i; ?>"><?= $i; ?></option>
						<?php endfor ?>
					</select>
				</div>
			</div>
			<br>
			<input type="submit" class="'btn btn-lg btn-primary pull-right">
		<?= $this->TWBForm->end() ?>
	</div>
</div>
