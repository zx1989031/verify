<?php
namespace lightbluesky\Demo;


class Verify
{
    /**
     * ip判断
     * @param $ip
     * @return false|int
     */
    function isIPAddress($ip)
    {
        $ipv4Regex = '/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/';

        $ipv6Regex = '/^(((?=.*(::))(?!.*\3.+\3))\3?|([\dA-F]{1,4}(\3|:\b|$)|\2))(?4){5}((?4){2}|(((2[0-4]|1\d|[1-9])?\d|25[0-5])\.?\b){4})$/i';

        if (preg_match($ipv4Regex, $ip))
            return 4;

        if (false !== strpos($ip, ':') && preg_match($ipv6Regex, trim($ip, ' []')))
            return 6;

        return false;
    }


    /**
     * 验证邮箱格式
     * @param $email
     * @return bool
     */
    function isValidEmail($email)
    {
        $check = false;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $check = true;
        }
        return $check;
    }

    /**
     * 判断是否为手机访问
     * @return  boolean
     */
    function isMobile()
    {
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            $sp_is_mobile = false;
        } elseif (
            strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
            || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false
        ) {
            $sp_is_mobile = true;
        } else {
            $sp_is_mobile = false;
        }

        return $sp_is_mobile;
    }

}
