<?php

// ERROR 151
// ERROR POR FALLA DE SEGURIDAD
function error151(){
    $host = $_SERVER['HTTP_HOST'];
    header('Location: http://'.$host.'/IS2/login/index.php?result=3ad735ebae3ff8aae1b3dcafa8c8bbff3e877fab8fd9cf7f3c933240f0544a0b');
    exit;
}

// ERROR 101
// ERROR POR FALTA DE SESSIÓN INICIADA
function error101(){
    $host = $_SERVER['HTTP_HOST'];
    header('Location: http://'.$host.'/IS2/login/index.php?result=0');
    exit;
}

// ERROR 421
// ERROR POR NO PODER AÑADIR PRODUCTO
function error421(){
    $host = $_SERVER['HTTP_HOST'];
    header('Location: http://'.$host.'/IS2/login/usuario/index.php');
    if(!empty(session_id())){
        $_SESSION["__usrerr__"] = "421";
    }else{
        error101();
    }
    exit;
}
// ERROR 421
// ERROR POR DE IMAGEN
function error521(){
    $host = $_SERVER['HTTP_HOST'];
    header('Location: http://'.$host.'/IS2/login/usuario/index.php');
    if(!empty(session_id())){
        $_SESSION["__usrerr__"] = "521";
    }else{
        error101();
    }
    exit;
}
// ERROR 421
// ERROR AL AÑADIR
function error621(){
    $host = $_SERVER['HTTP_HOST'];
    header('Location: http://'.$host.'/IS2/login/usuario/index.php');
    if(!empty(session_id())){
        $_SESSION["__usrerr__"] = "621";
    }else{
        error101();
    }
    exit;
}
// ERROR 212
// ERROR AL AÑADIR
function error212(){
    $host = $_SERVER['HTTP_HOST'];
    header('Location: http://'.$host.'/IS2/login/usuario/index.php');
    if(!empty(session_id())){
        $_SESSION["__usrerr__"] = "212";
    }else{
        error101();
    }
    exit;
}
// ERROR 421
// ERROR AL AÑADIR
function success(){
    $host = $_SERVER['HTTP_HOST'];
    header('Location: http://'.$host.'/IS2/login/usuario/index.php');
    if(!empty(session_id())){
        $_SESSION["__sucess__"] = "true";
    }else{
        error421();
    }
    exit;
}
// Sucesso Cambiado
function usrsuccess(){
    $host = $_SERVER['HTTP_HOST'];
    header('Location: http://'.$host.'/IS2/login/usuario/index.php');
    if(!empty(session_id())){
        $_SESSION["__usrsucess__"] = "true";
    }else{
        error212();
    }
    exit;
}


?>