@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            @include('parts.messages')
            <div class="section-title center">
                <h2>Add Doctor</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => 'DoctorController@store' , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Doctor name']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::text('birth_date', '', ['class' => 'form-control', 'placeholder' => 'Doctor birth date']) }}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::text('graduation_uni', '', ['class' => 'form-control', 'placeholder' => 'Doctor graduation university']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                    {{ Form::text('graduation_year', '', ['class' => 'form-control', 'placeholder' => 'Doctor graduation year']) }}
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    {{ Form::number('masters_percentage', '', ['class' => 'form-control', 'placeholder' => 'Doctor Master percentage']) }}
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    {{ Form::text('masters_place_of_issue', '', ['class' => 'form-control', 'placeholder' => 'Doctor Master place of issue']) }}
                    <p class="help-block text-danger"></p>
                </div>

                <div id="success"></div>
                {{ Form::submit('Add Doctor', ['class' => 'btn btn-default btn-lg'])}}
                <br>
                <a href="/collages/{{ session()->get('selectedCollage')->id  }}#main" class="btn btn-default btn-lg">
                    Back
                </a>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection