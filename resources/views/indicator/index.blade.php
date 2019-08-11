
@extends('layout')

@section('content')
    <div class="d-flex flex-row justify-content-between">
        <h5>List Indicator</h5>
        <a href="/admin/indicator/add"><button type="button" class="btn btn-secondary"> + Add indicator</button></a>
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
                <th>Name</th>
                <th>Label</th>
                <th>Unit Label</th>
                <th>Parent</th>
                <th>Is Parent</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($indicators as $indicator)
            <tr>
                <td>{{ $indicator->id }}</td>
                <td>{{ $indicator->name }}</td>
                <td>{{ $indicator->label }}</td>
                <td>{{ $indicator->unit_label }}</td>
                <td>{{ $indicator->indicator_parent_id }}</td>
                <td>{{ $indicator->is_parent == 1 ? 'true' : 'false'}}</td>
                <td>{{ $indicator->created_at }}</td>
                <td>{{ $indicator->updated_at }}</td>
                <td>
                    <a href="/admin/indicator/del/{{ $indicator->id }}"><button type="button" class="btn btn-secondary btn-sm">Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
