<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', 'Student:') !!}
    {!! Form::select('student_id',$students, null, ['class' => 'form-control', 'placeholder' => 'Select a Student',]) !!}
</div>

<!-- Semester Field -->
<div class="form-group col-sm-6">
    {!! Form::label('semester', 'Semester:') !!}
    {!! Form::number('semester', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Units Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('units_id', 'Units:') !!}
    {!! Form::select('units_id',$units, null, ['class' => 'form-control','placeholder' => 'Select a Unit', 'required']) !!}
</div>


<!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', 'Course:') !!}
    {!! Form::select('course_id',$courses, null, ['class' => 'form-control', 'placeholder' => 'Select Course',  'required']) !!}
</div>


<!-- Semester Status Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('semester_status', 'Semester Status:') !!}
    {!! Form::text('semester_status', null, ['class' => 'form-control', 'required', 'maxlength' => 65535, 'maxlength' => 65535])!!}
</div>

<!-- Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('year', 'Year:') !!}
    {!! Form::number('year', null, ['class' => 'form-control', 'required']) !!}
</div>