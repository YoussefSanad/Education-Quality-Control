@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Edit Department</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => ['DepartmentController@update', $department->id] , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('name', $department->name, ['class' => 'form-control', 'placeholder' => 'Department name']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::number('phone', $department->phone, ['class' => 'form-control', 'placeholder' => 'Department phone']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                {{ Form::hidden('_method', 'PUT')  }}
                <div id="success"></div>
                {{ Form::submit('Update', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                {!! Form::close() !!}

                {!! Form::open(['action'  => ['DepartmentController@destroy', $department->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}

                {{ Form::hidden('_method', 'DELETE')  }}
                {{ Form::submit('Delete', ['class' => 'btn btn-default btn-lg', 'style' => 'background: darkred; color: white;'])}}
                {!! Form::close() !!}
                <br>
                <a href="/collages/{{ session()->get('selectedCollage')->id  }}#main" class="btn btn-default btn-lg">
                    Back
                </a>
            </div>
        </div>
    </div>

@endsection