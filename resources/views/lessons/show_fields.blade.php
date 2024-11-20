<!-- Credits Field -->
<div class="col-sm-12">
    {!! Form::label('credits', 'Credits:') !!}
    <p>{{ $lesson->credits }}</p>
</div>

<!-- Number Of Hours Field -->
<div class="col-sm-12">
    {!! Form::label('number_of_hours', 'Number Of Hours:') !!}
    <p>{{ $lesson->number_of_hours }}</p>
</div>

<!-- Unit Id Field -->
<div class="col-sm-12">
    {!! Form::label('unit_id', 'Unit Id:') !!}
    <p>{{ $lesson->unit_id }}</p>
</div>

<!-- Enrolment Id Field -->
<div class="col-sm-12">
    {!! Form::label('enrolment_id', 'Enrolment Id:') !!}
    <p>{{ $lesson->enrolment_id }}</p>
</div>

