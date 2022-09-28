@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="form-group py-3 d-inline" >
                <form action="{{ route('admin.tags.update', $tag->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    @include ('admin.tags.includes.form')

                </form>

            </div>


        </div>
    </div>
</div>
@endsection
