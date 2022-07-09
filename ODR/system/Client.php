<?php

class Client
{
    static public function IP() {
        $ipaddress = '';

        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    static public function Browser()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    static public function Dnsbl()
    {
        $ip = self::IP();

        $dnsbl_lookup = [
            "dnsbl-1.uceprotect.net",
            "dnsbl-2.uceprotect.net",
            "dnsbl-3.uceprotect.net",
            "dnsbl.dronebl.org",
            "dnsbl.sorbs.net",
            "zen.spamhaus.org",
            "bl.spamcop.net",
            "list.dsbl.org",
            "sbl.spamhaus.org",
            "xbl.spamhaus.org"
        ];

        $listed = "";

        if ($ip) {
            $reverse_ip = implode(".", array_reverse(explode(".", $ip)));
            foreach ($dnsbl_lookup as $host) {
                if (checkdnsrr($reverse_ip . "." . $host . ".", "A")) {
                    $listed .= $reverse_ip . '.' . $host . ' <font color="red">Listed</font><br />';
                }
            }
        }

        if (!empty($listed)) {
            die(header("Location: https://alipapa.aliexpress.com/store/group/grip-parts/2340388_514646442.html?spm=a2g0o.store_home.smartGrouping_855827907.514646442"));

        }
    }
}