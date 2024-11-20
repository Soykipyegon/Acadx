<!-- Name Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Level Id Field -->
<div class="col-sm-6">
    {!! Form::label('level_id', 'Level:') !!}
    {!! Form::select('level_id', $levels, null, ['class' => 'form-control', 'placeholder' => 'Select Level']) !!}
</div>

<!-- Department Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_id', 'Department:') !!}
    {!! Form::select('department_id', $departments, null, ['class' => 'form-control', 'placeholder' => 'Select department', 'required']) !!}
</div>