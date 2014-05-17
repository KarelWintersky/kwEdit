<?php

class __Theme {
    public $template_path = '';

    public function __construct($path)
    {
        $this->template_path = $path;
    }

    public function getMenu()
    {
        $menu = new kwt($this->template_path."/_internal/menu.html");
        $content = $menu->get();
        return $content;
    }

}

?>