@extends('layouts.show-layout')

@section('content')
    @if(count($syllabuses) > 0)
        <div class="limiter">
            <div class="container-table100" style="background-color: #54D0DD">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <table data-vertable="ver1">
                            <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" data-column="column1">Course ID</th>
                                <th class="column100 column1" data-column="column1">Week Number</th>
                                <th class="column100 column2" data-column="column2">Goal</th>
                                <th class="column100 column3" data-column="column2">Data</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($syllabuses as $syllabus)

                                <tr class="row100">
                                    <td class="column100 column1" data-column="column1">{{$syllabus->course_id}}</td>
                                    <td class="column100 column1" data-column="column1">{{$syllabus->week_number}}</td>
                                    <td class="column100 column2" data-column="column2">{{$syllabus->goal}}</td>
                                    <td class="column100 column8" data-column="column3">
                                        <a href="/syllabuses/{{$syllabus->id}}/edit" style="color: #1e7e34">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @else
        <div id="contact" class="text-center">
            <div class="container">
                @include('parts.messages')
                <div class="section-title center">
                    <h2>No Syllabuses Found</h2>
                </div>
            </div>
        </div>
    @endif


@endsection


