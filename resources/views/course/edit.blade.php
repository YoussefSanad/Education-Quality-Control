@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Update Course</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => ['CourseController@update', $course->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('name', $course->name, ['class' => 'form-control', 'placeholder' => 'Course name']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('code', $course->code, ['class' => 'form-control', 'placeholder' => 'Course code']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="doctor_name">Doctor Name</label>
                        <select class="form-control" name="doctor_name">
                            <h6 class="dropdown-header">Doctor name</h6>
                            @foreach(session()->get('selectedCollage')->doctors as $doctor)
                                <option value="{{$doctor->name}}">Dr. {{$doctor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="academic_year_id">Academic Year</label>
                        <select class="form-control" name="academic_year_id">
                            @foreach(session()->get('selectedCollage')->academicYears as $academicYear)
                                <option value="{{$academicYear->id}}">{{$academicYear->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::number('student_evaluation', $course->student_evaluation, ['class' => 'form-control', 'placeholder' => 'Student evaluation for the  course']) }}
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    {{ Form::number('success_percentage', $course->success_percentage, ['class' => 'form-control', 'placeholder' => 'Course success rate']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::textArea('description', $course->description, ['class' => 'form-control', 'placeholder' => 'Course description']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::textArea('objectives', $course->objectives, ['class' => 'form-control', 'placeholder' => 'Course objectives']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                {{Form::hidden('_method', 'PUT')}}
                <div id="success"></div>
                {{ Form::submit('Update', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                {!! Form::close() !!}

                {!! Form::open(['action'  => ['CourseController@destroy', $course->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}

                {{ Form::hidden('_method', 'DELETE')  }}
                {{ Form::submit('Delete', ['class' => 'btn btn-default btn-lg', 'style' => 'background: darkred; color: white;'])}}
                {!! Form::close() !!}

                <br>
                <a href="/collages/{{ session()->get('selectedCollage')->id  }}#main" class="btn btn-default btn-lg">
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection