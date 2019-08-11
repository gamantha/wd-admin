
@extends('layout')

@section('content')
    <div class="d-flex flex-row justify-content-between">
        <h5>List Category</h5>
        <a href="/admin/category/add"><button type="button" class="btn btn-secondary"> + Add Category</button></a>
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
                <th>Parent</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->label }}</td>
                <td>{{ $category->parent_category_id }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a href="/admin/category/del/{{ $category->id }}"><button type="button" class="btn btn-secondary btn-sm">Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
