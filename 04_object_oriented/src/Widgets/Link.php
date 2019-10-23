<?php


namespace Widget;


class Link extends \Widget\Widget
{
    public function draw(){
        echo "<a href='/public/index.php'>Link</a>";
    }
}