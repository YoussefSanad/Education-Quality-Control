@extends('layouts.show-layout')

@section('content')
    @if(count($documents) > 0)
        <div class="limiter">
            <div class="container-table100" style="background-color: #54D0DD">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <table data-vertable="ver1">
                            <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" >Course Name</th>
                                <th class="column100 column2" >Document Name</th>
                                @if(!Auth::user()->is_admin)
                                    <th class="column100 column8" >
                                        Data
                                    </th>
                                @endif
                                <th class="column100 column2" >Download</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($documents as $document)

                                <tr class="row100">
                                    <td class="column100 column1" >{{$document->course->name}}</td>
                                    <td class="column100 column2" >{{$document->original_name}}</td>
                                    @if(!Auth::user()->is_admin)
                                        <td class="column100 column8" >
                                            <a href="/documents/{{$document->id}}/edit#main" style="color: #1e7e34">
                                                Edit
                                            </a>
                                        </td>
                                    @endif
                                    <td class="column100 column8" >
                                        <a href="/documents/{{$document->id}}" style="color: #00be04">
                                            Download
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if(!Auth::user()->is_admin)
                    <a href="/documents/create#main" class="btn btn-default btn-lg">
                        Add
                    </a>
                @endif
                <a href="courses/{{ session()->get('selectedCollage')->id  }}#main" class="btn btn-default btn-lg">
                    Back
                </a>
            </div>
        </div>

    @else
        <div id="contact" class="text-center">
            <div class="container">
                @include('parts.messages')
                <div class="section-title center">
                    <h2>No Documents Found</h2>
                </div>
            </div>
            @if(!Auth::user()->is_admin)
                <a href="/documents/create#main" class="btn btn-default btn-lg">
                    Add
                </a>
            @endif
            <a href="courses/{{ session()->get('selectedCourse')->id  }}#main" class="btn btn-default btn-lg">
                Back
            </a>
        </div>
    @endif


@endsection


