<div class="col-md-12">

	<div class="form-group">

		<div class="row">

			<div class="col-sm-4">

				<label for="type">Type</label>

				{!! Form::select('type', $types, null, ['placeholder' => 'Type...', 'class' => 'form-control']) !!}

			</div>

			<div class="col-sm-4">

				<label for="region">Région</label>

				{!! Form::select('region', $regions, null, ['placeholder' => 'Région...', 'id' => 'region', 'class' => 'form-control']) !!}

			</div>

			<div class="col-sm-4">

				<label for="city">Cité</label>

				<select class="form-control" name="city" id="city">

					<option selected="selected" disabled="disabled" hidden="hidden" value="">Cité...</option>

					@foreach ($cities as $r => $c)

						<option value="{{ $c }}" class="{{ $r }}">{{ $c }}</option>

					@endforeach

				</select>

			</div>

		</div>

	</div>

</div>

<div class="col-md-12">

	<div class="form-group">

		<label for="address">Adresse</label>
		{!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Adresse']) !!}

	</div>

</div>

<div class="col-md-12">

	<div class="form-group">

		<div class="row">

			<div class="col-sm-6">

				<label for="rooms">Nombre de chambres</label>
				{!! Form::select('rooms', $rooms, null, ['class' => 'form-control', 'id' => 'rooms', 'placeholder' => 'Nombre de chambres']) !!}

			</div>

			<div class="col-sm-6">

				<label for="floors">Nombre d'étages</label>
				{!! Form::select('floors', $floors, null, ['class' => 'form-control', 'id' => 'floors', 'placeholder' => 'Nombre d\'étages']) !!}

			</div>

		</div>

	</div>

</div>

<div class="col-md-12">

	<div class="form-group">

		<div class="row">

			@if ($type == 'Rent')
				<div class="col-sm-6">

					<label for="offer_state">Etat</label>

					{!! Form::select('state', $state, null, ['placeholder' => 'Etat...', 'id' => 'state', 'class' => 'form-control']) !!}

				</div>
			@endif

			<div class="col-sm-6">

				<label for="surface">Surface</label>

				<input class="form-control" type="number" value="" name="surface" id="surface" placeholder="Surface">

			</div>

		</div>

	</div>

</div>

<hr>

<div class="col-md-12">

	<center>
		<h3 class="box-title">
			EXTRAS
		</h3>
	</center>

</div>

<hr>


<div class="col-md-12">

	<div class="form-group">

		<div class="row">

			<div class="col-md-3 col-sm-3">

				<div class="checkbox checkbox-info checkbox-circle">
					{!! Form::checkbox('garage', null, null, ['id' => 'garage', 'class' => 'checkbox-template']) !!}
					<label for="garage"> Garage </label>
				</div>

			</div>

			<div class="col-md-3 col-sm-3">

				<div class="checkbox checkbox-info checkbox-circle">
					{!! Form::checkbox('terrace', null, null, ['id' => 'terrace', 'class' => 'checkbox-template']) !!}
					<label for="terrace"> Terrasse </label>
				</div>

			</div>

			<div class="col-md-3 col-sm-3">

				<div class="checkbox checkbox-info checkbox-circle">
					{!! Form::checkbox('air_conditioner', null, null, ['id' => 'air_conditioner', 'class' => 'checkbox-template']) !!}
					<label for="air_conditioner"> Climatiseur </label>
				</div>

			</div>

			<div class="col-md-3 col-sm-3">

				<div class="checkbox checkbox-info checkbox-circle">
					{!! Form::checkbox('central_heating', null, null, ['id' => 'central_heating', 'class' => 'checkbox-template']) !!}
					<label for="central_heating"> Chauffage central </label>
				</div>

			</div>

			<div class="col-md-3 col-sm-3">

				<div class="checkbox checkbox-info checkbox-circle">
					{!! Form::checkbox('pool', null, null, ['id' => 'pool', 'class' => 'checkbox-template']) !!}
					<label for="pool"> Piscine </label>
				</div>

			</div>

			<div class="col-md-3 col-sm-3">

				<div class="checkbox checkbox-info checkbox-circle">
					{!! Form::checkbox('gaz_de_ville', null, null, ['id' => 'gaz_de_ville', 'class' => 'checkbox-template']) !!}
					<label for="gaz_de_ville"> Gaz de ville </label>
				</div>

			</div>

			<div class="col-md-3 col-sm-3">

				<div class="checkbox checkbox-info checkbox-circle">
					{!! Form::checkbox('drying_room', null, null, ['id' => 'drying_room', 'class' => 'checkbox-template']) !!}
					<label for="drying_room"> Séchoir </label>
				</div>

			</div>

			<div class="col-md-3 col-sm-3">

				<div class="checkbox checkbox-info checkbox-circle">
					{!! Form::checkbox('ascenceur', null, null, ['id' => 'ascenceur', 'class' => 'checkbox-template']) !!}
					<label for="ascenceur"> Ascenceur </label>
				</div>

			</div>

			<div class="col-md-3 col-sm-3">

				<div class="checkbox checkbox-info checkbox-circle">
					{!! Form::checkbox('cuisine_equipee', null, null, ['id' => 'cuisine_equipee', 'class' => 'checkbox-template']) !!}
					<label for="cuisine_equipee"> Cuisise équipée </label>
				</div>

			</div>

			<div class="col-md-3 col-sm-3">

				<div class="checkbox checkbox-info checkbox-circle">
					{!! Form::checkbox('salle_de_bain', null, null, ['id' => 'salle_de_bain', 'class' => 'checkbox-template']) !!}
					<label for="salle_de_bain"> Salle de bain </label>
				</div>

			</div>

			<div class="col-md-3 col-sm-3">

				<div class="checkbox checkbox-info checkbox-circle">
					{!! Form::checkbox('salle_deau', null, null, ['id' => 'salle_deau', 'class' => 'checkbox-template']) !!}
					<label for="salle_deau"> Salle d'eau </label>
				</div>

			</div>

		</div>

	</div>

</div>

<div class="col-md-12">

	<div class="form-group">

		<label for="price">Prix</label>
		{!! Form::text('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Prix']) !!}
	</div>

</div>

<div class="col-md-12">

	<div class="form-group">

		<label for="description">Description</label>
		{!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Description', 'rows' => '5']) !!}

	</div>

</div>

{{--<div class="col-md-12"></div>
<div class="form-group">

	<div class="fallback">
		<input type="file" name="image[]" multiple />
	</div>

</div>--}}

{!! Form::hidden('for_rent', $type, ['class' => 'form-control', 'id' => 'for_rent', 'placeholder' => 'Sale/Rent']) !!}