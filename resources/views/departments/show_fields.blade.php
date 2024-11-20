<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $department->name }}</p>
</div>

<!-- Employee No Field -->
<div class="col-sm-12">
    {!! Form::label('employee_no', 'Employee:') !!}
    <p>{{ $employeeName }}</p>
</div>

<!-- School Id Field -->
<div class="col-sm-12">
    {!! Form::label('school_id', 'School:') !!}
    <p>{{ $department->school->name ?? 'N/A' }}</p> <!-- Displays the school name, or 'N/A' if not found -->
</div>

