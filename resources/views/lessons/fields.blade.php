<!-- Credits Field -->
<div class="form-group col-sm-6">
    {!! Form::label('credits', 'Credits:') !!}
    {!! Form::number('credits', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Number Of Hours Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number_of_hours', 'Number Of Hours:') !!}
    {!! Form::number('number_of_hours', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Unit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_id', 'Unit Id:') !!}
    {!! Form::number('unit_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Enrolment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enrolment_id', 'Enrolment Id:') !!}
    {!! Form::number('enrolment_id', null, ['class' => 'form-control', 'required']) !!}
</div>