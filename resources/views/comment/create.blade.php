@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Add Comment</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => 'CommentController@store' , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="form-group">
                    {{ Form::textArea('comment', '', ['class' => 'form-control', 'placeholder' => 'Your Comment...']) }}
                    <p class="help-block text-danger"></p>
                </div>
                <div id="success"></div>
                {{ Form::submit('Comment', ['class' => 'btn btn-default btn-lg'])}}
                {!! Form::close() !!}
                <a href="/collages/{{ session()->get('selectedCollage')->id  }}#main" class="btn btn-default btn-lg">
                    Back
                </a>
            </div>
        </div>

    </div>

@endsection