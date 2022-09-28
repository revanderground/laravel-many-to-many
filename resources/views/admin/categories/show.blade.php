@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="mx-auto">

            <div class="card my-card ">
                <div class="card-body">

                    <div class="card-title text-center">
                        <h4 class="py-2">
                            Category:
                        </h4>
                        <h2 class="border-2 rounded-3" style="background-color: {{ $category->color }}">
                            {{ $category->name }}
                        </h2>
                    </div>
                </div>
            </div>
                <div>
                        @forelse ( $category->posts as $post)

                        <div class="card col-8 my-card mx-auto my-5 py-3">
                            @include('admin.posts.includes.post', ['post' => $post]);
                            <div class="card-subtitle text-center">
                                <form class="d-inline" action="{{ route('admin.posts.clearCategory', $post->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning">
                                        Remove post from this category
                                    </button>
                                </form>
                            </div>

                        </div>
                            {{-- <div class="card-body">

                                <div class="card-title text-center">
                                    <h2>{{ $post->title }}</h2>
                                </div>

                                <div class="card-image text-center my-3">
                                    <img class = "w-50" src="{{ $post->post_image }}" alt="post-image">
                                </div>

                                <div>
                                    Category:
                                        <span class="badge badge-pill badge-info"
                                        @if (isset($post->category))
                                            style="color:white; background-color:{{ $post->category->color }}">
                                            {{ $post->category->name }}
                                        @else
                                            style="background-color: lightgrey">
                                            -
                                        @endif

                                    </span>
                                </div>

                                <div class="card-subtitle fs-6 my-3">
                                    Post with id: {{ $post->id }} | Post written on the: {{ $post->post_date }}
                                    by {{ $post->user->name }}

                                </div>

                                <div>
                                    {{ $post->user->name }} has the roles of:
                                    @forelse ( $post->user->roles as $role)
                                        {{ $role->name }}

                                    @empty
                                        No roles.
                                    @endforelse
                                </div>

                                <div class="card-text my-3">
                                    {{ $post->post_content }}
                                </div> --}}



                             </div>
                        </div>
                        @empty
                            <li>This category has no posts</li>
                        @endforelse

                </div>



            </div>
        </div>

    </div>

</div>

@endsection
