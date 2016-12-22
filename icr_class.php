<?php
class iCR {
	public $username = "admin";
	public $password = "admin";
	public $hostname = null;
	public $code = null;
	public $timeout = 5;
	
	public function __construct ($hostname,$username = "admin",$password = "admin") {
	$this->BASE_URL = "https://$hostname/mgmt/tm";
	}
	
	public function get($url){
 
		$ch = curl_init($this->BASE_URL.$url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_USERPWD, "$this->username:$this->password");		
		curl_setopt($ch,CURLOPT_TIMEOUT,$this->timeout);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,$this->timeout);		
		$result = curl_exec($ch);
		$this->code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($result) {
			return json_decode($result);
		} else {
			return false;
		}
	}
 
	public function create($url, $data){
		$encoded_data = json_encode($data);
		$ch = curl_init($this->BASE_URL.$url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
		curl_setopt($ch, CURLOPT_FAILONERROR, true);                                                                    
		curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_data);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_USERPWD, "$this->username:$this->password");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($encoded_data))                                                                       
		);                                                                                                                   
		curl_setopt($ch,CURLOPT_TIMEOUT,$this->timeout); 
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,$this->timeout);		
		$result = curl_exec($ch);
		$this->code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($result) {
			return json_decode($result);
		} else {
			return false;
		}
	}
 
	public function modify($url, $data){
		$encoded_data = json_encode($data);
		$ch = curl_init($this->BASE_URL.$url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
		curl_setopt($ch, CURLOPT_FAILONERROR, true);                                                                    
		curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_data);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_USERPWD, "$this->username:$this->password");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($encoded_data))                                                                       
		);                                                                                                                   
		curl_setopt($ch,CURLOPT_TIMEOUT,$this->timeout); 
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,$this->timeout);		
		$result = curl_exec($ch);
		$this->code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($result) {
			return json_decode($result);
		} else {
			return false;
		}
	}
 
	public function delete($url){
 
		$ch = curl_init($this->BASE_URL.$url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
		curl_setopt($ch, CURLOPT_FAILONERROR, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_USERPWD, "$this->username:$this->password");                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json') );                                                                                                                   
		curl_setopt($ch,CURLOPT_TIMEOUT,$this->timeout);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,$this->timeout);		
		$result = curl_exec($ch);
		$this->code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($result) {
			return json_decode($result);
		} else {
			return false;
		}
	}
 
}
?>