@extends('layouts.show-layout')

@section('content')
    @if(count($courseMatrices) > 0)
        <div class="limiter">
            <div class="container-table100" style="background-color: #54D0DD">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <table data-vertable="ver1">
                            <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" >Main topic</th>
                                <th class="column100 column2" >Duration</th>
                                <th class="column100 column3" >Knowledge & Understanding</th>
                                <th class="column100 column3" >Professional Skill</th>
                                <th class="column100 column3" >General Skill</th>
                                <th class="column100 column3" >Intellectual Skill</th>
                                @if(!Auth::user()->is_admin)
                                    <th class="column100 column3" >Data</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courseMatrices as $courseMatrix)

                                <tr class="row100">
                                    <td class="column100 column1" >{{$courseMatrix->main_topic}}</td>
                                    <td class="column100 column2" >{{$courseMatrix->duration}}</td>
                                    <td class="column100 column2" >{{$courseMatrix->knowledge_understanding}}</td>
                                    <td class="column100 column2" >{{$courseMatrix->professional_skill}}</td>
                                    <td class="column100 column2" >{{$courseMatrix->general_skill}}</td>
                                    <td class="column100 column2" >{{$courseMatrix->intellectual_skill}}</td>
                                    @if(!Auth::user()->is_admin)
                                        <td class="column100 column8" >
                                            <a href="/course-matrices/{{$courseMatrix->id}}/edit#main" style="color: #3ce500">
                                                Edit
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if(!Auth::user()->is_admin)
                    <a href="/course-matrices/create#main" class="btn btn-default btn-lg">
                        Add
                    </a>
                @endif
                <a href="courses/{{ session()->get('selectedCourse')->id  }}#main" class="btn btn-default btn-lg">
                    Back
                </a>
            </div>
        </div>

    @else
        <div id="contact" class="text-center">
            <div class="container">
                @include('parts.messages')
                <div class="section-title center">
                    <h2>No Course matrices Found</h2>
                </div>
            </div>
            @if(!Auth::user()->is_admin)
                <a href="/course-matrices/create#main" class="btn btn-default btn-lg">
                    Add
                </a>
            @endif
            <a href="courses/{{ session()->get('selectedCourse')->id  }}#main" class="btn btn-default btn-lg">
                Back
            </a>
        </div>
    @endif


@endsection
