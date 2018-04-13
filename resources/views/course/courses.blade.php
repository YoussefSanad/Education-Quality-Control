@extends('layouts.show-layout')

@section('content')
    @if(count($courses) > 0)
        <div class="limiter">
            <div class="container-table100" style="background-color: #54D0DD">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <table data-vertable="ver1">
                            <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" data-column="column1">Code</th>
                                <th class="column100 column2" data-column="column2">Course Name</th>
                                <th class="column100 column3" data-column="column2">Objectives</th>
                                <th class="column100 column3" data-column="column2">description</th>
                                <th class="column100 column3" data-column="column2">Assessment Method</th>
                                <th class="column100 column3" data-column="column2">Doctor Name</th>
                                <th class="column100 column3" data-column="column2">Student Evaluation</th>
                                <th class="column100 column3" data-column="column2">Success Percentage</th>
                                <th class="column100 column3" data-column="column2">Syllabuses</th>
                                <th class="column100 column3" data-column="column2">Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)

                                <tr class="row100">
                                    <td class="column100 column1" data-column="column1">{{$course->code}}</td>
                                    <td class="column100 column2" data-column="column2">{{$course->name}}</td>
                                    <td class="column100 column2" data-column="column2">{{$course->objectives}}</td>
                                    <td class="column100 column2" data-column="column2">{{$course->description}}</td>
                                    <td class="column100 column2" data-column="column2">{{$course->assessment_method}}</td>
                                    <td class="column100 column2" data-column="column2">{{$course->doctor_name}}</td>
                                    <td class="column100 column2" data-column="column2">{{$course->student_evaluation}}</td>
                                    <td class="column100 column2" data-column="column2">{{$course->success_percentage}}</td>
                                    <td class="column100 column2" data-column="column2">
                                        <a href="/courses/{{$course->id}}" style="color: #3ce500">
                                            Show
                                        </a>
                                    </td>
                                    <td class="column100 column8" data-column="column3">
                                        <a href="/courses/{{$course->id}}/edit" style="color: #3ce500">
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
        <h2>No Courses Found</h2>
    @endif


@endsection


