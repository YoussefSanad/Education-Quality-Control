@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Update Assessment Method</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => ['AssessmentMethodController@update', $assessmentMethod->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="form-group">
                    {{ Form::text('name', $assessmentMethod->name, ['class' => 'form-control', 'placeholder' => 'Method name']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::number('method_percentage', $assessmentMethod->method_percentage, ['class' => 'form-control', 'placeholder' => 'Method percentage']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::number('week_number', $assessmentMethod->week_number, ['class' => 'form-control', 'placeholder' => 'Week number']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::text('knowledge_understanding', $assessmentMethod->knowledge_understanding, ['class' => 'form-control', 'placeholder' => 'Knowledge & understanding Satisfaction']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                    {{ Form::text('general_skill', $assessmentMethod->general_skill, ['class' => 'form-control', 'placeholder' => 'General skill Satisfaction']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                    {{ Form::text('professional_skill', $assessmentMethod->professional_skill, ['class' => 'form-control', 'placeholder' => 'Professional skill Satisfaction']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                    {{ Form::text('intellectual_skill', $assessmentMethod->intellectual_skill, ['class' => 'form-control', 'placeholder' => 'Intellectual skill Satisfaction']) }}
                    <p class="help-block text-danger"></p>
                </div>
                {{Form::hidden('_method', 'PUT')}}
                <div id="success"></div>
                {{ Form::submit('Update Method', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/assessment-methods" class="btn btn-default btn-lg">
                    Cancel
                </a>
                {!! Form::close() !!}

                {!! Form::open(['action'  => ['AssessmentMethodController@destroy', $assessmentMethod->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}

                {{ Form::hidden('_method', 'DELETE')  }}
                {{ Form::submit('Delete', ['class' => 'btn btn-default btn-lg', 'style' => 'background: darkred; color: white;'])}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection