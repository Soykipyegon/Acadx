@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Enrolments</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('enrolments.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('enrolments.table')
        </div>
    </div>

@endsection
