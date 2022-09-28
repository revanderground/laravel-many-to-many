@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success">
                    <p>
                        {{ session('success') }}
                    </p>
                </div>
            @endif
            @if (session('deleted'))
            <div class="alert alert-success">
                <p>
                    {{ session('deleted') }}
                </p>
            </div>
            @endif
            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Author</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">
                        <a href="{{ route('admin.posts.create')}}"
                            class="btn btn-sm btn-outline-primary">
                        Create new post</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)

                        <tr>
                            <td scope="row">
                                {{ $post->id }}
                            </td>

                            <td>
                                {{ $post->user->name }}
                            </td>

                            <td>
                                {{ $post->title }}
                            </td>

                            <td>

                                <span class="badge badge-pill badge-info"
                                    @if (isset($post->category))
                                        style="color:white; background-color:{{ $post->category->color }}">
                                        <a style="color:white; text-decoration:none" href="{{ route('admin.categories.show', $post->category->id) }}">{{ $post->category->name }}</a>
                                    @else
                                        style="background-color: lightgrey">
                                        -
                                    @endif

                                </span>
                            </td>



                            <td>
                                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-sm btn-primary">
                                    View
                                </a>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                                <form class="d-inline" action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>

                    @empty

                    @endforelse


                </tbody>
              </table>
              <div>
                {{ $posts->links() }}
              </div>

        </div>

    </div>

</div>

@endsection
