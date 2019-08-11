
@extends('layout')

@section('content')
    <div class="d-flex flex-row justify-content-between">
        <h5>List Report Template</h5>
        <a href="/admin/report-template/add"><button type="button" class="btn btn-secondary"> + Add Report Template</button></a>
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
                <th>Report Type</th>
                <th>Author</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($templates as $template)
            <tr>
                <td>{{ $template->id }}</td>
                <td>{{ $template->name }}</td>
                <td>{{ $template->label }}</td>
                <td>{{ $template->report_type }}</td>
                <td>{{ $template->author_id }}</td>
                <td>
                    <a href="/admin/report-template/del/{{ $template->id }}"><button type="button" class="btn btn-secondary btn-sm">Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
