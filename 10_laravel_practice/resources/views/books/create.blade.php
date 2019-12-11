@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul>
                    <h2>New book: </h2>
                    <form method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="text" name="isbn">
                        <br>
                        <input type="text" name="title">
                        <br>
                        <input type="text" name="description">
                        <br>

                        <button type="submit" name="submitbutton">Create</button>
                        <ul>
                        @if(isset($_POST['submitbutton']))

                            @if(!isset($_POST['isbn']))
                                    <li>The isbn field is required.</li>
                            @endif

                            @if(!isset($_POST['title']))
                                    <li>The title field is required.</li>
                            @endif

                            @if(!isset($_POST['description']))
                                    <li>The description field is required.</li>
                            @endif
                            @endif

                                </ul>

                    </form>

                </ul>
            </div>
        </div>
    </div>
@endsection
