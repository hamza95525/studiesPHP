@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul>
                    @foreach ($comments as $comment)
                        <li>
                            <a href="/comments/{{ $comment->id }}">{{ $comment->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
