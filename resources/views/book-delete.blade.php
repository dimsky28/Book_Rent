@extends('layouts.mainlayout')

@section('title', 'Delete Book')
    
@section('content')
    <h2>Are You Sure to Delete Book {{$book->title}} ?</h2>
    <div class="mt-5">
        <a href="/book-destroy/{{$book->slug}}" class="btn btn-danger me-5">Sure</a>
        <a href="/books" class="btn btn-info">Cancel</a>
    </div>
@endsection