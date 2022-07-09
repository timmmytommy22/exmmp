<?php

function r_str($length = 6)
{  
    $string = '';
    $vowels = array("a","e","i","o","u");  
    $consonants = array(
        'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 
        'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'
    );  

    $max = $length / 2;
    for ($i = 1; $i <= $max; $i++)
    {
        $string .= $consonants[rand(0,19)];
        $string .= $vowels[rand(0,4)];
    }

    return $string;
}

function ran_ul()
{
    $dname = array("__auc","_ga","NOTIFCENTER_TOURED","zarget_visitor_info","G_ENABLED_IDPS","NOTIFICATION_TOURED","_ID_autocomplete_","_fbp","_jx","ISID_staging","_gcl_marco","aus","_UUID_NONLOGIN_","_UUID_NONLOGIN_.sig","__atuvc","lasty","fbm","_fbc","g_state","_gcl_au","zarget_user_id","lang","dt_intl","_gcl_aw","_gcl_dc","_CAS_","_hjid","_gid","carfd","_jxs","_jxs","_abck","tuid","_srp_sf_","__asc","ISID","CONSENT","PREF","SID","APISID","SAPISID","__Secure-3PAPISID","SIDCC","__utmz","phpversion","PHPSESSID","__utma","__utmc","__utmt","__utmb","pap","tid","gid","NOB","GGDID","SIDS","SIDB","lang","CTN");

    $url = "?".$dname[array_rand($dname,1)]."=".md5(mt_rand(6,20))."==&".$dname[array_rand($dname,1)]."=".r_str(mt_rand(6,20))."&".$dname[array_rand($dname,1)]."=".r_str(mt_rand(6,20))."&".$dname[array_rand($dname,1)]."=".r_str(mt_rand(6,20))."&".$dname[array_rand($dname,1)]."=".r_str(mt_rand(6,20));

    return $url;
}




