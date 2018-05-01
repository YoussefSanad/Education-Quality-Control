@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Add Professional Skill</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => 'CourseToProfessionalController@store' , 'method' => 'POST' , 'id' => 'contactForm']) !!}

                <div class="form-group">
                    <label for="academic_year_id">Professional Skill</label>
                    <select class="form-control" name="professional_skill_id">
                        @foreach($topics as $topic)
                            <option value="{{$topic->id}}">{{$topic->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div id="success"></div>
                {{ Form::submit('Add To Course', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/professional-skills#main" class="btn btn-default btn-lg">
                    Cancel
                </a>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection