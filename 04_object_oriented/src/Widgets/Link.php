<?php


namespace Widgets;


class Link extends Widget
{
    public function draw(){
        $napis = $this -> key();
        echo "<br>";
        echo "<a href='#'>$napis</a>";
    }
}