<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Employee No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_no', 'Employee:') !!}
    {!! Form::select('employee_no', $employees, null, ['class' => 'form-control', 'placeholder' => 'Select Employee']) !!}
</div>


<!-- School Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('school_id', 'School:') !!}
    {!! Form::select('school_id', $schools, null, ['class' => 'form-control', 'placeholder' => 'Select School', 'required']) !!}
</div>
