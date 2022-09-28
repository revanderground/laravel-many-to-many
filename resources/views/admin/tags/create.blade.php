@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">

            <form action="{{ route('admin.tags.store') }}" method="post">
                @csrf
                @method('POST')

                @include ('admin.tags.includes.form')


            </form>

        </div>
    </div>
</div>
@endsection
