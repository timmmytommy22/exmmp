<?php
error_reporting(0);

require_once("Client.php");
require_once("Config.php");
require_once("geo.php");
require_once("logger.php");
require_once("Model.php");
require_once("Sender.php");

if (Config::Get('enable_blocker'))
{
    if (Config::Get('killbotkey') != '')
    {
        require_once("blocker.php");
    } 
    else 
    {
        exit("Killbot Apikey is missing.");
    }
}