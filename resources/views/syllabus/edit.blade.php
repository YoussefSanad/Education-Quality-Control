@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Update Syllabus</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => ['SyllabusController@update', $syllabus->id] , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::number('week_number', $syllabus->week_number, ['class' => 'form-control', 'placeholder' => 'Week number']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('sub_topic', $syllabus->sub_topic, ['class' => 'form-control', 'placeholder' => 'Sub-topic']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    {{ Form::number('theoretical_hours', $syllabus->theoretical_hours, ['class' => 'form-control', 'placeholder' => 'Theoretical hours']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                    {{ Form::number('practical_hours', $syllabus->practical_hours , ['class' => 'form-control', 'placeholder' => 'Practical hours']) }}
                    <p class="help-block text-danger"></p>
                </div>
                {{Form::hidden('_method', 'PUT')}}
                <div id="success"></div>
                {{ Form::submit('Update', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                {!! Form::close() !!}

                {!! Form::open(['action'  => ['SyllabusController@destroy', $syllabus->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}

                {{ Form::hidden('_method', 'DELETE')  }}
                {{ Form::submit('Delete', ['class' => 'btn btn-default btn-lg', 'style' => 'background: darkred; color: white;'])}}
                {!! Form::close() !!}
                <br>
                <a href="/syllabuses#main" class="btn btn-default btn-lg">
                    Cancel
                </a>

            </div>
        </div>
    </div>

@endsection