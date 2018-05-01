@extends('layouts.show-layout')

@section('content')
    @if($courseSpecification)
        <div class="limiter">
            <div class="container-table100" style="background-color: #54D0DD">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <table data-vertable="ver1">
                            <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" >Program</th>
                                <th class="column100 column2" >Pre-requisite</th>
                                <th class="column100 column3" >Approval Date</th>
                                <th class="column100 column4" >Credit Hours</th>
                                @if(!Auth::user()->is_admin)
                                    <th class="column100 columnh" >Data</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                                    <tr class="row100">
                                        <td class="column100 column1" >{{$courseSpecification->program}}</td>
                                        <td class="column100 column2" >{{$courseSpecification->pre_requisite}}</td>
                                        <td class="column100 column2" >{{$courseSpecification->approval_date}}</td>
                                        <td class="column100 column2" >{{$courseSpecification->credit_hours}}</td>
                                        @if(!Auth::user()->is_admin)
                                            <td class="column100 column8" >
                                                <a href="/course-specifications/{{$courseSpecification->id}}/edit#main" style="color: #1e7e34">
                                                    Edit
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
                    <h2>No CourseSpecification Found</h2>
                </div>
            </div>
            @if(!Auth::user()->is_admin)
                <a href="/course-specifications/create#main" class="btn btn-default btn-lg">
                    Add
                </a>
            @endif
            <a href="courses/{{ session()->get('selectedCourse')->id  }}#main" class="btn btn-default btn-lg">
                Back
            </a>
        </div>
    @endif


@endsection


