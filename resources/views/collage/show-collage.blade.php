@extends('layouts.app')

@section('content')
    <div id="contact" class="text-center">
        <div class="container">
            <div class="section-title center">
                <h2>{{$collage->name}}</h2>
                <hr>
            </div>
            <a href="/knowledge-understandings#main" class="btn btn-default btn-lg" style="width: 100%">
                 Knowledge & Understanding
            </a>
            <a href="/intellectual-skills#main" class="btn btn-default btn-lg" style="width: 100%">
                Intellectual skills
            </a>
            <a href="/professional-skills#main" class="btn btn-default btn-lg" style="width: 100%">
                Professional skills
            </a>
            <a href="/general-skills#main" class="btn btn-default btn-lg" style="width: 100%">
                General skills
            </a>
            <a href="/departments#main" class="btn btn-default btn-lg" style="width: 100%">
                Departments
            </a>
            <a href="/employees#main" class="btn btn-default btn-lg" style="width: 100%">
                 Employees
            </a>
            <a href="/doctors#main" class="btn btn-default btn-lg" style="width: 100%">
                 Doctors
            </a>
            <a href="/academic-years#main" class="btn btn-default btn-lg" style="width: 100%">
                 Academic Years
            </a>
            <a href="/courses#main" class="btn btn-default btn-lg" style="width: 100%">
                 Courses
            </a>
            <a href="/comments#main" class="btn btn-default btn-lg" style="width: 100%">
                Comments
            </a>
            @if(!Auth::user()->is_admin)
                <a href="/collages/{{$collage->id}}/edit" class="btn btn-default btn-lg" style="background: green; color: white;">
                    Edit Collage Data
                </a>

                {!! Form::open(['action'  => ['CollagesController@destroy', $collage->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}
                    {{ Form::hidden('_method', 'DELETE')  }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-default btn-lg', 'style' => 'background: red; color: white;'])}}
                {!! Form::close() !!}
            @else
                <a href="/comments/create#main" class="btn btn-default btn-lg" style="background: blueviolet; color: white;">
                    Comment
                </a>
            @endif
        </div>
    </div>
@endsection