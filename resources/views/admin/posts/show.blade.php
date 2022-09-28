@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
             @include('admin.posts.includes.post')
        </div>
    </div>
</div>

@endsection
