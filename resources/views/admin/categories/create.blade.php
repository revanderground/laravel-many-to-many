@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">

            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                @method('POST')

                @include ('admin.categories.includes.form')

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
