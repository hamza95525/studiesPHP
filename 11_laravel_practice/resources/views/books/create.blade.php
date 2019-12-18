@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>New book:</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('books.store') }}">
                    {{ csrf_field() }}
                    ISBN: <input type="text" name="isbn" value="{{ old("isbn") }}">
                    <br>
                    Title: <input type="text" name="title" value="{{ old("title") }}">
                    <br>
                    Description: <input type="text" name="description" value="{{ old("description") }}">
                    <br>
                    <input type="submit" value="Create">
                </form>
            </div>
        </div>
    </div>
@endsection