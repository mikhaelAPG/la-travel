@extends('layouts.appAdmin')
@section('content')

<br class="mt-5">
<br class="mt-5">

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@elseif(session('failed'))
    <div class="alert alert-danger">
        {{session('failed')}}
    </div>
@endif

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


<div class="container d-flex  justify-content-center h-100 mb-5">
    <div class="row ">
        <div class="col-md-30">

            <h1 class = "mt-3">Form Upload File</h1>
            <form action = "/admin/createData" method = "post" enctype="multipart/form-data" class="border border-light pad">
                @csrf
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select 
                        class="form-control @error('type') is-invalid @enderror" 
                        id="type" 
                        name="type">

                        <option value = 'Destination'>Destination</option>
                        <option value = 'Hotel'>Hotel</option>
                        <option value = 'Culinary'>Culinary</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        id="title" 
                        placeholder="Input the name of your trademark" 
                        name="title"
                        value="{{old('title')}}">
                    @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input 
                        type="text" 
                        class="form-control @error('location') is-invalid @enderror" 
                        id="location" 
                        placeholder="Input the location" 
                        name="location"
                        value="{{old('location')}}">
                    @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="main_pic">Main Picture:</label>
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
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input 
                        type="text" 
                        class="form-control @error('phone') is-invalid @enderror" 
                        id="phone" 
                        placeholder="Add your Business Phone (required)" 
                        name="phone"
                        value="{{old('phone')}}">
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
                        value="{{old('facebook')}}">

                </div>
                <div class="form-group">
                    <label for="google">Google:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="google" 
                        placeholder="Add your Google Account (optional)" 
                        name="google"
                        value="{{old('google')}}">
                </div>
                <div class="form-group">
                    <label for="linked-in">Linked-In:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="linkedin" 
                        placeholder="Add your Linked-In Account (optional)" 
                        name="linkedin"
                        value="{{old('linkedin')}}">

                </div>
                <div class="form-group">
                    <label for="twitter">Twitter: </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="twitter" 
                        placeholder="Add your Twitter Account (optional)" 
                        name="twitter"
                        value="{{old('twitter')}}">
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram: </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="instagram" 
                        placeholder="Add your Instagram Account (optional)" 
                        name="instagram"
                        value="{{old('instagram')}}">
                </div>
                <div class="form-group">
                    <label for="pinterest">Pinterest: </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="pinterest" 
                        placeholder="Add your Pinterest Account (optional)" 
                        name="pinterest"
                        value="{{old('pinterest')}}">
                </div>
                <label for="galleries">Galleries Image: </label>
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
                <button type="submit" class="btn btn-primary">Upload Data</button>
            </form>
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