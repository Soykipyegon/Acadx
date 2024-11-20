<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', 'Student:') !!}
    {!! Form::select('student_id',$students, null, ['class' => 'form-control', 'required', 'placeholder' => 'Select Student']) !!}
</div>

<!-- Attendance Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('attendance_date', 'Attendance Date:') !!}
    {!! Form::date('attendance_date', null, ['class' => 'form-control','id'=>'attendance_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#attendance_date').datepicker()
    </script>
@endpush

<!-- Attendance Status Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('attendance_status', 'Attendance Status:') !!}
    {!! Form::text('attendance_status', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Lesson Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lesson_id', 'Lesson Id:') !!}
    {!! Form::number('lesson_id', null, ['class' => 'form-control', 'required']) !!}
</div>