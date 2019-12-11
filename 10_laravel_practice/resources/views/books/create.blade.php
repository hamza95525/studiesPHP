@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <h2>New book: </h2>
                    <form action={{ route("books.store") }}  method="post">

                        {{csrf_field()}}
                        <input type="text" name="isbn" value={{ old('isbn') }}>
                        <br>
                        <input type="text" name="title" value={{old('title')}}>
                        <br>
                        <input type="text" name="description" value={{old('description')}}>
                        <br>

                        <button type="submit" name="submitbutton">Create</button>

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
