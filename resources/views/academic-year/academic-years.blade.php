@extends('layouts.show-layout')

@section('content')
    @if(count($academicYears) > 0)
        <div class="limiter">
            <div class="container-table100" style="background-color: #54D0DD">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <table data-vertable="ver1">
                            <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" >Academic Year Name</th>
                                <th class="column100 column2" >Number Of Students</th>
                                @if(!Auth::user()->is_admin)
                                    <th class="column100 column3" >Data</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($academicYears as $academicYear)

                                <tr class="row100">
                                    <td class="column100 column1" >{{$academicYear->name}}</td>
                                    <td class="column100 column2" >{{$academicYear->number_of_students}}</td>
                                    @if(!Auth::user()->is_admin)
                                        <td class="column100 column8" >
                                            <a href="/academic-years/{{$academicYear->id}}/edit" style="color: #1e7e34">
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
                    <a href="/academic-years/create" class="btn btn-default btn-lg">
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
                    <h2>No Academic Years Found</h2>
                </div>
            </div>
            @if(!Auth::user()->is_admin)
                <a href="/academic-years/create" class="btn btn-default btn-lg">
                    Add
                </a>
            @endif
            <a href="collages/{{ session()->get('selectedCollage')->id  }}" class="btn btn-default btn-lg">
                Back
            </a>
        </div>
    @endif



@endsection


