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
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Color</th>
                    <th scope="col">
                        <a href="{{ route('admin.categories.create')}}"
                            class="btn btn-sm btn-outline-primary">
                        Create new category</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)

                        <tr>
                            <td scope="row">
                                {{ $category->id }}
                            </td>

                            <td>
                                {{ $category->name }}
                            </td>

                            <td>
                                {{ $category->slug }}
                            </td>

                            <td>

                                <span class="badge badge-pill badge-info"
                                style="color:white; background-color:{{ $category->color }}">
                                    <a href="{{ route('admin.categories.show', $category->id) }}" style="text-decoration:none; color:white">
                                        {{ $category->name }}</a>
                                </span>
                            </td>



                            <td>
                                <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-sm btn-primary">
                                    View
                                </a>
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                                <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
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

        </div>

    </div>

</div>

@endsection
