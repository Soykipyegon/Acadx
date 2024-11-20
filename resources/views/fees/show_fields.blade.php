<!-- Course Id Field -->
<div class="col-sm-12">
    {!! Form::label('course_id', 'Course:') !!}
    <p>{{ $fee->course->name }}</p>
</div>

<!-- Expected Amount Field -->
<div class="col-sm-12">
    {!! Form::label('expected_amount', 'Fees Per Semester:') !!}
    <p>Kshs {{ number_format($fee->expected_amount, 2) }}</p>
</div>


