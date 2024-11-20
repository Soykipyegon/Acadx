<!-- Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('score', 'Score:') !!}
    {!! Form::text('score', null, ['class' => 'form-control', 'required', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Enrolment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enrolment_id', 'Enrolment Id:') !!}
    {!! Form::number('enrolment_id', null, ['class' => 'form-control', 'required']) !!}
</div>