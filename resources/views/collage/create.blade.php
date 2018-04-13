@extends('layouts.app')

@section('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            <div class="section-title center">
                <h2>Create Collage</h2>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action'  => 'CollagesController@store' , 'method' => 'POST' , 'id' => 'contactForm']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Collage name']) }}
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Collage e-mail']) }}
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Collage location']) }}
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="form-group">
                        {{ Form::text('area', '', ['class' => 'form-control', 'placeholder' => 'Collage area']) }}
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        {{ Form::number('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone number']) }}
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        {{ Form::text('fax', '', ['class' => 'form-control', 'placeholder' => 'Collage fax']) }}
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        {{ Form::number('number_of_halls', '', ['class' => 'form-control' , 'placeholder' => 'Number of halls']) }}
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        {{ Form::number('number_of_labs', '', ['class' => 'form-control' , 'placeholder' => 'Number of labs']) }}
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        {{ Form::number('number_of_classrooms', '', ['class' => 'form-control' , 'placeholder' => 'Number of classrooms']) }}
                        <p class="help-block text-danger"></p>
                    </div>

                    <div id="success"></div>
                {{ Form::submit('Add Collage', ['class' => 'btn btn-default btn-lg'])}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection