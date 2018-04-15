@extends('layouts.show-layout')

@section('content')
    @if($collages)
        <div class="limiter">
            <div class="container-table100" style="background-color: #54D0DD">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <table data-vertable="ver1">
                            <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" >Collage Name</th>
                                <th class="column100 column2" >E-mail</th>
                                <th class="column100 column3" >Location</th>
                                <th class="column100 column4" >Area</th>
                                <th class="column100 column5" >Phone</th>
                                <th class="column100 column6" >Fax</th>
                                <th class="column100 column6" >Number of halls</th>
                                <th class="column100 column6" >Nuamber of labs</th>
                                <th class="column100 column6" >Nuamber of classrooms</th>
                                <th class="column100 column6" >Data</th>

                            </tr>
                            </thead>
                                <tbody>
                                    @foreach($collages as $collage)

                                            <tr class="row100">
                                                <td class="column100 column1" >{{$collage->name}}</td>
                                                <td class="column100 column2" >{{$collage->email}}</td>
                                                <td class="column100 column3" >{{$collage->location}}</td>
                                                <td class="column100 column4" >{{$collage->area}}</td>
                                                <td class="column100 column5" >{{$collage->phone}}</td>
                                                <td class="column100 column6" >{{$collage->fax}}</td>
                                                <td class="column100 column7" >{{$collage->number_of_halls}}</td>
                                                <td class="column100 column8" >{{$collage->number_of_labs}}</td>
                                                <td class="column100 column8" >{{$collage->number_of_classrooms}}</td>
                                                <td class="column100 column8" >
                                                    <a href="/collages/{{$collage->id}}" style="color: #1e7e34">
                                                        Show
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
                    <h2>No Collages Found</h2>
                </div>
            </div>
        </div>
    @endif


@endsection


