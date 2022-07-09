<?php

class Utility
{

    static public function isBase64($base)
    {
       return base64_encode(base64_decode($base, true)) === $base;
    }

    static public function isValid($input)
    {
        return (isset($input) && !empty($input));
    }

    static public function UniqueId()
    {
        $tags = uniqid();
        $string = array('data','xr','xl','xg','gpath');
        $data = array_rand($string,4);

        return $string[$data[1]]."-" . $tags . "=\"" . uniqid() . '_' . md5(mt_rand()) ."\"";
    }


}