<!-- Student Id Field -->
<div class="col-sm-12">
    {!! Form::label('student_id', 'Student:') !!}
    <p>{{ $coursework->student->admn_no }}  {{ $coursework->student->surname }}  {{ $coursework->student->first_name }}</p>
</div>

<!-- Marks Field -->
<div class="col-sm-12">
    {!! Form::label('marks', 'Marks:') !!}
    <p>{{ $coursework->marks }}</p>
</div>

<!-- Enrolment Id Field -->
<div class="col-sm-12">
    {!! Form::label('enrolment_id', 'Enrolment:') !!}
    <p>{{ $coursework->enrolment ? $coursework->enrolment->unit->unit_name : 'N/A' }}</p>
</div>

