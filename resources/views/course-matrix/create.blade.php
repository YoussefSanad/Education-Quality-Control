@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Add Matrix</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => 'CourseMatrixController@store' , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('main_topic', '', ['class' => 'form-control', 'placeholder' => 'Main topic']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::number('duration', '', ['class' => 'form-control', 'placeholder' => 'Duration in hours']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::text('knowledge_understanding', '', ['class' => 'form-control', 'placeholder' => 'Knowledge & understanding Satisfaction']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                    {{ Form::text('general_skill', '', ['class' => 'form-control', 'placeholder' => 'General skill Satisfaction']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                    {{ Form::text('professional_skill', '', ['class' => 'form-control', 'placeholder' => 'Professional skill Satisfaction']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                    {{ Form::text('intellectual_skill', '', ['class' => 'form-control', 'placeholder' => 'Intellectual skill Satisfaction']) }}
                    <p class="help-block text-danger"></p>
                </div>


                <div id="success"></div>
                {{ Form::submit('Add Course Matrix', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/course-matrices" class="btn btn-default btn-lg">
                    Back
                </a>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection