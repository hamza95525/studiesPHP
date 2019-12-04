<?php


namespace Controller;


class CommentsController extends  AboutController
{
    public function index(){
        return "comments.index";
    }

    public function index1(){
        return "comments.create";
    }
}