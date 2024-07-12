# personalized-php
The PersonalizedContent class provides functionalities for fetching personalized content based on the user's IP address.

The class can be served as the foundamental for incorporating algorithms to determine the most accurate location and subsequently tailor the content displayed to the user's unique geographic context to create a more engaging and personalized user experience, potentially leading to increased user engagement, higher conversion rates, and strengthened customer satisfaction.
It may also employ various techniques, including accessing geo-location databases, utilizing IP address lookup services.

<h1>Requirements</h1>
Please obtain Api Key from <a href="https://www.ip2location.io/">IP2LOCATION.IO</a>

<h1>Installation</h1>
<code>composer require thealgoslingers/personalized-php</code>

<h1>Usage</h1>

```
<?php
require "path/to/vendor/autoload.php";

use thealgoslingers/PersonalizedContent;

$api_key = 'your_api_key_here';
$pc      = new PersonalizedContent($api_key);
$user_ip = '8.8.8.8';
echo $pc->getContent($user_ip);
```
