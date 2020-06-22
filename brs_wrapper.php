<?php 
header('Content-type: text/html; charset=utf-8');

/*
PHP wrapper version 0.1-Alpha
Creator Zoh https://twitter.com/Zoh63392187
For usage and understanding see documentation at https://burstwiki.org/en/the-burst-api/ and https://burstwiki.org/en/the-burst-api-examples/
*/

ini_set('default_socket_timeout', 1);

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

class BRS {
	// Properties
	public $url, $account, $asset, $order, $goods;

	// Methods
	function set_api_url($url) {
		$this->url = $url;
	}
	function set_account($account) {
		$this->account = $account;
	}
	function set_asset($asset) {
		$this->asset = $asset;
	}
	function set_order($order) {
		$this->order = $order;
	}
	function set_goods($goods) {
		$this->goods = $goods;
	}
	
	function get_api_result($para){
		$url = $this->url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url.$para);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 2);
		$result=curl_exec($ch);
		curl_close($ch);
		$json_feed = json_decode($result, true);
		
		return $json_feed;
	}
	
	function broadcastTransaction($transactionBytes='',$transactionJSON='') {
		return $this->get_api_result('burst?requestType=broadcastTransaction&transactionBytes='.$transactionBytes.'&transactionJSON='.$transactionJSON);
	}
	function buyAlias($alias='',$aliasName='',$amountNQT='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=buyAlias&alias='.$alias.'&aliasName='.$aliasName.'&amountNQT='.$amountNQT.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function calculateFullHash($unsignedTransactionBytes='',$signatureHash='') {
		return $this->get_api_result('burst?requestType=calculateFullHash&unsignedTransactionBytes='.$unsignedTransactionBytes.'&signatureHash='.$signatureHash);
	}
	function cancelAskOrder($secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		$order = $this->order;
		return $this->get_api_result('burst?requestType=cancelAskOrder&order='.$order.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function cancelBidOrder($secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		$order = $this->order;
		return $this->get_api_result('burst?requestType=cancelAskOrder&order='.$order.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function createATProgram($name='',$description='',$creationBytes='',$code='',$data='',$dpages='',$cspages='',$uspages='',$minActivationAmountNQT='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=createATProgram&name='.$name.'&description='.$description.'&creationBytes='.$creationBytes.'&code='.$code.'&data='.$data.'&dpages='.$dpages.'&cspages='.$cspages.'&uspages='.$uspages.'&minActivationAmountNQT='.$minActivationAmountNQT.'&purchase='.$purchase.'&refundNQT='.$refundNQT.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function decryptFrom($data='',$nonce='',$decryptedMessageIsText='',$secretPhrase='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=decryptFrom&account='.$account.'&data='.$data.'&nonce='.$nonce.'&decryptedMessageIsText='.$decryptedMessageIsText.'&secretPhrase='.$secretPhrase);		
	}
	function dgsDelisting($secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		$goods = $this->goods;
		return $this->get_api_result('burst?requestType=dgsDelisting&goods='.$goods.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function dgsDelivery($purchase='',$discountNQT='',$goodsToEncrypt='',$goodsIsText='',$goodsData='',$goodsNonce='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=dgsDelivery&purchase='.$purchase.'&discountNQT='.$discountNQT.'&goodsToEncrypt='.$goodsToEncrypt.'&goodsIsText='.$goodsIsText.'&goodsData='.$goodsData.'&goodsNonce='.$goodsNonce.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function dgsFeedback($purchase='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=dgsFeedback&purchase='.$purchase.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function dgsListing($name='',$description='',$tags='',$quantity='',$priceNQT='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=dgsListing&name='.$name.'&description='.$description.'&tags='.$tags.'&quantity='.$quantity.'&priceNQT='.$priceNQT.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function dgsPriceChange($priceNQT='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		$goods = $this->goods;
		return $this->get_api_result('burst?requestType=dgsPriceChange&goods='.$goods.'&priceNQT='.$priceNQT.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function dgsPurchase($priceNQT='',$quantity='',$deliveryDeadlineTimestamp='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		$goods = $this->goods;
		return $this->get_api_result('burst?requestType=dgsPurchase&goods='.$goods.'&priceNQT='.$priceNQT.'&quantity='.$quantity.'&deliveryDeadlineTimestamp='.$deliveryDeadlineTimestamp.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function dgsQuantityChange($deltaQuantity='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		$goods = $this->goods;
		return $this->get_api_result('burst?requestType=dgsQuantityChange&goods='.$goods.'&deltaQuantity='.$deltaQuantity.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function dgsRefund($purchase='',$refundNQT='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=dgsRefund&purchase='.$purchase.'&refundNQT='.$refundNQT.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function encryptTo($recipient,$messageToEncrypt,$messageToEncryptIsText,$secretPhrase) {
		return $this->get_api_result('burst?requestType=encryptTo&recipient='.$recipient.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&secretPhrase='.$secretPhrase);		
	}
	function escrowSign($escrow='',$decision='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=escrowSign&escrow='.$escrow.'&decision='.$decision.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function generateDeeplink($domain='',$action='',$payload='') {
		return $this->get_api_result('burst?requestType=generateDeeplink&domain='.$domain.'&action='.$action.'&payload='.$payload);
	}
	function generateDeeplinkQRCode($domain='',$action='',$payload='') {
		return array('QRLink' => $this->url.'burst?requestType=generateDeeplinkQRCode&domain='.$domain.'&action='.$action.'&payload='.$payload);
	}
	function generateSendTransactionQRCode($immutable='',$receiverId='') {
		return array('QRLink' => $this->url.'burst?requestType=generateSendTransactionQRCode&immutable='.$immutable.'&receiverId='.$receiverId.'&domain='.$domain.'&action='.$action.'&payload='.$payload);
	}
	function generateToken($website='',$secretPhrase='') {
		return $this->get_api_result('burst?requestType=generateToken&website='.$website.'&secretPhrase='.$secretPhrase);
	}
	function getAT($at='') {
		return $this->get_api_result('burst?requestType=getAT&at='.$at);
	}
	function getATDetails($at='') {
		return $this->get_api_result('burst?requestType=getATDetails&at='.$at);
	}
	function getATIds() {
		return $this->get_api_result('burst?requestType=getATIds');
	}
	function getATLong($hexString='') {
		return $this->get_api_result('burst?requestType=getATLong&hexString='.$hexString);
	}
	function getAccount() {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccount&account='.$account);
	}
	function getAccountATs() {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountATs&account='.$account);
	}
	function getAccountAssets($firstIndex='',$lastIndex='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountAssets&account='.$account.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAccountBlockIds($firstIndex='',$lastIndex='',$timestamp='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountBlockIds&account='.$account.'&timestamp='.$timestamp.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAccountBlocks($firstIndex='',$lastIndex='',$timestamp='',$includeTransactions='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountBlocks&account='.$account.'&timestamp='.$timestamp.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex.'&includeTransactions='.$includeTransactions);
	}
	function getAccountCurrentAskOrderIds($asset='',$firstIndex='',$lastIndex='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountCurrentAskOrderIds&account='.$account.'&asset='.$asset.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAccountCurrentAskOrders($asset='',$firstIndex='',$lastIndex='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountCurrentAskOrders&account='.$account.'&asset='.$asset.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAccountCurrentBidOrderIds($asset='',$firstIndex='',$lastIndex='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountCurrentBidOrderIds&account='.$account.'&asset='.$asset.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAccountCurrentBidOrders($asset='',$firstIndex='',$lastIndex='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountCurrentBidOrders&account='.$account.'&asset='.$asset.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAccountEscrowTransactions() {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountEscrowTransactions&account='.$account);
	}
	function getAccountId($secretPhrase='',$publicKey='') {
		return $this->get_api_result('burst?requestType=getAccountId&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey);
	}
	function getAccountLessors($secretPhrase='',$height='') {
		return $this->get_api_result('burst?requestType=getAccountLessors&secretPhrase='.$secretPhrase.'&height='.$height);
	}
	function getAccountPublicKey() {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountPublicKey&account='.$account);
	}
	function getAccountSubscriptions() {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountSubscriptions&account='.$account);
	}
	function getAccountTransactionIds($timestamp='',$type='',$subtype='',$firstIndex='',$lastIndex='',$numberOfConfirmations='',$includeIndirect='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountTransactionIds&account='.$account.'&timestamp='.$timestamp.'&type='.$type.'&subtype='.$subtype.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex.'&numberOfConfirmations='.$numberOfConfirmations.'&includeIndirect='.$includeIndirect);
	}
	function getAccountTransactions($timestamp='',$type='',$subtype='',$firstIndex='',$lastIndex='',$numberOfConfirmations='',$includeIndirect='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountTransactions&account='.$account.'&timestamp='.$timestamp.'&type='.$type.'&subtype='.$subtype.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex.'&numberOfConfirmations='.$numberOfConfirmations.'&includeIndirect='.$includeIndirect);
	}
	function getAccountsWithName($name='') {
		return $this->get_api_result('burst?requestType=getAccountsWithName&name='.$name);
	}
	function getAccountsWithRewardRecipient() {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAccountsWithRewardRecipient&account='.$account);
	}
	function getAlias($alias='',$aliasName='') {
		return $this->get_api_result('burst?requestType=getAlias&alias='.$alias.'&aliasName='.$aliasName);
	}
	function getAliases($timestamp='',$firstIndex='',$lastIndex='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getAliases&timestamp='.$timestamp.'&account='.$account.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAllAssets($firstIndex='',$lastIndex='') {
		return $this->get_api_result('burst?requestType=getAllAssets&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAllOpenAskOrders($firstIndex='',$lastIndex='') {
		return $this->get_api_result('burst?requestType=getAllOpenAskOrders&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAllOpenBidOrders($firstIndex='',$lastIndex='') {
		return $this->get_api_result('burst?requestType=getAllOpenBidOrders&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAllTrades($timestamp='',$firstIndex='',$lastIndex='',$includeAssetInfo='') {
		return $this->get_api_result('burst?requestType=getAllTrades&timestamp='.$timestamp.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex.'&includeAssetInfo='.$includeAssetInfo);
	}
	function getAskOrder() {
		$order = $this->order;
		return $this->get_api_result('burst?requestType=getAskOrder&order='.$order);
	}
	function getAskOrderIds($firstIndex='',$lastIndex='') {
		$asset = $this->asset;
		return $this->get_api_result('burst?requestType=getAskOrderIds&asset='.$asset.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAskOrders($firstIndex='',$lastIndex='') {
		$asset = $this->asset;
		return $this->get_api_result('burst?requestType=getAskOrders&asset='.$asset.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAsset() {
		$asset = $this->asset;
		return $this->get_api_result('burst?requestType=getAsset&asset='.$asset);
	}
	function getAssetAccounts($height='',$firstIndex='',$lastIndex='') {
		$asset = $this->asset;
		return $this->get_api_result('burst?requestType=getAssetAccounts&asset='.$asset.'&height='.$height.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAssetIds($firstIndex='',$lastIndex='') {
		return $this->get_api_result('burst?requestType=getAssetIds&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getAssetTransfers($firstIndex='',$lastIndex='',$includeAssetInfo='') {
		// Lookup either or both account / asset
		$account = $this->account;
		$asset = $this->asset;
		return $this->get_api_result('burst?requestType=getAssetTransfers&asset='.$asset.'&account='.$account.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex.'&includeAssetInfo='.$includeAssetInfo);
	}
	function getAssets($assets='') {
		// make sure to cast as string due to big numbers not supported by PHP also $assets must be in array format
		// $BRS->getAssets(array("11280075245570987091","8490493780886186097","5900702011242411888"))
		$str_assets = implode("&assets=",$assets);
		return $this->get_api_result('burst?requestType=getAssets&assets='.$str_assets);
	}
	function getAssetsByIssuer($accounts='',$firstIndex='',$lastIndex='') {
		// make sure to cast as string due to big numbers not supported by PHP also $assets must be in array format
		// $BRS->getAssets(array("11280075245570987091","8490493780886186097","5900702011242411888"))
		$str_accounts = implode("&account=",$accounts);
		return $this->get_api_result('burst?requestType=getAssetsByIssuer&account='.$str_accounts.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getBalance() {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getBalance&account='.$account);
	}
	function getBidOrder() {
		$order = $this->order;
		return $this->get_api_result('burst?requestType=getBidOrder&order='.$order);
	}
	function getBidOrderIds($firstIndex='',$lastIndex='') {
		$asset = $this->asset;
		return $this->get_api_result('burst?requestType=getBidOrderIds&asset='.$asset.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getBidOrders($firstIndex='',$lastIndex='') {
		$asset = $this->asset;
		return $this->get_api_result('burst?requestType=getBidOrders&asset='.$asset.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getBlock($block='',$height='',$timestamp='',$includeTransactions='') {
		return $this->get_api_result('burst?requestType=getBlock&block='.$block.'&height='.$height.'&timestamp='.$timestamp.'&includeTransactions='.$includeTransactions);
	}
	function getBlockId($height='') {
		return $this->get_api_result('burst?requestType=getBlockId&height='.$height);
	}
	function getBlockchainStatus() {
		return $this->get_api_result('burst?requestType=getBlockchainStatus');
	}
	function getBlocks($firstIndex='',$lastIndex='',$includeTransactions='') {
		return $this->get_api_result('burst?requestType=getBlocks&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex.'&includeTransactions='.$includeTransactions);		
	}
	function getConstants() {
		return $this->get_api_result('burst?requestType=getConstants');
	}
	function getDGSGood() {
		$goods = $this->goods;
		return $this->get_api_result('burst?requestType=getDGSGood&goods='.$goods);
	}
	function getDGSGoods($seller='',$firstIndex='',$lastIndex='',$inStockOnly='') {
		return $this->get_api_result('burst?requestType=getDGSGoods&seller='.$seller.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex.'&inStockOnly='.$inStockOnly);
	}
	function getDGSPendingPurchases($seller='',$firstIndex='',$lastIndex='') {
		return $this->get_api_result('burst?requestType=getDGSPendingPurchases&seller='.$seller.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex);
	}
	function getDGSPurchase($purchase='') {
		return $this->get_api_result('burst?requestType=getDGSPurchase&purchase='.$purchase);
	}
	function getDGSPurchases($seller='',$buyer='',$firstIndex='',$lastIndex='',$completed='') {
		return $this->get_api_result('burst?requestType=getDGSPurchases&seller='.$seller.'&buyer='.$buyer.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex.'&completed='.$completed);
	}
	function getECBlock($timestamp='') {
		return $this->get_api_result('burst?requestType=getECBlock&timestamp='.$timestamp);
	}
	function getEscrowTransaction($escrow='') {
		return $this->get_api_result('burst?requestType=getEscrowTransaction&escrow='.$escrow);
	}
	function getGuaranteedBalance($numberOfConfirmations='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getGuaranteedBalance&account='.$account.'numberOfConfirmations='.$numberOfConfirmations);
	}
	function getMiningInfo() {
		return $this->get_api_result('burst?requestType=getMiningInfo');
	}
	function getMyInfo() {
		return $this->get_api_result('burst?requestType=getMyInfo');
	}
	function getMyPeerInfo() {
		return $this->get_api_result('burst?requestType=getMyPeerInfo');
	}
	function getPeer($peer='') {
		return $this->get_api_result('burst?requestType=getPeer&peer='.$peer);
	}
	function getPeers($active='',$state='') {
		return $this->get_api_result('burst?requestType=getPeers&active='.$active.'&state='.$state);
	}
	function getRewardRecipient() {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getRewardRecipient&account='.$account);
	}
	function getState($includeCounts='') {
		return $this->get_api_result('burst?requestType=getState&includeCounts='.$includeCounts);
	}
	function getSubscription($includeCounts='') {
		return $this->get_api_result('burst?requestType=getSubscription&includeCounts='.$includeCounts);
	}
	function getSubscriptionsToAccount() {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getSubscriptionsToAccount&account='.$account);
	}
	function getTime() {
		return $this->get_api_result('burst?requestType=getTime');
	}
	function getTrades($firstIndex='',$lastIndex='',$includeAssetInfo='') {
		// Get trades from either or both account / asset
		$asset = $this->asset;
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getTrades&asset='.$asset.'&account='.$account.'&firstIndex='.$firstIndex.'&lastIndex='.$lastIndex.'&includeAssetInfo='.$includeAssetInfo);
	}
	function getTransaction($transaction='',$fullHash='') {
		return $this->get_api_result('burst?requestType=getTransaction&transaction='.$transaction.'&fullHash='.$fullHash);
	}
	function getTransactionBytes($transaction='') {
		return $this->get_api_result('burst?requestType=getTransactionBytes&transaction='.$transaction);
	}
	function getUnconfirmedTransactionIds($includeIndirect='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getUnconfirmedTransactionIds&account='.$account.'&includeIndirect='.$includeIndirect);
	}
	function getUnconfirmedTransactions($includeIndirect='') {
		$account = $this->account;
		return $this->get_api_result('burst?requestType=getUnconfirmedTransactions&account='.$account.'&includeIndirect='.$includeIndirect);
	}
	function issueAsset($name='',$description='',$quantityQNT='',$decimals='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=issueAsset&name='.$name.'&description='.$description.'&quantityQNT='.$quantityQNT.'&decimals='.$decimals.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function longConvert($id='') {
		return $this->get_api_result('burst?requestType=longConvert&id='.$id);
	}
	function parseTransaction($transactionBytes='',$transactionJSON='') {
		return $this->get_api_result('burst?requestType=parseTransaction&transactionBytes='.$transactionBytes.'&transactionJSON='.$transactionJSON);
	}
	function placeAskOrder($asset='',$quantityQNT='',$priceNQT='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=placeAskOrder&asset='.$asset.'&quantityQNT='.$quantityQNT.'&priceNQT='.$priceNQT.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function placeBidOrder($asset='',$quantityQNT='',$priceNQT='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=placeBidOrder&asset='.$asset.'&quantityQNT='.$quantityQNT.'&priceNQT='.$priceNQT.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function readMessage($transaction='',$secretPhrase='') {
		return $this->get_api_result('burst?requestType=readMessage&transaction='.$transaction.'&secretPhrase='.$secretPhrase);
	}
	function rsConvert($id='') {
		return $this->get_api_result('burst?requestType=rsConvert&id='.$id);
	}
	function sellAlias($alias='',$aliasName='',$recipient='',$priceNQT='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=sellAlias&alias='.$alias.'&aliasName='.$aliasName.'&recipient='.$recipient.'&priceNQT='.$priceNQT.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function sendMessage($recipient='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=sendMessage&recipient='.$recipient.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function sendMoney($recipient='',$amountNQT='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=sendMoney&recipient='.$recipient.'&amountNQT='.$amountNQT.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function sendMoneyEscrow($recipient='',$amountNQT='',$escrowDeadline='',$signers='',$requiredSigners='',$deadlineAction='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=sendMoneyEscrow&recipient='.$recipient.'&amountNQT='.$amountNQT.'&escrowDeadline='.$escrowDeadline.'&signers='.$signers.'&requiredSigners='.$requiredSigners.'&deadlineAction='.$deadlineAction.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function sendMoneyMulti($secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$recipients='') {
		$str_recipients = implode(";",$recipients);
		return $this->get_api_result('burst?requestType=sendMoneyMulti&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&recipients='.$recipients);
	}
	function sendMoneyMultiSame($secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$recipients='',$amountNQT='') {
		$str_recipients = implode(";",$recipients);
		return $this->get_api_result('burst?requestType=sendMoneyMultiSame&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&recipients='.$recipients.'&amountNQT='.$amountNQT);
	}
	function sendMoneySubscription($recipient='',$amountNQT='',$frequency='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=sendMoneySubscription&recipient='.$recipient.'&amountNQT='.$amountNQT.'&frequency='.$frequency.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function setAccountInfo($name='',$description='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=setAccountInfo&name='.$name.'&description='.$description.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function setAlias($aliasName='',$aliasURI='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=setAlias&aliasName='.$aliasName.'&aliasURI='.$aliasURI.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function setRewardRecipient($recipient='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=setRewardRecipient&recipient='.$recipient.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function signTransaction($unsignedTransactionBytes='',$unsignedTransactionJSON='',$secretPhrase='') {
		return $this->get_api_result('burst?requestType=signTransaction&unsignedTransactionBytes='.$unsignedTransactionBytes.'&unsignedTransactionJSON='.$unsignedTransactionJSON.'&secretPhrase='.$secretPhrase);
	}
	function submitNonce($secretPhrase='',$nonce='',$accountId='',$blockheight='') {
		return $this->get_api_result('burst?requestType=signTransaction&secretPhrase='.$secretPhrase.'&nonce='.$nonce.'&accountId='.$accountId.'&blockheight='.$blockheight);
	}
	function subscriptionCancel($subscription='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=subscriptionCancel&subscription='.$subscription.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
	function suggestFee() {
		return $this->get_api_result('burst?requestType=suggestFee');
	}
	function transferAsset($recipient='',$asset='',$quantityQNT='',$secretPhrase='',$publicKey='',$feeNQT='',$deadline='',$referencedTransactionFullHash='',$broadcast='',$message='',$messageIsText='',$messageToEncrypt='',$messageToEncryptIsText='',$encryptedMessageData='',$encryptedMessageNonce='',$messageToEncryptToSelf='',$messageToEncryptToSelfIsText='',$encryptToSelfMessageData='',$encryptToSelfMessageNonce='',$recipientPublicKey='') {
		return $this->get_api_result('burst?requestType=transferAsset&recipient='.$recipient.'&asset='.$asset.'&quantityQNT='.$quantityQNT.'&secretPhrase='.$secretPhrase.'&publicKey='.$publicKey.'&feeNQT='.$feeNQT.'&deadline='.$deadline.'&referencedTransactionFullHash='.$referencedTransactionFullHash.'&broadcast='.$broadcast.'&message='.$message.'&messageIsText='.$messageIsText.'&messageToEncrypt='.$messageToEncrypt.'&messageToEncryptIsText='.$messageToEncryptIsText.'&encryptedMessageData='.$encryptedMessageData.'&encryptedMessageNonce='.$encryptedMessageNonce.'&messageToEncryptToSelf='.$messageToEncryptToSelf.'&messageToEncryptToSelfIsText='.$messageToEncryptToSelfIsText.'&encryptToSelfMessageData='.$encryptToSelfMessageData.'&encryptToSelfMessageNonce='.$encryptToSelfMessageNonce.'&recipientPublicKey='.$recipientPublicKey);
	}
}	
$BRS = new BRS();
// URL must be an online BRS instance. The one below can be change at will but is free to use and hosted by explorer.burstcoin.network
$BRS->set_api_url('http://77.66.65.240:8125/');
// Just for testing 
$BRS->set_account('BURST-9LSF-V4WN-34E8-4WCMR');
$time =  $BRS->getTrades();

echo'<pre>';
print_r($time);
echo'</pre>';