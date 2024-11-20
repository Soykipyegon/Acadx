<!-- Student Id Field -->
<div class="col-sm-12">
    {!! Form::label('student_id', 'Student:') !!}
    <p>{{ $exam->student->admn_no }}  {{ $exam->student->surname }}  {{ $exam->student->first_name }}</p>
</div>

<!-- Marks Field -->
<div class="col-sm-12">
    {!! Form::label('marks', 'Marks:') !!}
    <p>{{ $exam->marks }}</p>
</div>

<!-- Enrolment Id Field -->
<div class="col-sm-12">
    {!! Form::label('enrolment_id', 'Enrolment:') !!}
    <p>{{ $exam->enrolment ? $exam->enrolment->unit->unit_name : 'N/A' }}</p>
</div>

