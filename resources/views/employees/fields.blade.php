<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::number('phone_number', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Id Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_number', 'Id Number:') !!}
    {!! Form::number('id_number', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 20, 'maxlength' => 20]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- School Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('school_id', 'School:') !!}
    {!! Form::select('school_id', $schools, null, ['class' => 'form-control', 'placeholder' => 'Select School', 'required']) !!}
</div>

<!-- Department Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_id', 'Department:') !!}
    {!! Form::select('department_id', $departments, null, ['class' => 'form-control', 'placeholder' => 'Select department', 'required']) !!}
</div>
