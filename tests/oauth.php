<?php

/* "THE BEER-WARE LICENSE" (Revision 42):
 * Jaap Broekhuizen <jaapz.b@gmail.com> wrote this file. As long as you retain 
 * this notice you can do whatever you want with this stuff. If we meet some 
 * day, and you think this stuff is worth it, you can buy me a beer in return.
 */

require_once '../src/Tumblr.php';

// Set up OAuth first. Another example on how to authenticate using the OAuth 
// way can be found here: 
// http://svn.php.net/viewvc/pecl/oauth/trunk/examples/twitter/fetchTimeline.php?annotate=280252
$oauth = new OAuth(
	'pYiJYdRAFJHgQl7ekaVirCiYg8IRiVOp5ONDZ2PziJFXmVEwhv', // consumer key
	'9JRVserz6M2lj2l679k73ktWQWvmLIFLFdMgHBBmB0DxFGV0lu', // consumer secret
	OAUTH_SIG_METHOD_HMACSHA1,
	OAUTH_AUTH_TYPE_URI
);

$oauth->enableDebug();

// Get token using the API.
$requestToken = $oauth->getRequestToken('http://www.tumblr.com/oauth/request_token');

echo 'Go to: http://www.tumblr.com/oauth/authorize?oauth_token='.$requestToken['oauth_token']."\n";
echo 'After visiting and authorizing, hit ENTER here.'."\n";

$in = fopen('php://stdin', 'r');
fgets($in, 255);

echo "Getting access token...\n";

$oauth->setToken($requestToken['oauth_token'], $requestToken['oauth_token_secret']);

$accesToken = $oauth->getAccessToken('http://www.tumblr.com/oauth/access_token');
$oauth->setToken($accessToken["oauth_token"],$accessToken["oauth_token_secret"]);

// Instantiate the Tumblr API wrapper with the OAuth object, and our API Key.
$tumblr = new Tumblr();
$tumblr->setOAuth($oauth);
$tumblr->setApiKey('pYiJYdRAFJHgQl7ekaVirCiYg8IRiVOp5ONDZ2PziJFXmVEwhv');

$dashboard = $tumblr->dashboard();

var_dump($dashboard);
