<!-- Admn No Field -->
<div class="col-sm-12">
    {!! Form::label('admn_no', 'Admn No:') !!}
    <p>{{ $student->admn_no }}</p>
</div>

<!-- First Name Field -->
<div class="col-sm-12">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $student->first_name }}</p>
</div>

<!-- Surname Field -->
<div class="col-sm-12">
    {!! Form::label('surname', 'Surname:') !!}
    <p>{{ $student->surname }}</p>
</div>

<!-- Other Names Field -->
<div class="col-sm-12">
    {!! Form::label('other_names', 'Other Names:') !!}
    <p>{{ $student->other_names }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $student->email }}</p>
</div>

<!-- Phone Number Field -->
<div class="col-sm-12">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $student->phone_number }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $student->address }}</p>
</div>

<!-- Id Number Field -->
<div class="col-sm-12">
    {!! Form::label('id_number', 'Id Number:') !!}
    <p>{{ $student->id_number }}</p>
</div>

<!-- Date Of Admission Field -->
<div class="col-sm-12">
    {!! Form::label('date_of_admission', 'Date Of Admission:') !!}
    <p>{{ $student->date_of_admission }}</p>
</div>

<!-- Date Of Birth Field -->
<div class="col-sm-12">
    {!! Form::label('date_of_birth', 'Date Of Birth:') !!}
    <p>{{ $student->date_of_birth }}</p>
</div>

<!-- Level Id Field -->
<div class="col-sm-12">
    {!! Form::label('level_id', 'Level:') !!}
    <p>{{ $student->level->name }}</p>
</div>

<!-- Course Id Field -->
<div class="col-sm-12">
    {!! Form::label('course_id', 'Course:') !!}
    <p>{{ $student->course->name }}</p>
</div>


<!-- Gender Field -->
<div class="col-sm-12">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $student->gender }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $student->status }}</p>
</div>

<!-- Department Field -->
<div class="col-sm-12">
    {!! Form::label('department', 'Department:') !!}
    <p>{{ $student->department ? $student->department->name : 'N/A' }}</p>
</div>

