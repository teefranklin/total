<?php
date_default_timezone_set("Africa/Harare");

$connect = new PDO("mysql:host=localhost;dbname=total;charset-utf8mb4;", "root", "");

$company_picture = array(
    'old_mutual_logo.png',
    'econet_logo.png',
    'fbc_holdings_logo.jpg',
    'hippo_valley.png',
    'nedbank_logo.png',
    'COSEKE-Logo.png',
    'rainbow-tourism-group-logo.png',
    'total.jpg'
);
$companies = array(
    'Old Mutual',
    'Econet',
    'FBC Holdings',
    'Hippo Valley',
    'Nedbank',
    'Coseke Zimbabwe',
    'Rainbow Tourism Group',
    'Total Zimbabwe'
);


