@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Books:</h2>

                <a href="{{ route('books.create') }}">Create new...</a>

                <ul>
                    @foreach($books as $book)
                    <li>
                        <strong>{{ $book->title }}</strong>
                        <a href="{{ route('books.show', $book) }}">details</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
