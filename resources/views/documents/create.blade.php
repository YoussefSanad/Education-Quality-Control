@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Add Document</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => 'CollageDocumentController@store' , 'method' => 'POST' , 'id' => 'contactForm','files'=>'true']) !!}
                <div class="form-group">
                    {{ Form::file('document', ['class' => 'form-control']) }}
                    <p class="help-block text-danger"></p>
                </div>
                <div id="success"></div>
                {{ Form::submit('Add Document', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/documents#main" class="btn btn-default btn-lg">
                    Back
                </a>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection