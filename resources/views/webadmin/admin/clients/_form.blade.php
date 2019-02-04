<div class="row pre-scrollable">

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			{{ Form::label('first_name', 'First Name', ['for' => 'first_name']) }}
			{{ Form::text('first_name', null, ['class'=>'form-control','id' => 'first_name']) }}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			{{ Form::label('middle_name','Middle Name', ['for' => 'middle_name']) }}
			{{ Form::text('middle_name', null, ['class'=>'form-control','id' => 'middle_name']) }}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			{{ Form::label('last_name','Last Name', ['for' => 'last_name']) }}
			{{ Form::text('last_name', null, ['class'=>'form-control','id' => 'last_name']) }}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		{{ Form::label('gender','Gender', ['for' => 'gender']) }}
		{{ Form::select('gender', ['Male'=>'Male','Female'=>'Female'], null, ['placeholder' => ' - Select Gender -','class' => 'form-control','id' => 'gender']) }}
	</div>

	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<div class="form-group">
			{{ Form::label('date_of_birth','Date Of Birth', ['for' => 'date_of_birth']) }}
			{{ Form::date('date_of_birth', \Carbon\Carbon::now(), ['class'=>'form-control','id' => 'date_of_birth']) }}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<div class="form-group">
			{{ Form::label('phone','Phone Number', ['for' => 'phone']) }}
			{{ Form::text('phone', null, ['class'=>'form-control','id' => 'phone']) }}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<div class="form-group">
			{{ Form::label('job','Job', ['for' => 'job']) }}
			{{ Form::text('job', null, ['class'=>'form-control','id' => 'job']) }}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			{{ Form::label('city','City', ['for' => 'city']) }}
			{{ Form::text('city', null, ['class'=>'form-control','id' => 'city']) }}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			{{ Form::label('address','Full Address', ['for' => 'address']) }}
			{{ Form::textarea('address', null, ['class'=>'form-control','id' => 'address','rows' => 2,'style' => 'resize:none;']) }}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{ Form::label('saving_id','Saving Type', ['for' => 'gender']) }}
		{{ Form::select('saving_id', App\Saving::pluck('name','id')->all(), null, ['placeholder' => ' - Saving Type -','class' => 'form-control','id' => 'saving_id']) }}
	</div>

</div>