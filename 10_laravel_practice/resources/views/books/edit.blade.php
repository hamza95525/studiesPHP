@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Edit book: </h2>
                <form action="/books/{{$book->id}}"  method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <input type="text" name="isbn" value={{ $book->isbn }}>
                    <br>
                    <input type="text" name="title" value={{$book->title}}>
                    <br>
                    <input type="text" name="description" value={{$book->description}}>
                    <br>

                    <button type="submit" name="updatebutton">Update</button>

                </form>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
