# PHP_BRS_wrapper_0.1-Alpha
PHP class for usage of BRS 2.5.1 (https://github.com/burst-apps-team/burstcoin)

Requires PHP and CURL enabled on the webserver
For usage and understanding see documentation at https://burstwiki.org/en/the-burst-api/ and https://burstwiki.org/en/the-burst-api-examples/

# Installation
For external usage set $BRS->set_api_url('URL'); where URL could be like http://77.66.65.240:8125/ (Public BRS installation)

For internal usage go to the BRS 2.5.1 Download the source here: https://github.com/burst-apps-team/burstcoin
To install follow the guide here: https://burstwiki.org/en/brs-linux-installation/#installing-brs

Once installed set $BRS->set_api_url('localhost:8125'); in your script
Make sure tcp/8123 is open in your firewall for peer trafic or else you will net get peers as you should

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
print_r($result);