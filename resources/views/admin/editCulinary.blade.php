@extends('layouts.appAdmin')
@section('content')

<br>
<br>
<div id="hotel-bg" class="view">
    <div class="mask flex-center rgba-black-strong">
        <h3 class="white-text custom-font ">Edit Culinary</h3>
    </div>
</div>
<h1 class = "mt-3">List File</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@elseif(session('failed'))
    <div class="alert alert-danger">
        {{session('failed')}}
    </div>
@endif
<table class ="table">
    <thead class = "thead-dark">
        <tr>
            <th scope = "col">Num</th>
            <th scope = "col">Title</th>
            <th scope = "col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (count($files)== 0)
            <tr>
                <td colspan="3">No Data Entry</td>
            </tr>
        @endif
        @foreach($files as $file)
        <tr>
            <td>{{$loop->iteration }}</td>
            <td>{{$file->title}}</td>
            <td>
                <a href="/admin/editCulinary/{{$file->title}}">
                    <button class="btn btn-primary">edit</button>
                </a>
                <form action = "/edit/delete/{{$file->type}}/{{$file->title}}" method = "post">
                    @method('delete')
                    @csrf
                    <button type = "Submit" class = "btn btn-danger">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>