@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="mx-auto">

            <div class="card my-card ">
                <div class="card-body">

                    <div class="card-title text-center">
                        <h4 class="py-2">
                            Tag:
                        </h4>
                        <h2>
                            #{{ $tag->name }}
                        </h2>
                    </div>
                </div>
            </div>
                <div>
                        @forelse ( $tag->posts as $post)
                            <div class="col-8 mx-auto  my-3">
                                @include('admin.posts.includes.post', ['post' => $post]);
                            </div>


                        {{-- <div class="card my-card  col-6 mx-auto my-5">
                            <div class="card-body">

                                <div class="card-title text-center">
                                    <h2>{{ $post->title }}</h2>
                                </div>

                                <div class="card-image text-center my-3">
                                    <img class = "w-50" src="{{ $post->post_image }}" alt="post-image">
                                </div>

                                <div>
                                    Tags:
                                        <span class="badge badge-pill">
                                        @if (isset($post->tags))
                                            @foreach ($post->tags as $tag)
                                            #{{ $tag->name }} -
                                            @endforeach
                                        @else
                                           No tag selected for this post
                                        @endif

                                    </span>
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
                                </div>

                             </div>
                        </div> --}}
                        @empty
                            <li>This tag has no posts</li>
                        @endforelse

                </div>



            </div>
        </div>

    </div>

</div>

@endsection
