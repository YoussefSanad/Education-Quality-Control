@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Add General Skill</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => 'CourseToGeneralController@store' , 'method' => 'POST' , 'id' => 'contactForm']) !!}

                <div class="form-group">
                    <label for="academic_year_id">General Skill</label>
                    <select class="form-control" name="general_skill_id">
                        @foreach($topics as $topic)
                            <option value="{{$topic->id}}">{{$topic->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div id="success"></div>
                {{ Form::submit('Add To Course', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/general-skills#main" class="btn btn-default btn-lg">
                    Cancel
                </a>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection