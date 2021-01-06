@extends('layouts.appAdmin')
@section('content')

<br class="mt-5">
<br class="mt-5">
<br class="mt-5">
<br class="mt-5">

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
@foreach($file as $file)

<div class="container d-flex  justify-content-center h-100 mb-5">
    <div class="row ">
        <div class="col-md-20">

            <h3 class = "mt-3">Form Edit File</h3>
            <form action = "/update/{{$file->title}}/{{$file->type}}" method = "post" enctype="multipart/form-data" class="border border-light pad" >
                @method('patch')
                @csrf
                <h1 class="custom-font3"> {{ $file->title }} </h1>
                <div class="form-group">
                    <label for="main_pic">Main Picture:</label><br>
                    <img src = "{{ asset($file->main_pic) }}" width = "40%"><br><br>
                    <input 
                        type="file" 
                        class="form-control @error('main_pic') is-invalid @enderror" 
                        id="main_pic" 
                        name="main_pic">
                    @error('main_pic')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="desc">File Description:</label>
                    <input 
                        type="file" 
                        class="form-control @error('desc') is-invalid @enderror" 
                        id="desc" 
                        name="desc">
                    @error('desc')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price List:</label>
                    <input 
                        type="file" 
                        class="form-control @error('price') is-invalid @enderror" 
                        id="price" 
                        name="price">
                    @error('price')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            @endforeach
            @foreach($contacts as $contact)
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input 
                        type="text" 
                        class="form-control @error('phone') is-invalid @enderror" 
                        id="phone" 
                        placeholder="Add your Business Phone (required)" 
                        name="phone"
                        value="{{$contact->phone}}">
                    @error('phone')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="facebook" 
                        placeholder="Add your Facebook Account (optional)" 
                        name="facebook"
                        value="{{$contact->facebook}}">

                </div>
                <div class="form-group">
                    <label for="google">Google:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="google" 
                        placeholder="Add your Google Account (optional)" 
                        name="google"
                        value="{{$contact->google}}">
                </div>
                <div class="form-group">
                    <label for="linked-in">Linked-In:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="linkedin" 
                        placeholder="Add your Linked-In Account (optional)" 
                        name="linkedin"
                        value="{{$contact->linkedin}}">

                </div>
                <div class="form-group">
                    <label for="twitter">Twitter: </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="twitter" 
                        placeholder="Add your Twitter Account (optional)" 
                        name="twitter"
                        value="{{$contact->twitter}}">
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram: </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="instagram" 
                        placeholder="Add your Instagram Account (optional)" 
                        name="instagram"
                        value="{{$contact->instagram}}">
                </div>
                <div class="form-group">
                    <label for="pinterest">Pinterest: </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="pinterest" 
                        placeholder="Add your Pinterest Account (optional)" 
                        name="pinterest"
                        value="{{$contact->pinterest}}">
                </div>
            @endforeach
                <label for="galleries">Add New Galleries: </label>
                <div class="input-group hdtuto control-group lst increment" >
                    <input 
                        type="file"
                        name="filename[]" 
                        class="form-control" 
                        id="filename[]">
                    <div class="input-group-btn"> 
                        <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                </div>
                <div class="clone hide">
                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                        <input 
                            type="file" 
                            name="filename[]" 
                            class="form-control" 
                            id="filename[]">
                        <div class="input-group-btn"> 
                            <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
            <br>

            <h3>Galleries in File:</h3>

            @foreach($galleries as $gal)
                <form action = "/delete/{{$gal->title}}/{{$gal->name}}" method = "post" class = "d-inline">
                    @method('delete')
                    @csrf
                    <div class="form-group">
                        <img src = "{{ asset($gal->gallery) }}" width = "20%">
                        <button type = "submit" class = "btn btn-danger">Delete</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {

        $(".btn-success").click(function(){ 
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click",".btn-danger",function(){ 
            $(this).parents(".control-group").remove();
        });

    });

</script>
@endsection