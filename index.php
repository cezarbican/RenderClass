<?php

include_once "./Render.php";

$render = new Render();

echo $render->view("home", "Home");