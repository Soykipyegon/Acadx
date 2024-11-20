<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $course->name }}</p>
</div>

<!-- Level Id Field -->
<div class="col-sm-12">
    {!! Form::label('level_id', 'Level:') !!}
    <p>{{ $course->level->name}}</p>
</div>


<!-- Department Id Field -->
<div class="col-sm-12">
    {!! Form::label('department_id', 'Department:') !!}
    <p>{{ $course->department->name }}</p>
</div>

