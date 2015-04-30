<?php 
//error_reporting(0);
include_once('../twitteroauth/twitteroauth.php');

$twitter_customer_key           = 'N4kQqrh1wdNw2SDk1MBvBAYvI';
$twitter_customer_secret        = 'dDuGxI13R2ZuNiRusxJtyVjwGs7afUX3iBLnSUqfEy1M8G3JIT';
$twitter_access_token           = '40843511-7DmtG0KMrKffzKdMqCpJMmBYZlt6IPUpExbFRn5C6';
$twitter_access_token_secret    = 'MI0VmprApaB3idbxmwx8L9VUOFltW4d8pVJyPQmgqHRuY';

$connection = new TwitterOAuth($twitter_customer_key, $twitter_customer_secret, $twitter_access_token, $twitter_access_token_secret);

$my_tweets = $connection->get('statuses/user_timeline', array('screen_name' => 'kakitigaasli', 'count' => 15));
//print_r($my_tweets[2]->entities->media[0]->media_url)

echo json_encode($my_tweets);
?>