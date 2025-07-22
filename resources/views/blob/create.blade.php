@extends('layouts.Master')

@section('page_title', 'Upload new file')

@section('content')

    <form action="{{ route('blob.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button class="primary" type="submit">Upload</button>
    </form>

@endsection