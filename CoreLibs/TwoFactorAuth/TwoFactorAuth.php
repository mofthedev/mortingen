<?php

namespace TwoFactorAuth;

class TwoFactorAuth
{
	public static $session_key = 'tfa_secret';

	public static function generate($len=32)
	{
		// Valid secret lengths are 80 to 640 bits
		if ($len < 16 || $len > 128)
		{
			$len=32;
		}
		return TokenAuth6238::generateRandomClue($len);
	}

	/**
	 * Generates a new 2-factor-authenticate secret key and stores it in the session.
	 * It would be a good practice to call this again during verification process so a real key used by a user will be removed.
	 * It is also better to call this just before the verification and not to verify an old secret key.
	 * 
	 * Do not store the secret key in DB before verification. This will increase the workload on DB engine in behalf of nothing.
	 * 
	 * After the verification, save the secret key in the users row in the DB. Do not hash it. Hashing the secret key will break 2fa.
	 * Do not worry about DB dumps, if you use unique salts for each password.
	 * 
	 * Salting will secure the system against DB dumpings, 2FA will secure the system against weak/hacked passwords.
	 * Using both together will be the best approach.
	 */
	public static function generateSession($len=32)
	{
		$secret_key = static::generate($len);
		static::setSecret($secret_key);
		return $secret_key;
	}

	/**
	 * For manual verification.
	 */
	public static function verify($secretkey, $currentcode)
	{
		if (TokenAuth6238::verify($secretkey, $currentcode, 1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * For automatic verification. This is just easier.
	 */
	public static function verifySession($currentcode)
	{
		return static::verify(static::getSecret(), $currentcode);
	}

	/**
	 * Returns saved secret key. Use this to save in DB after verification process.
	 */
	public static function getSecret()
	{
		return $_SESSION[static::$session_key];
	}

	/**
	 * Returns saved secret key. Use this to save in DB after verification process.
	 */
	public static function setSecret($key)
	{
		return $_SESSION[static::$session_key] = $key;
	}

	public static function qrData($username, $domain, $secretkey, $issuer)
	{
		$qrcodedata = 'otpauth://totp/'.$username . '@' . $domain . '?secret=' . $secretkey . '&issuer=' . $issuer;
		// $qrcodedata = rawurlencode($qrcodedata);
		return $qrcodedata;
	}

	/**
	 * This will return URL of the QR code using Google Chart API.
	 * Do not use this for 2fa. This is implemented just for test/debug purposes.
	 * While in development area, if a problem occurs with generation of QR codes, use this.
	 * Do not use this in production area. Do not deploy any code using this function.
	 * Be a paranoid.
	 */
	public static function qrUrl($username, $domain, $secretkey, $issuer)
	{	
		//$googleqrcodeurl = TokenAuth6238::getBarCodeUrl('username','yourdomain.com',$secretkey,'yourdomain.com');
		$googleqrcodeurl = TokenAuth6238::getBarCodeUrl($username, $domain, $secretkey, $issuer);
		return $googleqrcodeurl;
	}

	// public static function qrUrlLocal($username, $domain, $secretkey, $issuer)
	// {
	// 	global $_APP;
	// 	$qrcodeurl = $_APP['url'].'/qr/?d='.static::qrData($username, $domain, $secretkey, $issuer);
	// 	return $qrcodeurl;
	// }

	public static function getTokenCode($secretkey, $range=1)
	{
		return TokenAuth6238::getTokenCode($secretkey, $range);
	}

}
