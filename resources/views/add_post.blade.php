@extends('layout')

@section('title', 'Add Post')

@section('content')
<form
style="width:400px; margin:0 auto;"
method="POST"
action="handle-add-post">
<a class="btn btn-dark" href="/dashboard">Go Back</a>
<h1>Add Post</h1>
        @csrf()
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Content</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('content')}}" name="title">
          @error('content') <span style="color:red;">{{$message}}</span>@enderror
        </div>
  
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      @endsection