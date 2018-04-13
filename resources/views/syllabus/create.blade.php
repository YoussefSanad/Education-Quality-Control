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
                            {{ Form::text('goal', '', ['class' => 'form-control', 'placeholder' => 'Goal']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="course_id">Course</label>
                    <select class="form-control" name="course_id">
                        <h6 class="dropdown-header">Course</h6>
                        @foreach(Auth::user()->collages as $collage)
                            @foreach($collage->courses as $course)
                                <option value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div id="success"></div>
                {{ Form::submit('Add Syllabus', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/books/create" class="btn btn-default btn-lg">
                    Next
                </a>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection