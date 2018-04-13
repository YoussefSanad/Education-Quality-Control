@extends('layouts.show-layout')

@section('content')
    @if(count($doctors) > 0)
        <div class="limiter">
            <div class="container-table100" style="background-color: #54D0DD">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <table data-vertable="ver1">
                            <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" data-column="column1">Doctor Name</th>
                                <th class="column100 column2" data-column="column2">Birth Date</th>
                                <th class="column100 column3" data-column="column2">Graduated From</th>
                                <th class="column100 column3" data-column="column2">Graduation Year</th>
                                <th class="column100 column3" data-column="column2">Masters Percentage</th>
                                <th class="column100 column3" data-column="column2">Masters Place of Issue</th>
                                <th class="column100 column3" data-column="column2">Data</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $doctor)

                                <tr class="row100">
                                    <td class="column100 column1" data-column="column1">{{$doctor->name}}</td>
                                    <td class="column100 column2" data-column="column2">{{$doctor->birth_date}}</td>
                                    <td class="column100 column2" data-column="column2">{{$doctor->graduation_uni}}</td>
                                    <td class="column100 column2" data-column="column2">{{$doctor->graduation_year}}</td>
                                    <td class="column100 column2" data-column="column2">{{$doctor->masters_percentage}}</td>
                                    <td class="column100 column2" data-column="column2">{{$doctor->masters_place_of_issue}}</td>
                                    <td class="column100 column8" data-column="column3">
                                        <a href="/doctors/{{$doctor->id}}/edit" style="color: #1e7e34">
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
                    <h2>No Doctors Found</h2>
                </div>
            </div>
        </div>
    @endif


@endsection


