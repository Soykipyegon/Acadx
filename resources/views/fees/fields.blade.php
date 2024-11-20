<!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', 'Course:') !!}
    {!! Form::select('course_id',$courses, null, ['class' => 'form-control', 'placeholder' => 'Select Course',  'required']) !!}
</div>

<!-- Expected Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expected_amount', 'Fees Per Semester:') !!}
    {!! Form::number('expected_amount', null, ['class' => 'form-control', 'required']) !!}
</div>