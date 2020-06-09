<?php

function exibeAlerta(){
    echo $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
};