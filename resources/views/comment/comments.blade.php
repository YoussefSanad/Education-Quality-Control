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
                                <th class="column100 column1" data-column="column1">CollageName</th>
                                <th class="column100 column2" data-column="column2">Comment</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)

                                <tr class="row100">
                                    <td class="column100 column1" data-column="column1">{{session()->get('selectedCollage')->name}}</td>
                                    <td class="column100 column2" data-column="column2">{{$comment->comment}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if(Auth::user()->is_admin)
                    <a href="/comments/create" class="btn btn-default btn-lg">
                        Add
                    </a>
                @endif
                <a href="{{ URL::previous() }}" class="btn btn-default btn-lg">
                    Back
                </a>
            </div>
        </div>

    @else
        <div id="contact" class="text-center">
            <div class="container">
                @include('parts.messages')
                <div class="section-title center">
                    <h2>No Books Found</h2>
                </div>
            </div>
            @if(Auth::user()->is_admin)
                <a href="/comments/create" class="btn btn-default btn-lg">
                    Add
                </a>
            @endif
            <a href="{{ URL::previous() }}" class="btn btn-default btn-lg">
                Back
            </a>
        </div>
    @endif


@endsection


