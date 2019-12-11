@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    {{ redirect()->route('books.create') }};
                @endif

                <h2>{{ $book->title . " (". $book->isbn . ")" }}</h2>

                <p>{{$book->description}}</p>
                    <a href={{'/books/' . $book->id . '/edit'}}>edit</a>
                    <br><br>

                    <form action="/books/{{$book->id}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <br>
                        <button type="submit" name="deleteButton">Delete</button>
                    </form>

            </div>
        </div>
    </div>
@endsection
