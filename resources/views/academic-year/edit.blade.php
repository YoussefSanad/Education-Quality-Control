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
                {!! Form::open(['action'  => ['AcademicYearController@update', $academicYear->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('name', $academicYear->name, ['class' => 'form-control', 'placeholder' => 'Academic year name']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::number('number_of_students',$academicYear->number_of_students, ['class' => 'form-control', 'placeholder' => 'Numebr of students']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                {{ Form::hidden('_method' , 'PUT') }}
                <div id="success"></div>
                {{ Form::submit('Update Academic Year', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/academic-years" class="btn btn-default btn-lg">
                    Cancel
                </a>
                {!! Form::close() !!}

                {!! Form::open(['action'  => ['AcademicYearController@destroy', $academicYear->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}

                {{ Form::hidden('_method', 'DELETE')  }}
                {{ Form::submit('Delete', ['class' => 'btn btn-default btn-lg', 'style' => 'background: darkred; color: white;'])}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection