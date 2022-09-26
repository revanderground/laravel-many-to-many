@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="form-group py-3 d-inline" >
                <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    @include ('admin.categories.includes.form')

                    <div class="form-group p-3 text-center">
                        <button type="submit" class="btn btn-sm btn-primary">
                            Edit post
                        </button>
                    </div>

                </form>

            </div>


        </div>
    </div>
</div>
@endsection
