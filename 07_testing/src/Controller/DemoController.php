<?php

namespace Controller;

use Widget\Link;
use Widget\Button;

class DemoController extends Controller
{
    public function index()
    {
        return "demo.index";
    }

    private function demo(string $type) : array {

        $storage = $this->storage($type);

        $widgets = [
            new Link(1), new Link(2), new Link(3),
            new Button(1), new Button(2), new Button(3)
        ];

        foreach ($widgets as $widget)
            $storage->store($widget);

        $widgets = $storage->loadAll();

        $links = $storage->load("widget_link_*");
        $buttons = $storage->load("widget_button_*");

        $storage->remove("widget_link_3");
        $storage->remove("widget_button_3");

        $after = $storage->loadAll();

        return [
            "widgets" => $widgets,
            "links" => $links,
            "buttons" => $buttons,
            "after" => $after
        ];
    }

    public function mysql()
    {
        return ["demo.show", $this->demo("mysql")];
    }

    public function sqlite()
    {
        return ["demo.show", $this->demo("sqlite")];
    }

    public function file()
    {
        return ["demo.show", $this->demo("file")];
    }

    public function session()
    {
        return ["demo.show", $this->demo("session")];
    }

    public function redis()
    {
        return ["demo.show", $this->demo("redis")];
    }
}