@extends('layouts.app')

@section('content')
    <div id="contact" class="text-center">
        <div class="container">
            <div class="section-title center">
                <h2>{{$collage->name}}</h2>
                <hr>
            </div>
            <a href="/departments" class="btn btn-default btn-lg" style="width: 100%">
                 Departments
            </a>
            <a href="/employees" class="btn btn-default btn-lg" style="width: 100%">
                 Employees
            </a>
            <a href="/doctors" class="btn btn-default btn-lg" style="width: 100%">
                 Doctors
            </a>
            <a href="/academic-years" class="btn btn-default btn-lg" style="width: 100%">
                 Academic Years
            </a>
            <a href="/courses" class="btn btn-default btn-lg" style="width: 100%">
                 Courses
            </a>
            <a href="/books" class="btn btn-default btn-lg" style="width: 100%">
                 Books
            </a>
            <a href="/syllabuses" class="btn btn-default btn-lg" style="width: 100%">
                 Syllabuses
            </a>
            <a href="/collages/{{$collage->id}}/edit" class="btn btn-default btn-lg" style="background: green; color: white;">
                Edit Collage Data
            </a>
            {!! Form::open(['action'  => ['CollagesController@destroy', $collage->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}

            {{ Form::hidden('_method', 'DELETE')  }}
            {{ Form::submit('Delete', ['class' => 'btn btn-default btn-lg', 'style' => 'background: red; color: white;'])}}
            {!! Form::close() !!}

        </div>
    </div>
@endsection