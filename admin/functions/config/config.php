<?php

function carregarIncludes($includes = null, $modo = null) {

    if ($modo != null):
        if ($modo == "login"):
            define("PATH_INCLUDE", "functions/");
        elseif($modo == "admin"):
            define("PATH_INCLUDE", "../functions/");
        endif;
    else:
        throw new Exception("O parametro modo não pode ser NULO");
    endif;
    set_include_path(PATH_INCLUDE . "connects/" . PATH_SEPARATOR . PATH_INCLUDE . "login/". PATH_SEPARATOR . PATH_INCLUDE ."url/");


    if (!is_null($includes)):
        if (is_array($includes)):
            foreach ($includes as $inc):
                include $inc . ".php";
            endforeach;
        else:
            throw new Exception("O parametro passado não é ARRAY");
        endif;
    else :
        throw new Exception("Nenhum parametro foi passado à função");

    endif;
}
