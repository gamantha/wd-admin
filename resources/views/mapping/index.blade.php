
@extends('layout')

@section('content')
    <div class="d-flex flex-row justify-content-between">
        <h5>List Mapping Report Indicator</h5>
        <a href="/admin/mapping/add"><button type="button" class="btn btn-secondary"> + Add Mapping</button></a>
    </div>
    <br />
    <div class="dropdown-divider"></div>
    <br />
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Indicator</th>
                <th>Category</th>
                <th>Report Template Name</th>
                <th>Order</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($mapping as $map)
            <tr>
                <td>{{ 1 }}</td>
                <td>{{ $map['indicatorName'] }}</td>
                <td>{{ $map['categoryName'] }}</td>
                <td>{{ $map['templateName'] }}</td>
                <td>{{ $map['order'] }}</td>
                {{-- <td>
                    <a href="/admin/mapping/del/{{ 1 }}"><button type="button" class="btn btn-secondary btn-sm">Delete</button></a>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
