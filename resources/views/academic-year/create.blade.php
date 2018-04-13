@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Add Academic Year</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => 'AcademicYearController@store' , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Academic year name']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::number('number_of_students', '', ['class' => 'form-control', 'placeholder' => 'Numebr of students']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div id="success"></div>
                {{ Form::submit('Add Academic Year', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/departments/create" class="btn btn-default btn-lg">
                    Next
                </a>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection