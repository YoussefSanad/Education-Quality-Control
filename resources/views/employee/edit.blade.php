@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Update Employee</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => ['EmployeeController@update', $employee->id] , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('name', $employee->name, ['class' => 'form-control', 'placeholder' => 'Employee name']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('address', $employee->address, ['class' => 'form-control', 'placeholder' => 'Employee address']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::number('phone', $employee->phone, ['class' => 'form-control', 'placeholder' => 'Employee phone']) }}
                    <p class="help-block text-danger"></p>
                </div>
                {{Form::hidden('_method', 'PUT')}}
                <div id="success"></div>
                {{ Form::submit('Update', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                {!! Form::close() !!}

                {!! Form::open(['action'  => ['EmployeeController@destroy', $employee->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}

                {{ Form::hidden('_method', 'DELETE')  }}
                {{ Form::submit('Delete', ['class' => 'btn btn-default btn-lg', 'style' => 'background: darkred; color: white;'])}}
                {!! Form::close() !!}
                <a href="/employees#main" class="btn btn-default btn-lg">
                    Back
                </a>
            </div>
        </div>
    </div>

@endsection