@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $book->title }} ({{ $book->isbn }})</h2>

                <p>
                    @markdown( $book->description )
                </p>

                <a href="{{ route('books.edit', $book) }}">edit</a>

                <form method="post" action="{{ route('books.destroy', $book) }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" value="Delete">
                </form>
            </div>
        </div>
    </div>
@endsection
