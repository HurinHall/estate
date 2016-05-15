<?php 
/**
* Encrypt
* @category	Library
* @author Hurin Hall <hurin@live.ca>
* @copyright Copyright (c) 2015, Hurin Hall
* @version 1.0
* @link	http://iceloof.com
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools {

	public function sendemail($to,$from,$username,$pwd,$host,$port,$title,$content){
		require_once('class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->CharSet = "utf-8";
		$mail->IsSMTP();       
		$mail->SMTPAuth = true;  
		$mail->SMTPSecure = 'ssl';
		$mail->Host = $host;
		$mail->Port = $port;                 
		$mail->Username = $from; 
		$mail->Password = $pwd; 
		$mail->SetFrom($from, $username);
		$mail->AddReplyTo($from,$username);
		$mail->Subject = $title;
		$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; 
		$mail->MsgHTML($content);
		$mail->AddAddress($to, "Iceloof User");
		if(!$mail->Send()) {
  			return false;
  		} else {
  			return true;
  		}
	}
	
	public function encode_pass($tex,$key,$type="encode",$expiry=0){
    	$chrArr=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
                  'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
                  '0','1','2','3','4','5','6','7','8','9');
    	if($type=="decode"){
        	if(strlen($tex)<14)return false;
       	 	$verity_str=substr($tex, 0,8);
        	$tex=substr($tex, 8);
        	if($verity_str!=substr(md5($tex),0,8)){
            	return false;
        	}    
    	}
    	$key_b=$type=="decode"?substr($tex,0,6):$chrArr[rand()%62].$chrArr[rand()%62].$chrArr[rand()%62].$chrArr[rand()%62].$chrArr[rand()%62].$chrArr[rand()%62];
    	$rand_key=$key_b.$key;    
    	$modnum=0;$modCount=0;$modCountStr="";
    	if($expiry>0){
        	if($type=="decode"){
            	$modCountStr=substr($tex,6,1);
            	$modCount=$modCountStr=="a"?10:floor($modCountStr);
            	$modnum=substr($tex,7,$modCount);
            	$rand_key=$rand_key.(floor((time()-$modnum)/$expiry));
        	}else{
            	$modnum=time()%$expiry;
            	$modCount=strlen($modnum);
            	$modCountStr=$modCount==10?"a":$modCount;
            	$rand_key=$rand_key.(floor(time()/$expiry));            
        	}
        	$tex=$type=="decode"?base64_decode(substr($tex, (7+$modCount))):"xugui".$tex;
    	}else{
        	$tex=$type=="decode"?base64_decode(substr($tex, 6)):"xugui".$tex;
    	}
    	$rand_key=md5($rand_key);
    	$texlen=strlen($tex);
    	$reslutstr="";
    	for($i=0;$i<$texlen;$i++){
        	$reslutstr.=$tex{$i}^$rand_key{$i%32};
    	}
    	if($type!="decode"){
        	$reslutstr=trim(base64_encode($reslutstr),"==");
        	$reslutstr=$modCount?$modCountStr.$modnum.$reslutstr:$reslutstr;
        	$reslutstr=$key_b.$reslutstr;
        	$reslutstr=substr(md5($reslutstr), 0,8).$reslutstr;
    	}else{
        	if(substr($reslutstr,0, 5)!="xugui"){
            	return false;
        	}
        	$reslutstr=substr($reslutstr, 5);
    	}
    	return $reslutstr;
	}
	
	public function countryCode(){
		$code = array("+64","+86");
		return $code;	
	}
	
	public function countryList(){
		$country = array("New Zealand","China");
		return $country;
	}
	
	public function cityList($country){
		if($country == "China"){
			$city = array("-");
		}else if($country == "New Zealand"){
			$city = array("Auckland","Hamilton","Wellington");
		}
		return $city;
	}
	
	public function districtsList($country,$city){
		if($country == "China"){
			$districts= array("-");
		}else if($country == "New Zealand"){
			if($city == "Auckland"){
				$districts = array("Auckland City","Franklin","Hauraki Gulf Islands","Manukau City","North Shore City","Papakura","Rodney","Waiheke Island","Waitakere City");
			}else if($city == "Hamilton"){
				$districts = array("Hamilton","Waikato");
			}else if($city == "Wellington"){
				$districts = array("Wellington");
			}
		}
		return $districts;
	}
	
	public function suburbList($districts){
		if($districts=="Auckland City"){
			$suburbs = array("Arch Hill","Avondale","Balmoral","Blockhouse Bay","City Centre","Coxs Bay","Eden Terrace","Ellerslie","Epsom","Fairview Heights","Freemans Bay","Glen Innes","Glendowie","Grafton","Greenlane","Grey Lynn","Herne Bay","Hillsborough","Kingsland","Kohimarama","Lynfield","Meadowbank","Mission Bay","Morningside","Mount Albert","Mount Eden","Mount Roskill","Mount Wellington","New Windsor","Newmarket","Newton","One Tree Hill","Onehunga","Orakei","Oranga","Otahuhu","Owairaka","Panmure","Parnell","Penrose","Point Chevalier","Point England","Ponsonby","Remuera","Royal Oak","Saint Heliers","Saint Johns","Saint Johns Park","Saint Marys Bay","Sandringham","St Lukes","Stonefields","Tamaki","Te Papapa","Three Kings","Wai O Taiki Bay","Waikowhai","Waterview","Wesley","Western Springs","Westmere");
		}else{
			$suburbs = array("-");
		}
		return $suburbs;
	}
	
	public function nationalityList(){
		$nationality = array("New Zealand","Chinese");
		return $nationality;
	}
}
?>