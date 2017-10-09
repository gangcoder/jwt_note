<?php
require_once 'vendor/autoload.php';

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;

$authToken = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : '';
if (empty($authToken)) {
    echo "权限不足，请先登录";
    exit;
}

$authTokenArr = explode(" ", $authToken);
if (!isset($authTokenArr[0], $authTokenArr[1]) || $authTokenArr[0] != "Bearer" || empty($authTokenArr[1])) {
    echo "权限不足，请先登录";
    exit;
}

$token = $authTokenArr['1'];
$token = (new Parser())->parse((string) $token); // Parses from a string
var_dump($token);