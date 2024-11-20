<!-- Student Id Field -->
<div class="col-sm-12">
    {!! Form::label('student_id', 'Student:') !!}
    <p>{{ $enrolment->student->admn_no }}  {{ $enrolment->student->surname }}  {{ $enrolment->student->first_name }}</p>
</div>

<!-- Semester Field -->
<div class="col-sm-12">
    {!! Form::label('semester', 'Semester:') !!}
    <p>{{ $enrolment->semester }}</p>
</div>

<!-- Units Id Field -->
<div class="col-sm-12">
    {!! Form::label('units_id', 'Units:') !!}
    <p>{{ $enrolment->units->unit_name }}</p>
</div>

<!-- Course Id Field -->
<div class="col-sm-12">
    {!! Form::label('course_id', 'Course Id:') !!}
    <p>{{ $enrolment->course->name }}</p>
</div>

<!-- Semester Status Field -->
<div class="col-sm-12">
    {!! Form::label('semester_status', 'Semester Status:') !!}
    <p>{{ $enrolment->semester_status }}</p>
</div>

<!-- Year Field -->
<div class="col-sm-12">
    {!! Form::label('year', 'Year:') !!}
    <p>{{ $enrolment->year }}{{ $enrolment->year == 1 ? 'st' : ($enrolment->year == 2 ? 'nd' : ($enrolment->year == 3 ? 'rd' : 'th')) }} year</p>

</div>

