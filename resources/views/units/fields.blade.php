<!-- Unit Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_code', 'Unit Code:') !!}
    {!! Form::text('unit_code', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Unit Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_name', 'Unit Name:') !!}
    {!! Form::text('unit_name', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', 'Course:') !!}
    {!! Form::select('course_id',$courses, null, ['class' => 'form-control', 'placeholder' => 'Select Course',  'required']) !!}
</div>