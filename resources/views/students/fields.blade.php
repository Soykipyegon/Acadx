<!-- Admn No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admn_no', 'Admn No:') !!}
    {!! Form::text('admn_no', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control', 'required', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Surname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('surname', 'Surname:') !!}
    {!! Form::text('surname', null, ['class' => 'form-control', 'required', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Other Names Field -->
<div class="form-group col-sm-6">
    {!! Form::label('other_names', 'Other Names:') !!}
    {!! Form::text('other_names', null, ['class' => 'form-control', 'maxlength' => 191, 'maxlength' => 191]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::number('phone_number', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Id Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_number', 'Id Number:') !!}
    {!! Form::number('id_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Of Admission Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_admission', 'Date Of Admission:') !!}
    {!! Form::date('date_of_admission', null, [
        'class' => 'form-control',
        'id' => 'date_of_admission',
        'max' => \Carbon\Carbon::now()->format('Y-m-d')
    ]) !!}
</div>


@push('page_scripts')
    <script type="text/javascript">
        $('#date_of_admission').datepicker()
    </script>
@endpush

<!-- Date Of Birth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_birth', 'Date Of Birth:') !!}
    {!! Form::date('date_of_birth', null, ['class' => 'form-control','id'=>'date_of_birth', 'required']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_of_birth').datepicker()
    </script>
@endpush

<!-- Level Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level_id', 'Level:') !!}
    {!! Form::select('level_id',$levels, null, ['class' => 'form-control','placeholder' => 'Select Level', 'required']) !!}
</div>

<!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', 'Course:') !!}
    {!! Form::select('course_id',$courses, null, ['class' => 'form-control', 'placeholder' => 'Select Course',  'required']) !!}
</div>


<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::select('gender', [
        'male' => 'Male',
        'female' => 'Female'
    ], null, ['class' => 'form-control','placeholder' => 'select Gender', 'required']) !!}
</div>


<!-- Status field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}  <!-- Creates the label -->
    {!! Form::select('status', [
        'Active' => 'Active',
        'Deferred' => 'Deferred',
        'Graduated' => 'Graduated'
    ], null, ['class' => 'form-control', 'placeholder' => 'select Status', 'required']) !!} <!-- Required field -->
</div>
