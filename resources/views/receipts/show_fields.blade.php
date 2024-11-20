<!-- Student Id Field -->
<div class="col-sm-12">
    {!! Form::label('student_id', 'Student Id:') !!}
    <p>{{ $receipt->student_id }}</p>
</div>

<!-- Receipt No Field -->
<div class="col-sm-12">
    {!! Form::label('receipt_no', 'Receipt No:') !!}
    <p>{{ $receipt->receipt_no }}</p>
</div>

<!-- Amount Paid Field -->
<div class="col-sm-12">
    {!! Form::label('amount_paid', 'Amount Paid:') !!}
    <p>{{ $receipt->amount_paid }}</p>
</div>

<!-- Mode Of Payment Field -->
<div class="col-sm-12">
    {!! Form::label('mode_of_payment', 'Mode Of Payment:') !!}
    <p>{{ $receipt->mode_of_payment }}</p>
</div>

<!-- Refrence No Field -->
<div class="col-sm-12">
    {!! Form::label('refrence_no', 'Refrence No:') !!}
    <p>{{ $receipt->refrence_no }}</p>
</div>

<!-- Invoice Id Field -->
<div class="col-sm-12">
    {!! Form::label('invoice_id', 'Invoice Id:') !!}
    <p>{{ $receipt->invoice_id }}</p>
</div>

<!-- Balance Field -->
<div class="col-sm-12">
    {!! Form::label('balance', 'Balance:') !!}
    <p>{{ $receipt->balance }}</p>
</div>

