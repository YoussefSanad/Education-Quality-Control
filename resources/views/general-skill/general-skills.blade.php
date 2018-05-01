@extends('layouts.show-layout')

@section('content')
    @if(count($generalSkills) > 0)
        <div class="limiter">
            <div class="container-table100" style="background-color: #54D0DD">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <table data-vertable="ver1">
                            <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" >ID</th>
                                <th class="column100 column2" >General Skill Name</th>

                                @if(!Auth::user()->is_admin)
                                <th class="column100 column2" >Data</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($generalSkills as $generalSkill)

                                <tr class="row100">
                                    <td class="column100 column1" >{{$generalSkill->id}}</td>
                                    <td class="column100 column2" >{{$generalSkill->name}}</td>


                                    @if(!Auth::user()->is_admin && !session('selectedCourse'))
                                        <td class="column100 column8" >
                                            <a href="/general-skills/{{$generalSkill->id}}/edit" style="color: #1e7e34">
                                                Edit
                                            </a>
                                        </td>
                                        @elseif(!Auth::user()->is_admin)
                                            <td class="column100 column8" >
                                                {!! Form::open(['action'  => ['CourseToGeneralController@destroy', $generalSkill->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}

                                                {{ Form::hidden('_method', 'DELETE')  }}
                                                {{ Form::submit('Delete', ['class' => '', 'style' => 'background: transparent; color: red;'])}}
                                                {!! Form::close() !!}
                                            </td>
                                        @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


    @else
                    <div>
        <div id="contact" class="text-center">
            <div class="container">
                @include('parts.messages')
                <div class="section-title center">
                    <h2>No General Skills Found</h2>
                </div>
            </div>

    @endif

            @if(!Auth::user()->is_admin && !session('selectedCourse'))
                <a href="/general-skills/create" class="btn btn-default btn-lg">
                    Add
                </a>

                <a href="collages/{{ session()->get('selectedCollage')->id  }}" class="btn btn-default btn-lg">
                    Back
                </a>
            @elseif(!Auth::user()->is_admin && session('selectedCourse'))
                <a href="/course-to-generals/create" class="btn btn-default btn-lg">
                    Add
                </a>
                <a href="courses/{{ session()->get('selectedCourse')->id  }}#main" class="btn btn-default btn-lg">
                    Back
                </a>
            @elseif(Auth::user()->is_admin && !session('selectedCourse'))
                <a href="collages/{{ session()->get('selectedCollage')->id  }}" class="btn btn-default btn-lg">
                    Back
                </a>
            @else
                <a href="courses/{{ session()->get('selectedCourse')->id  }}#main" class="btn btn-default btn-lg">
                    Back
                </a>
            @endif

        </div>
            </div>
@endsection


