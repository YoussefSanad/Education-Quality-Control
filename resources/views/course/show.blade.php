@extends('layouts.app')

@section('content')
    <div id="contact" class="text-center">
        <div class="container">
            <div class="section-title center">
                <h2>{{$course->name}}</h2>
                <hr>
            </div>
            <a href="/course-specifications#main" class="btn btn-default btn-lg" style="width: 100%">
                Course Specification
            </a>
            <a href="/course-matrices#main" class="btn btn-default btn-lg" style="width: 100%">
                Course matrix
            </a>
            <a href="/books#main" class="btn btn-default btn-lg" style="width: 100%">
                Books
            </a>
            <a href="/syllabuses#main" class="btn btn-default btn-lg" style="width: 100%">
                Syllabuses
            </a>
            <a href="/assessment-methods#main" class="btn btn-default btn-lg" style="width: 100%">
                Assessment methods
            </a>
            <a href="/learning-methods#main" class="btn btn-default btn-lg" style="width: 100%">
                Learning methods
            </a>
            <a href="/documents#main" class="btn btn-default btn-lg" style="width: 100%">
                Course Documents
            </a>
            <a href="/intellectual-skills#main" class="btn btn-default btn-lg" style="width: 100%">
                Intellectual Skills
            </a>
            <a href="/general-skills#main" class="btn btn-default btn-lg" style="width: 100%">
                General Skills
            </a>
            <a href="/professional-skills#main" class="btn btn-default btn-lg" style="width: 100%">
                Professional Skills
            </a>
            <a href="/knowledge-understandings#main" class="btn btn-default btn-lg" style="width: 100%">
                Knowledge & Understanding
            </a>

            <br>
            <a href="/courses#main" class="btn btn-default btn-lg">
                Back
            </a>
        </div>
    </div>
@endsection