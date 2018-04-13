@extends('layouts.show-layout')

@section('content')
    @if(count($employees) > 0)
        <div class="limiter">
            <div class="container-table100" style="background-color: #54D0DD">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <table data-vertable="ver1">
                            <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" data-column="column1">Employee Name</th>
                                <th class="column100 column2" data-column="column2">Address</th>
                                <th class="column100 column3" data-column="column2">phone</th>
                                <th class="column100 column3" data-column="column2">Data</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)

                                <tr class="row100">
                                    <td class="column100 column1" data-column="column1">{{$employee->name}}</td>
                                    <td class="column100 column2" data-column="column2">{{$employee->address}}</td>
                                    <td class="column100 column2" data-column="column2">{{$employee->phone}}</td>
                                    <td class="column100 column8" data-column="column3">
                                        <a href="/employees/{{$employee->id}}/edit" style="color: #1e7e34">
                                            Edit
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
        <h2>No Employees Found</h2>
    @endif


@endsection

