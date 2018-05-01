@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Add Method</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => 'LearningMethodController@store' , 'method' => 'POST' , 'id' => 'contactForm']) !!}

                <div class="form-group">
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Method name']) }}
                    <p class="help-block text-danger"></p>
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
                {{ Form::submit('Add Learning Method', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/learning-methods" class="btn btn-default btn-lg">
                    Back
                </a>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection