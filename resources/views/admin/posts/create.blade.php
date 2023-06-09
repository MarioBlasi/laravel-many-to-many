@extends('layouts.admin')

@section('content')

<h1 class="display-2 py-3">Create a new Post</h1>

@include('partials.validation_errors')

<form action="{{ route('admin.posts.store') }}" method="post">
    @csrf

    <div class="mb-3">
    <label for="title" class="form-label"><strong>Title</strong> </label>
    <input type="text"
        class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="titlehelpId" placeholder="Learn php">
    <small id="titlehelpId" class="form-text text-muted">Type the post title max 150 characters - must be unique</small>
    </div>
    {{-- title --}}

    <div class="mb-3">
        <label for="category_id" class="form-label">Categories</label>
        <select class="form-select @error('category_id') is-invalid @enderror"
            name="category_id" id="category_id">
            <option value="">Select a category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" 
            {{$category->id == old('category_id','') ? 'selected' : '' }}>
            {{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="cover_image" class="form-label"><strong>Image</strong> </label>
        <input type="text"
        class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" id="cover_image" aria-describedby="cover_imagehelpId" placeholder="Learn php">
        <small id="cover_imagehelpId" class="form-text text-muted">Type the post cover_image max 150 characters - must be unique</small>
    </div>
    {{-- cover_image --}}
   <div class="mb-3">
     <label for="content" class="form-label"><strong>Content</strong> </label>
     <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3"></textarea>
   </div>

   <button type="submit" class="btn btn-primary">Save</button>
@endsection


