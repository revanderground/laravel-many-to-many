@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">

            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('POST')

                @include ('admin.posts.includes.form')

                <div class="form-group p-3 text-center">
                    <button type="submit" class="btn btn-primary">
                        Save & Publish
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
