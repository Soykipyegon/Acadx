<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', 'Student:') !!}
    {!! Form::select('student_id', $students, null, ['class' => 'form-control', 'placeholder'=> 'select a Student', 'required']) !!}
</div>

<!-- Receipt No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('receipt_no', 'Receipt No:') !!}
    {!! Form::number('receipt_no', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Amount Paid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount_paid', 'Amount Paid:') !!}
    {!! Form::number('amount_paid', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Mode Of Payment Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('mode_of_payment', 'Mode Of Payment:') !!}
    {!! Form::text('mode_of_payment', null, ['class' => 'form-control', 'required', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Refrence No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('refrence_no', 'Refrence No:') !!}
    {!! Form::number('refrence_no', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Invoice Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoice_id', 'Invoice:') !!}
    {!! Form::select('invoice_id', $invoices, null, ['class' => 'form-control', 'placeholder'=> 'Select an Invoice',  'required']) !!}
</div>

<!-- Balance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('balance', 'Balance:') !!}
    {!! Form::number('balance', null, ['class' => 'form-control', 'required']) !!}
</div>