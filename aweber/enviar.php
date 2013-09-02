<?php
// Complete example on how to add a subscriber to your List.

// Refer to our getting started guide for a complete API walkthrough
// https://labs.aweber.com/getting_started/main

require_once('aweber_api/aweber_api.php');

$consumerKey    = 'Ak60drt9V421EyRjOH0sOkZk'; # put your credentials here
$consumerSecret = 'IY3h7QS9zVOASuADd6mLUZLd8KMda4dEiYbmimpI'; # put your credentials here
$accessKey      = 'AgNXNHYqEY8UAJEsAa2zxJiS'; # put your credentials here
$accessSecret   = 'QwcnlRV3ig294vZKHpzlBRN5rrbess36oTHf8T5j'; # put your credentials here
$account_id     = '672552'; # put the Account ID here
$list_id        = '2519265'; # put the List ID here

$aweber = new AWeberAPI($consumerKey, $consumerSecret);

try {
    $account = $aweber->getAccount($accessKey, $accessSecret);
    $listURL = "/accounts/{$account_id}/lists/{$list_id}";
    $list = $account->loadFromUrl($listURL);

    # create a subscriber
    $params = array(
        'email' => 'vanessaandrade@hotmail.com',
        'ip_address' => '168.172.1.0',
        'ad_tracking' => 'client_lib_example',
        'last_followup_message_number_sent' => 1,
        'misc_notes' => 'my cool app',
        'name' => 'Vanessa andrade',
        
    );
    $subscribers = $list->subscribers;
    $new_subscriber = $subscribers->create($params);

    # success!
    print "$new_subscriber->email was added to the $list->name list!";

} catch(AWeberAPIException $exc) {
    print "<h3>AWeberAPIException:</h3>";
    print " <li> Type: $exc->type              <br>";
    print " <li> Msg : $exc->message           <br>";
    print " <li> Docs: $exc->documentation_url <br>";
    print "<hr>";
    exit(1);
}