<!-- Unit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_id', 'Unit:') !!}
    {!! Form::select('unit_id',$units, null, ['class' => 'form-control','placeholder' => 'Select Unit', 'required']) !!}
</div>

<!-- Employee No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_no', 'Lecturer:') !!}
    {!! Form::select('employee_no',$employees, null, ['class' => 'form-control','placeholder' => 'Select a Lecturer', 'required']) !!}
</div>

<!-- Department Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_id', 'Department:') !!}
    {!! Form::select('department_id', $departments, null, ['class' => 'form-control', 'placeholder' => 'Select department', 'required']) !!}
</div>