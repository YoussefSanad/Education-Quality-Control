@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Update Course Specification</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => ['CourseSpecificationController@update', $courseSpecification->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('program', $courseSpecification->program, ['class' => 'form-control', 'placeholder' => 'Program']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('pre_requisite', $courseSpecification->pre_requisite, ['class' => 'form-control', 'placeholder' => 'Course pre requisite']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::number('credit_hours', $courseSpecification->credit_hours, ['class' => 'form-control', 'placeholder' => '# Of Credit hours']) }}
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
                            {{ Form::date('approval_date', $courseSpecification->approval_date, ['class' => 'form-control']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
                {{Form::hidden('_method', 'PUT')}}
                <div id="success"></div>
                {{ Form::submit('Update CourseSpecification', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/course-specifications" class="btn btn-default btn-lg">
                    Cancel
                </a>
                {!! Form::close() !!}

                {!! Form::open(['action'  => ['CourseSpecificationController@destroy', $courseSpecification->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}

                {{ Form::hidden('_method', 'DELETE')  }}
                {{ Form::submit('Delete', ['class' => 'btn btn-default btn-lg', 'style' => 'background: darkred; color: white;'])}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection