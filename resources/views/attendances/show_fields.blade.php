<!-- Student Id Field -->
<div class="col-sm-12">
    {!! Form::label('student_id', 'Student:') !!}
    <p>{{ $coursework->student->admn_no }}  {{ $coursework->student->surname }}  {{ $coursework->student->first_name }}</p>
</div>

<!-- Attendance Date Field -->
<div class="col-sm-12">
    {!! Form::label('attendance_date', 'Attendance Date:') !!}
    <p>{{ $attendance->attendance_date }}</p>
</div>

<!-- Attendance Status Field -->
<div class="col-sm-12">
    {!! Form::label('attendance_status', 'Attendance Status:') !!}
    <p>{{ $attendance->attendance_status }}</p>
</div>

<!-- Lesson Id Field -->
<div class="col-sm-12">
    {!! Form::label('lesson_id', 'Lesson Id:') !!}
    <p>{{ $attendance->lesson_id }}</p>
</div>

