<?php

namespace App\Http\Controllers;

use App\comment;
use App\post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = comment::all();

        return view('comments.index')->withComments($comments);
    }
}
