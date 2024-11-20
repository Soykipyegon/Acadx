<!-- Unit Id Field -->
<div class="col-sm-12">
    {!! Form::label('unit_id', 'Unit:') !!}
    <p>{{ $lecturer->unit->unit_name }}</p>
</div>

<!-- Employee No Field -->
<div class="col-sm-12">
    {!! Form::label('employee_no', 'Employee:') !!}
    <p>{{ $lecturer->employee ? $lecturer->employee->title. ' ' .$lecturer->employee->last_name : 'N/A' }}</p>
</div>


<!-- Department Id Field -->
<div class="col-sm-12">
    {!! Form::label('department_id', 'Department:') !!}
    <p>{{ $lecturer->department->name }}</p>
</div>

