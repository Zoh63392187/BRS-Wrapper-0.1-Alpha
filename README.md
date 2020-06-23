# PHP_BRS_wrapper_0.1-Alpha
PHP class for usage of BRS 2.5.1 (https://github.com/burst-apps-team/burstcoin)

Requires PHP and CURL

For usage and understanding see documentation at https://burstwiki.org/en/the-burst-api/ and https://burstwiki.org/en/the-burst-api-examples/

# Author
Zoh https://twitter.com/Zoh63392187

# Code sample

$BRS = new BRS();

// URL must be an online BRS instance. The one below can be change at will but is free to use and hosted by explorer.burstcoin.network
$BRS->set_api_url('http://77.66.65.240:8125/');

// Setting account
$BRS->set_account('BURST-9LSF-V4WN-34E8-4WCMR');

// Fetching account trades
$result =  $BRS->getTrades();

// Print the result
echo'<pre>';
print_r($result);
echo'</pre>';
