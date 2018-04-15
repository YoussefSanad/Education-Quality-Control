@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">

            <div class="section-title center">
                <h2>Update Doctor</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => ['DoctorController@update', $doctor->id] , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('name', $doctor->name, ['class' => 'form-control', 'placeholder' => 'Doctor name']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('birth_date', $doctor->birth_date, ['class' => 'form-control', 'placeholder' => 'Doctor birth date']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::text('graduation_uni', $doctor->graduation_uni, ['class' => 'form-control', 'placeholder' => 'Doctor graduation university']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                    {{ Form::text('graduation_year', $doctor->graduation_year, ['class' => 'form-control', 'placeholder' => 'Doctor graduation year']) }}
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    {{ Form::number('masters_percentage', $doctor->masters_percentage, ['class' => 'form-control', 'placeholder' => 'Doctor Master percentage']) }}
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    {{ Form::text('masters_place_of_issue', $doctor->masters_place_of_issue, ['class' => 'form-control', 'placeholder' => 'Doctor Master place of issue']) }}
                    <p class="help-block text-danger"></p>
                </div>
                {{Form::hidden('_method', 'PUT')}}
                <div id="success"></div>
                {{ Form::submit('Update', ['class' => 'btn btn-default btn-lg'])}}
                <br>

                {!! Form::close() !!}

                {!! Form::open(['action'  => ['DoctorController@destroy', $doctor->id ], 'method' => 'POST' , 'id' => 'contactForm']) !!}

                {{ Form::hidden('_method', 'DELETE')  }}
                {{ Form::submit('Delete', ['class' => 'btn btn-default btn-lg', 'style' => 'background: darkred; color: white;'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection