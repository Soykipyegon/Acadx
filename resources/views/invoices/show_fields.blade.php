<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $invoice->amount }}</p>
</div>

<!-- Student Id Field -->
<div class="col-sm-12">
    {!! Form::label('student_id', 'Student ID:') !!}
    <p>{{ $invoice->student->admn_no }} {{ $invoice->student->surname }}  {{ $invoice->student->first_name }}</p>
</div>


<!-- Year Field -->
<div class="col-sm-12">
    {!! Form::label('year', 'Year:') !!}
    <p>{{ $invoice->year }}</p>
</div>

<!-- Semester Field -->
<div class="col-sm-12">
    {!! Form::label('semester', 'Semester:') !!}
    <p>{{ $invoice->semester }}</p>
</div>

