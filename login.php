<?php
require_once 'vendor/autoload.php';

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

$signer = new Sha256();

if ($_POST['username'] == 'xugang' && $_POST['password'] == '123456') {
    $token = (new Builder())->setIssuer("http://example.com")
        ->setAudience("http://example.org")
        ->setId("4f1g23a12aa")
        ->setIssuedAt(time())
        ->setNotBefore(time() + 60)
        ->setExpiration(time() + 3600)
        ->set('uid', 1)
        ->sign($signer, 'testing')
        ->getToken();

    echo $token;
} else {
    echo '用户名或密码错误';
}