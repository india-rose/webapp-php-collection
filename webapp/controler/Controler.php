<?php

if(isset($_POST['con']))
{
    if(!empty($_POST['login']) && !empty($_POST['pass']))
    {
        echo 'c bien !!';
    }
    else
    {
        header('Location: ../index.html');
    }
}
if(isset($_POST['ins']))
{
    echo 'tu cliq sur button inscrire !!';
}
?>