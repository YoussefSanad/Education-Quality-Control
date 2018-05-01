@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Add Employee</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => 'EmployeeController@store' , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Employee name']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Employee address']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                        {{ Form::number('phone', '', ['class' => 'form-control', 'placeholder' => 'Employee phone']) }}
                        <p class="help-block text-danger"></p>
                    </div>
                <div id="success"></div>
                {{ Form::submit('Add Employee', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/employees#main" class="btn btn-default btn-lg">
                    Back
                </a>
                {!! Form::close() !!}

            </div>
        </div>

    </div>

@endsection