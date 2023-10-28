<?php

function encrypt($clave)
{
    $key = "jksdahsj";
    $result = "";
    for ($i = 0; $i < strlen($clave); $i++) {
        $char = substr($clave, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result .= $char;
    }
    return base64_encode($result);
}

function decrypt($clave)
{
    $key = "jksdahsj";
    $result = "";
    $clave = base64_decode($clave);
    for ($i = 0; $i < strlen($clave); $i++) {
        $char = substr($clave, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result .= $char;
    }
    return $result;
}
