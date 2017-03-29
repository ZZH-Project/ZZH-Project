<?php
/*
 *  Copyright (c) 2014 The CCP project authors. All Rights Reserved.
 *
 *  Use of this source code is governed by a Beijing Speedtong Information Technology Co.,Ltd license
 *  that can be found in the LICENSE file in the root of the web site.
 *
 *   http://www.yuntongxun.com
 *
 *  An additional intellectual property rights grant can be found
 *  in the file PATENTS.  All contributing project authors may
 *  be found in the AUTHORS file in the root of the source tree.
 */
namespace App\Tool\SMS;
class SendTemplateSMS
{
    //主帐号,对应开官网发者主账号下的 ACCOUNT SID
private $accountSid= '8aaf0708592adca6015944899695101a';

//主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
private $accountToken= '87f860af81914a1dad7f3295a5408d84';

//应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
//在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
private $appId='8aaf0708592adca60159448996e7101e';

//请求地址
//沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
//生产环境（用户应用上线使用）：app.cloopen.com
private $serverIP='app.cloopen.com';


//请求端口，生产环境和沙盒环境一致
private $serverPort='8883';

//REST版本号，在官网文档REST介绍中获得。
private $softVersion='2013-12-26';


    /**
     * 发送模板短信
     * @param to 手机号码集合,用英文逗号分开
     * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
     * @param $tempId 模板Id,测试应用和未上线应用使用测试模板请填写1，正式应用上线后填写已申请审核通过的模板ID
     */
    function sendTemplateSMS($to,$datas,$tempId)
    {
        // 初始化CCPRestSmsSDK
        $rest = new CCPRestSmsSDK($this->serverIP,$this->serverPort,$this->softVersion);
        $rest->setAccount($this->accountSid,$this->accountToken);
        $rest->setAppId($this->appId);

        // 发送模板短信
        //echo "Sending TemplateSMS to $to <br/>";
        $rt_mess = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($rt_mess == NULL ) {
            $rt_mess->status = 1;
            $rt_mess->message =  "result error!";
        }
        if($rt_mess->statusCode!=0) {
            $rt_mess->status = $rt_mess->statusCode . "<br>";
            $rt_mess->message = $rt_mess->statusMsg . "<br>";
        } else {
            $rt_mess->status = 0;
            $rt_mess->message =  '发送成功';
        }
        return $rt_mess;
    }
}

//Demo调用 
		//**************************************举例说明***********************************************************************
		//*假设您用测试Demo的APP ID，则需使用默认模板ID 1，发送手机号是13800000000，传入参数为6532和5，则调用方式为           *
		//*result = sendTemplateSMS("13800000000" ,array('6532','5'),"1");																		  *
		//*则13800000000手机号收到的短信内容是：【云通讯】您使用的是云通讯短信模板，您的验证码是6532，请于5分钟内正确输入     *
		//*********************************************************************************************************************
//sendTemplateSMS("",array('',''),"");//手机号码，替换内容数组，模板ID
?>
