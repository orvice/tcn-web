<?php
/**
 * t.cn URL Shorter
 * Author: orvice
 * last update: 14-9-17
 *
 */

class tcn {
    // ApiKey

    public $appkey;
    //curl
    public $cc;
    public $baseurl   = "http://api.t.sina.com.cn/short_url/shorten.json?";
    public $expandurl = "http://api.t.sina.com.cn/short_url/expand.json?";

    // Edit this apikey
    function  __construct($appkey="3119783300"){
        $this->appkey = $appkey;
        // init
        $this->cc = curl_init();
    }

    function srt($url){
        $url     = urlencode($url);
        $furl = $this->baseurl.'source='.$this->appkey.'&url_long='.$url;
        $this->cc  = curl_init($furl);
        curl_setopt($this->cc,CURLOPT_RETURNTRANSFER,true);
        $short_json = curl_exec($this->cc);

        $short_ary  = json_decode($short_json,true);
        // $code = $short_ary['error_code'];

        //$bk = $short_ary['0']->url_short;
        $code = $short_ary['error_code'];
        if($code == "400"){
            return 0;
        }
        else{
            $bk  = $short_ary['0'];
            $bk  = $bk['url_short'];
            return $bk;
        }
    }

    function expand($url){
        $url = urlencode($url);
        $furl = $this->expandurl.'source='.$this->appkey.'&url_short='.$url;
        $this->cc  = curl_init($furl);
        curl_setopt($this->cc,CURLOPT_RETURNTRANSFER,true);
        $long_json = curl_exec($this->cc);
        $long_ary  = json_decode($long_json,true);
        $code = $long_ary['error_code'];

        if($code == "400"){
            return 0;
            //return $furl;
        }
        else{
            $bk = $long_ary['0'];
            $bk = $bk['url_long'];
            return $bk;
        }

    }

    function __destruct(){
        curl_close($this->cc);
    }
}



