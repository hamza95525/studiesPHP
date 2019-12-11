@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Books: </h2>
                <a href="/books/create">Create new...</a>
                <ul>
                    @foreach($books as $book)
                        <li><strong>{{$book->title}}</strong></li>
                        <a href={{"/books/" . $book->id }}>details</a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
