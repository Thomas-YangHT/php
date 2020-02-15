<?php
        $echoStr = "test";
        $signature = "";
        $timestamp = "1411034505";
        $nonce = "123";        
        $token = "weixin";                 
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);                 
        $tmpStr = implode($tmpArr);                 
        $signature = sha1($tmpStr);
        print "curl -i -X GET \"http://103.42.78.106/php?token=weixin&echostr=test&nonce=123&timestamp=1411034505&signature=".$signature."\""        
?>

