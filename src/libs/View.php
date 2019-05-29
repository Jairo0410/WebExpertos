<?php

    function view($nameView, $vars=array()){
        $path=routeView.$nameView;
        if(is_file($path)==FALSE){
            trigger_error('Pagina '.$path.' No existe', E_USER_NOTICE);
            return FALSE;
        } // if
        
        if(is_array($vars)){
            foreach ($vars as $key=>$value){
                $key=$value;
            } // for
        } // if
        include $path;
    }

?>