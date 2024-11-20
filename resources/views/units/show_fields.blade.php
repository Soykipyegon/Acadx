<!-- Unit Code Field -->
<div class="col-sm-12">
    {!! Form::label('unit_code', 'Unit Code:') !!}
    <p>{{ $unit->unit_code }}</p>
</div>

<!-- Unit Name Field -->
<div class="col-sm-12">
    {!! Form::label('unit_name', 'Unit Name:') !!}
    <p>{{ $unit->unit_name }}</p>
</div>

<!-- Course Id Field -->
<div class="col-sm-12">
    {!! Form::label('course_id', 'Course:') !!}
    <p>{{ $unit->course->name }}</p>
</div>

