@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Add Course Specification</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => 'CourseSpecificationController@store' , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('program', '', ['class' => 'form-control', 'placeholder' => 'Program']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('pre_requisite', '', ['class' => 'form-control', 'placeholder' => 'Course pre requisite']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::number('credit_hours', '', ['class' => 'form-control', 'placeholder' => '# Of Credit hours']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6">
                        {{Form::label('approval_date', 'Approval Date' , ['class' => 'text-center'])}}
                        <div class="form-group">
                            {{ Form::date('approval_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>


                <div id="success"></div>
                {{ Form::submit('Add Course Specification', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/course-specifications" class="btn btn-default btn-lg">
                    Back
                </a>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection