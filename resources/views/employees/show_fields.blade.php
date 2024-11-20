<!-- First Name Field -->
<div class="col-sm-12">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $employee->first_name }}</p>
</div>

<!-- Last Name Field -->
<div class="col-sm-12">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $employee->last_name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $employee->email }}</p>
</div>

<!-- Phone Number Field -->
<div class="col-sm-12">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $employee->phone_number }}</p>
</div>

<!-- Id Number Field -->
<div class="col-sm-12">
    {!! Form::label('id_number', 'Id Number:') !!}
    <p>{{ $employee->id_number }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $employee->title }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $employee->address }}</p>
</div>

<!-- School Id Field -->
<div class="col-sm-12">
    {!! Form::label('school_id', 'School Id:') !!}
    <p>{{ $employee->school->name ?? 'N/A' }}</p>
</div>

<!-- Department Id Field -->
<div class="col-sm-12">
    {!! Form::label('department_id', 'Department:') !!}
    <p>{{ $employee->department->name }}</p>
</div>

