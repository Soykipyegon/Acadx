<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', 'Student:') !!}
    {!! Form::select('student_id',$students, null, ['class' => 'form-control', 'required', 'placeholder' => 'Select Student']) !!}
</div>

<!-- Marks Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marks', 'Marks:') !!}
    {!! Form::number('marks', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Enrolment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enrolment_id', 'Enrolment:') !!}
    {!! Form::select('enrolment_id',$enrolments, null, ['class' => 'form-control', 'required']) !!}
</div>