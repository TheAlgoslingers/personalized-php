<?php
require "vendor/autoload.php";

use thealgoslingers\PersonalizedContent

// Usage example
$api_key = 'your_api_key_here';
$pc = new PersonalizedContent($api_key);
$user_ip = '8.8.8.8';
echo $pc->getContent($user_ip);
