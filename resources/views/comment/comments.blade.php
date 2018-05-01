@extends('layouts.show-layout')

@section('content')
    @if(count($comments) > 0)
        <div class="limiter">
            <div class="container-table100" style="background-color: #54D0DD">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <table data-vertable="ver1">
                            <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" >CollageName</th>
                                <th class="column100 column2" >Comment</th>
                                @if(Auth::user()->is_admin)
                                    <th class="column100 column2" >Data</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)

                                <tr class="row100">
                                    <td class="column100 column1" >{{session()->get('selectedCollage')->name}}</td>
                                    <td class="column100 column2" >{{$comment->comment}}</td>

                                    @if(Auth::user()->is_admin)
                                        <td class="column100 column2" >
                                            {!! Form::open(['action'  => ['CommentController@destroy', $comment->id ], 'method' => 'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE')  }}
                                            {{ Form::submit('Delete', ['style' => 'color: red; background: transparent'])}}
                                            {!! Form::close() !!}
                                        </td>

                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if(Auth::user()->is_admin)
                    <a href="/comments/create#main" class="btn btn-default btn-lg">
                        Add
                    </a>
                @endif
                <a href="collages/{{ session()->get('selectedCollage')->id  }}#main" class="btn btn-default btn-lg">
                    Back
                </a>
            </div>
        </div>

    @else
        <div id="contact" class="text-center">
            <div class="container">
                @include('parts.messages')
                <div class="section-title center">
                    <h2>No Comments Found</h2>
                </div>
            </div>
            @if(Auth::user()->is_admin)
                <a href="/comments/create#main" class="btn btn-default btn-lg">
                    Add
                </a>
            @endif
            <a href="collages/{{ session()->get('selectedCollage')->id  }}#main" class="btn btn-default btn-lg">
                Back
            </a>
        </div>
    @endif


@endsection


