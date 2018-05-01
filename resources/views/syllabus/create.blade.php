@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Add Syllabus</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => 'SyllabusController@store' , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::number('week_number', '', ['class' => 'form-control', 'placeholder' => 'Week number']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('sub_topic', '', ['class' => 'form-control', 'placeholder' => 'Sub-topic']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    {{ Form::number('theoretical_hours', '', ['class' => 'form-control', 'placeholder' => 'Theoretical hours']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                    {{ Form::number('practical_hours', '', ['class' => 'form-control', 'placeholder' => 'Practical hours']) }}
                    <p class="help-block text-danger"></p>
                </div>


                <div id="success"></div>
                {{ Form::submit('Add Syllabus', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/syllabuses#main" class="btn btn-default btn-lg">
                    Back
                </a>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection