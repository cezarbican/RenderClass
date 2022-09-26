<?php

class Render{

    public function renderView($view, $params = null){
        if($params !== null){
            foreach($params as $key => $value){
                $$key = $value;
            }
        }
        include_once "./views/$view.html";
    }

    public function renderLayout($layout = null){
        if($layout){
            include_once "./layouts/$layout.html";
        }else{
            include_once "./layouts/main.html";
        }
    }

    public function view($view, $title, $params = null, $layout =  null)
    {
        ob_start();
        $this->renderLayout($layout);
        $layoutBuffer = ob_get_clean();
        $layoutBuffer = str_replace("{{TITLE}}", $title, $layoutBuffer);

        ob_start();
        $this->renderView($view, $params);
        $viewBuffer = ob_get_clean();
        return str_replace("{{CONTENT}}", $viewBuffer, $layoutBuffer);
    }
}