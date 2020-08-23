<?php

$this->get("/home", function(){
    echo 'Estou na home';
});

$this->get("/about/test", function(){
    echo 'teste about';
});

