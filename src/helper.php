<?php

use think\captcha\Captcha;
use think\facade\Config;
use think\facade\Validate;

Validate::extend('captcha', function ($code, $uniqid) {
    return captcha_check($code, $uniqid);
});

Validate::setTypeMsg('captcha', ':attribute错误!');

/**
 * @param array $config
 * @return array
 */
function captcha($config = [])
{
    $captcha = new Captcha($config);
    return $captcha->entry();
}

/**
 * @param string $code
 * @param string $uniqid
 * @return bool
 */
function captcha_check($code, $uniqid)
{
    $captcha = new Captcha((array)Config::pull('captcha'));
    return $captcha->check($code, $uniqid);
}
