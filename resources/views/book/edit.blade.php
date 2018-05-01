@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Update Book</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => ['BookController@update', $book->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('name', $book->name, ['class' => 'form-control', 'placeholder' => 'Book name']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('author', $book->author, ['class' => 'form-control', 'placeholder' => 'Author name']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                {{Form::hidden('_method', 'PUT')}}
                <div id="success"></div>
                {{ Form::submit('Update Book', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/books#main" class="btn btn-default btn-lg">
                    Cancel
                </a>
                {!! Form::close() !!}

                {!! Form::open(['action'  => ['BookController@destroy', $book->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}

                {{ Form::hidden('_method', 'DELETE')  }}
                {{ Form::submit('Delete', ['class' => 'btn btn-default btn-lg', 'style' => 'background: darkred; color: white;'])}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection