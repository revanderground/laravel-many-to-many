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
                    <th scope="col">
                        <a href="{{ route('admin.tags.create')}}"
                            class="btn btn-sm btn-outline-primary">
                        Create new Tag</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)

                        <tr>
                            <td scope="row">
                                {{ $tag->id }}
                            </td>

                            <td>
                                #{{ $tag->name }}
                            </td>

                            <td>
                                <a href="{{ route('admin.tags.show', $tag->id) }}" class="btn btn-sm btn-primary">
                                    View
                                </a>
                                <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                                <form class="d-inline" action="{{ route('admin.tags.destroy', $tag->id) }}" method="post">
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
