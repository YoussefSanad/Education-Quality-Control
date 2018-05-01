@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Edit Intellectual Skill</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => ['IntellectualSkillController@update', $intellectualSkill->id] , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="form-group">
                    {{ Form::text('name', $intellectualSkill->name, ['class' => 'form-control', 'placeholder' => 'Intellectual Skill name']) }}
                    <p class="help-block text-danger"></p>
                </div>
                {{ Form::hidden('_method', 'PUT')  }}
                <div id="success"></div>
                {{ Form::submit('Update', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                {!! Form::close() !!}

                {!! Form::open(['action'  => ['IntellectualSkillController@destroy', $intellectualSkill->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}

                {{ Form::hidden('_method', 'DELETE')  }}
                {{ Form::submit('Delete', ['class' => 'btn btn-default btn-lg', 'style' => 'background: darkred; color: white;'])}}
                {!! Form::close() !!}

                <br>
                <a href="/intellectual-skills#main" class="btn btn-default btn-lg">
                    Back
                </a>
            </div>
        </div>
    </div>

@endsection