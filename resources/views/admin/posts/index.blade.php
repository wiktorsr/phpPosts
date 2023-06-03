@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Posty</div>

                <div class="card-body">
                    <a href="{{ route('admin_posts_create') }}">
                    <button class="btn btn-success float-end">Dodaj post</button>
                    </a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Miniaturka</th>
                                <th>Tytuł</th>
                                <th>Akcja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->created_at->format('d.m.Y') }}</td>
                                    <td><img style="max-height: 100px;" src="../uploads/{{ $post->thumbnail }}" class="img-fluid"/></td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a href="{{ route('admin_posts_edit', $post) }}">
                                            <button class="btn btn-warning">Edytuj</button>
                                        </a>

                                        <a href="{{ route('admin_posts_delete', $post) }}">
                                            <button class="btn btn-danger">Usuń</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection