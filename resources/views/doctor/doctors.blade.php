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
                                <th class="column100 column1" >Doctor Name</th>
                                <th class="column100 column2" >Birth Date</th>
                                <th class="column100 column3" >Graduated From</th>
                                <th class="column100 column3" >Graduation Year</th>
                                <th class="column100 column3" >Masters Percentage</th>
                                <th class="column100 column3" >Masters Place of Issue</th>
                                @if(!Auth::user()->is_admin)
                                    <th class="column100 column3" >Data</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $doctor)

                                <tr class="row100">
                                    <td class="column100 column1" >{{$doctor->name}}</td>
                                    <td class="column100 column2" >{{$doctor->birth_date}}</td>
                                    <td class="column100 column2" >{{$doctor->graduation_uni}}</td>
                                    <td class="column100 column2" >{{$doctor->graduation_year}}</td>
                                    <td class="column100 column2" >{{$doctor->masters_percentage}}</td>
                                    <td class="column100 column2" >{{$doctor->masters_place_of_issue}}</td>
                                    @if(!Auth::user()->is_admin)
                                        <td class="column100 column8" >
                                            <a href="/doctors/{{$doctor->id}}/edit" style="color: #1e7e34">
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
                <a href="/doctors/create" class="btn btn-default btn-lg">
                    Add
                </a>
                @endif
                <a href="collages/{{ session()->get('selectedCollage')->id  }}" class="btn btn-default btn-lg">
                    Back
                </a>
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
            @if(!Auth::user()->is_admin)
            <a href="/doctors/create" class="btn btn-default btn-lg">
                Add
            </a>
            @endif
            <a href="collages/{{ session()->get('selectedCollage')->id  }}" class="btn btn-default btn-lg">
                Back
            </a>
        </div>
    @endif


@endsection


