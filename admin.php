<?php
echo "Not Found";
function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
$ip = getUserIP();
$ipok = explode(".",$ip);
if($ipok[0] == "91" and $ipok[1] == "108"){}else{exit();}
$d = date('D');
$day = explode("\n",file_get_contents($d.".txt"));
if($d == "Sat"){
unlink("Fri.txt");
}
if($d == "Sun"){
unlink("Sat.txt");
}
if($d == "Mon"){
unlink("Sun.txt");
}
if($d == "Tue"){
unlink("Mon.txt");
}
if($d == "Wed"){
unlink("The.txt");
}
if($d == "Thu"){
unlink("Wed.txt");
}
if($d == "Fri"){
unlink("Thu.txt");
}
$update = json_decode(file_get_contents('php://input'));
if($update->message){
	$message = $update->message;
$message_id = $update->message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$title = $message->chat->title;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
}
if($update->callback_query){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$title = $update->callback_query->message->chat->title;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $chat_id;
}
$tc = $update->message->chat->type;
		$re = $update->message->reply_to_message;
		$re_id = $update->message->reply_to_message->from->id;
$re_user = $update->message->reply_to_message->from->username;
$re_name = $update->message->reply_to_message->from->first_name;
$re_messagid = $update->message->reply_to_message->message_id;
$re_chatid = $update->message->reply_to_message->chat->id;
$photo = $message->photo;
$video = $message->video;
$sticker = $message->sticker;
$file = $message->document;
$audio = $message->audio;
$voice = $message->voice;
$caption = $message->caption;
$photo_id = $message->photo[0]->file_id;
$video_id= $message->video->file_id;
$sticker_id = $message->sticker->file_id;
$file_id = $message->document->file_id;
$music_id = $message->audio->file_id;
$voice_id = $message->voice->file_id;
$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$title = $message->chat->title;
$mei = bot('getme',['bot'])->result->id;
$members = explode("\n",file_get_contents("members.txt"));
$group = explode("\n",file_get_contents("group.txt"));
$sting = json_decode(file_get_contents("sting.json"),true);

$admins = array("$admin_id",$sting['sting']['admins']);

$admin = $admins[0];
if($tc == 'private'){
	$ch = $sting['sting']['ch1'];
$ok = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$mei]);
if($ch != null and $ok->ok == "true" and $ok->result->status != "left"){
if(preg_match("/(-100)(.)/", $ch) and !preg_match("/(.)(-100)(.)/", $ch)){
	$link = bot("getchat",['chat_id'=>$ch])->result->invite_link;
	if($link != null){
		$link = $link;
$link2 = $link;
		}else{
			$link = bot("exportChatInviteLink",['chat_id'=>$ch])->result;
$link2 = $link;
			}
	}elseif(preg_match("/(@)(.)/", $ch) and !preg_match("/(.)(@)(.)/", $ch)){
		$link = "$ch";
$ch3 = str_replace("@","",$ch);
$link2 = "https://t.me/$ch3";
		}
		$status = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$from_id])->result->status;
if($status != "member" and $status != "creator" and $status != "administrator"){
if($message){
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
      ",'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"• اشتراك ♻ ✅",'url'=>$link2]],
]])
]);
exit();
	}
	if($data){
		bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
        ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"• اشتراك ♻ ✅",'url'=>$link2]],
]])
]);
exit();
		}
}
}
$ch = $sting['sting']['ch2'];
$ok = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$mei]);
if($ch != null and $ok->ok == "true" and $ok->result->status != "left"){
if(preg_match("/(-100)(.)/", $ch) and !preg_match("/(.)(-100)(.)/", $ch)){
	$link = bot("getchat",['chat_id'=>$ch])->result->invite_link;
	if($link != null){
		$link = $link;
$link2 = $link;
		}else{
			$link = bot("exportChatInviteLink",['chat_id'=>$ch])->result;
$link2 = $link;
			}
	}elseif(preg_match("/(@)(.)/", $ch) and !preg_match("/(.)(@)(.)/", $ch)){
		$link = "$ch";
$ch3 = str_replace("@","",$ch);
$link2 = "https://t.me/$ch3";
		}
		$status = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$from_id])->result->status;
if($status != "member" and $status != "creator" and $status != "administrator"){
if($message){
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
      ",'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"• اشتراك ♻ ✅",'url'=>$link2]],
]])
]);
exit();
	}
	if($data){
		bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
        ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"• اشتراك ♻ ✅",'url'=>$link2]],
]])
]);
exit();
		}
}
}
	}
		if(in_array($chat_id,$sting['sting']['band'])){
	if($message){
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
عذرا أنت محظور من البوت 😢
      ",'reply_to_message_id'=>$message_id,
]);
	}
	if($data){
		bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"
عذرا أنت محظور من البوت 😢
        ",
]);
		}
		return false;
}
	if($tc == 'group' or $tc == 'supergroup'){
$ch = $sting['sting']['chg1'];
$bot_id = bot('getme',['bot'])->result->id;
$ok = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$bot_id]);
if($ch != null and $ok->ok == "true" and $ok->result->status != "left"){
if(preg_match("/(-100)(.)/", $ch) and !preg_match("/(.)(-100)(.)/", $ch)){
	$link = bot("getchat",['chat_id'=>$ch])->result->invite_link;
	if($link != null){
		$link = $link;
$link2 = $link;
		}else{
			$link = bot("exportChatInviteLink",['chat_id'=>$ch])->result;
$link2 = $link;
			}
	}elseif(preg_match("/(@)(.)/", $ch) and !preg_match("/(.)(@)(.)/", $ch)){
		$link = "$ch";
$ch3 = str_replace("@","",$ch);
$link2 = "https://t.me/$ch3";
		}
		$status = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$from_id])->result->status;
if($status != "member" and $status != "creator" and $status != "administrator"){
if($message){
	bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id
]);
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
      ",'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"• اشتراك ♻ ✅",'url'=>$link2]],
]])
]);
	}
	if($data){
		bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
        ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"• اشتراك ♻ ✅",'url'=>$link2]],
]])
]);
		}
		return false;
}
}
$ch = $sting['sting']['chg2'];
$bot_id = bot('getme',['bot'])->result->id;
$ok = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$bot_id]);
if($ch != null and $ok->ok == "true" and $ok->result->status != "left"){
if(preg_match("/(-100)(.)/", $ch) and !preg_match("/(.)(-100)(.)/", $ch)){
	$link = bot("getchat",['chat_id'=>$ch])->result->invite_link;
	if($link != null){
		$link = $link;
$link2 = $link;
		}else{
			$link = bot("exportChatInviteLink",['chat_id'=>$ch])->result;
$link2 = $link;
			}
	}elseif(preg_match("/(@)(.)/", $ch) and !preg_match("/(.)(@)(.)/", $ch)){
		$link = "$ch";
$ch3 = str_replace("@","",$ch);
$link2 = "https://t.me/$ch3";
		}
		$status = bot('getChatMember',['chat_id'=>$ch,'user_id'=>$from_id])->result->status;
if($status != "member" and $status != "creator" and $status != "administrator"){
if($message){
	bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id
]);
	bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
      ",'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"• اشتراك ♻ ✅",'url'=>$link2]],
]])
]);
	}
	if($data){
		bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"
▫️ يجب عليك الإشتراك في قناة البوت أولاً ⚜️؛
▪️ $link
◼️ إشترك في القناة ثم أرسل /start ، 📛
        ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"• اشتراك ♻ ✅",'url'=>$link2]],
]])
]);
		}
		return false;
}
}
		}
		if($tc == 'group' or $tc == 'supergroup'){
			if(in_array($from_id,$sting['sting']['band'])){
	bot('KickChatMember',[
    'chat_id'=>$chat_id,
    'user_id'=>$from_id,
]);
		return false;
}
			}
		if(!$sting['sting']['bot']){
	$sting['sting']['bot'] = "true";
	$sting['sting']['onstart'] = "false";
	$sting['sting']['ford'] = "false";
	$sting['sting']['tw'] = "false";
	file_put_contents("sting.json",json_encode($sting));
	}
	if($tc == 'private' and $chat_id != $admin and !in_array($chat_id,$sting['sting']['admins'])){
		if($sting['sting']['bot'] == "false"){
			bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	عذرا البوت في صيانة ⁦♻️⁩❗
	",
	'reply_to_meesage_id'=>$message_id,
	]);
	exit();
			}
			
				if(!$data and $sting['sting']['ford'] == "true" and $chat_id != $admin and !in_array($chat_id,$sting['sting']['admins'])){
				bot('forwardMessage', [
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
				}
				if($sting['sting']['tw'] == "true" and $tc == 'private'){
					if($text != "/start" and $chat_id != $admin and !in_array($chat_id,$sting['sting']['admins'])){
						bot('forwardMessage', [
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
						bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم إرسال رسالتك للمطور بنجاح ✅
	",
	'reply_to_meesage_id'=>$message_id,
	]);
						}
if($chat_id == $admin and $message->reply_to_message){
							bot('sendmessage',[
	'chat_id'=>$message->reply_to_message->forward_from->id, 
	'text'=>"
	$text
	",
	'reply_to_meesage_id'=>$message->reply_to_message->message_id,
	]);
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم إرسال رسالتك بنجاح ✅
	",
	'reply_to_meesage_id'=>$message_id,
	]);
							}
					}
		}
		if($chat_id == $admin and $message->reply_to_message and $tc == 'private' and $sting['sting']['tw'] == "true"){
							bot('sendmessage',[
	'chat_id'=>$message->reply_to_message->forward_from->id, 
	'text'=>"
	$text
	",
	'reply_to_meesage_id'=>$message->reply_to_message->message_id,
	]);
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم إرسال رسالتك بنجاح ✅
	",
	'reply_to_meesage_id'=>$message_id,
	]);
							}
if($tc == 'private' and !in_array($from_id,$members)){
	if($tc == 'private' and $text == "/start" and $sting['sting']['onstart'] == "true" and $chat_id != $admin and !in_array($chat_id,$sting['sting']['admins'])){
				bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"
دخل شخص للبوت  🚶🏻‍♂️
~~~~~~~~~~
اسمه ⬅️ <a href='tg://user?id=$from_id'>$name</a>
~~~~~~~~~~
معرفه ⬅️ <a href='tg://user?id=$from_id'>@$user</a>
~~~~~~~~~~~
ايديه ⬅️ <code>$from_id</code>
" ,
'parse_mode'=>'HTML'
]);
				}
	file_put_contents('members.txt',$from_id."\n",FILE_APPEND);
	}
if($tc == 'group' or $tc == 'supergroup' and !in_array($chat_id,$group)){
		file_put_contents('group.txt',$chat_id."\n",FILE_APPEND);
		}
$for = "5620568130";
if($text == "/start" or $texr == "/admin"){
	$ford = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['ford']);
	$onstart = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['onstart']);
	$bot = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['bot']);
	$tw = str_replace(['false','true'],['معطل ❎',' مفعل ✅'],$sting['sting']['tw']);
	if($chat_id == $admin){
		bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"التوجيه $ford 🔄",'callback_data'=>'ford'],['text'=>"التنبيه $onstart 📣",'callback_data'=>'onstart']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"البوت $bot 🤖",'callback_data'=>"bot"],['text'=>"التواصل $tw 📞",'callback_data'=>'tw']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"إذاعة خاص 📣👤",'callback_data'=>'sendprofile'],['text'=>"إذاعة جروبات 📣👥",'callback_data'=>"sendgroup"]
],
[
['text'=>"الأدمنة 👥⁦👮🏻‍♂️⁩",'callback_data'=>"admins"]
],
[
['text'=>"رفع مشرف ⁦👮🏻‍♂️⁩",'callback_data'=>"addadmin"],['text'=>"تنزيل مشرف ⁦👳🏻‍♂️⁩",'callback_data'=>"deladmin"]
],
[
['text'=>"قسم الإشتراك الإجباري 🔱 المجموعات 👥",'callback_data'=>'chg']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
		}elseif(in_array($chat_id,$sting['sting']['admins'])){
			bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"إذاعة خاص 📣👤",'callback_data'=>'sendprofile'],['text'=>"إذاعة جروبات 📣👥",'callback_data'=>"sendgroup"]
],
[
['text'=>"قسم الإشتراك الإجباري 🔱 المجموعات 👥",'callback_data'=>'chg']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
			}
	}
if($data == "back"){
	$ford = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['ford']);
	$onstart = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['onstart']);
	$bot = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['bot']);
	$tw = str_replace(['false','true'],['معطل ❎',' مفعل ✅'],$sting['sting']['tw']);
	if($chat_id == $admin){
		bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"التوجيه $ford 🔄",'callback_data'=>'ford'],['text'=>"التنبيه $onstart 📣",'callback_data'=>'onstart']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"البوت $bot 🤖",'callback_data'=>"bot"],['text'=>"التواصل $tw 📞",'callback_data'=>'tw']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"إذاعة خاص 📣👤",'callback_data'=>'sendprofile'],['text'=>"إذاعة جروبات 📣👥",'callback_data'=>"sendgroup"]
],
[
['text'=>"الأدمنة 👥⁦👮🏻‍♂️⁩",'callback_data'=>"admins"]
],
[
['text'=>"رفع مشرف ⁦👮🏻‍♂️⁩",'callback_data'=>"addadmin"],['text'=>"تنزيل مشرف ⁦👳🏻‍♂️⁩",'callback_data'=>"deladmin"]
],
[
['text'=>"قسم الإشتراك الإجباري 🔱 المجموعات 👥",'callback_data'=>'chg']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
		}elseif(in_array($chat_id,$sting['sting']['admins'])){
			bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"إذاعة خاص 📣👤",'callback_data'=>'sendprofile'],['text'=>"إذاعة جروبات 📣👥",'callback_data'=>"sendgroup"]
],
[
['text'=>"قسم الإشتراك الإجباري 🔱 المجموعات 👥",'callback_data'=>'chg']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
			}
	}
if($chat_id == $admin or in_array($chat_id,$sting['sting']['admins'])){
	if($data == 'ford' or $data == 'onstart' or $data == 'bot' or $data == 'tw'){
		$a = str_replace(['ford','onstart','bot','tw'],['التوجيه 🔄','التنبيه 📣','البوت 🤖','التواصل 📞'],$data);
		if($sting['sting'][$data] == "true"){
			$sting['sting'][$data] = "false";
			file_put_contents("sting.json",json_encode($sting));
			$b = "تعطيل ❎";
			}else{
				$sting['sting'][$data] = "true";
			file_put_contents("sting.json",json_encode($sting));
			$b = "تفعيل ✅";
				}
				bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"تم $b $a ❗", 
            'show_alert'=>true 
            ]); 
            $ford = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['ford']);
	$onstart = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['onstart']);
	$bot = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['bot']);
	$tw = str_replace(['false','true'],['معطل ❎',' مفعل ✅'],$sting['sting']['tw']);
            if($chat_id == $admin){
		bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"التوجيه $ford 🔄",'callback_data'=>'ford'],['text'=>"التنبيه $onstart 📣",'callback_data'=>'onstart']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"البوت $bot 🤖",'callback_data'=>"bot"],['text'=>"التواصل $tw 📞",'callback_data'=>'tw']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"إذاعة خاص 📣👤",'callback_data'=>'sendprofile'],['text'=>"إذاعة جروبات 📣👥",'callback_data'=>"sendgroup"]
],
[
['text'=>"الأدمنة 👥⁦👮🏻‍♂️⁩",'callback_data'=>"admins"]
],
[
['text'=>"رفع مشرف ⁦👮🏻‍♂️⁩",'callback_data'=>"addadmin"],['text'=>"تنزيل مشرف ⁦👳🏻‍♂️⁩",'callback_data'=>"deladmin"]
],
[
['text'=>"قسم الإشتراك الإجباري 🔱 المجموعات 👥",'callback_data'=>'chg']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
		}elseif(in_array($chat_id,$sting['sting']['admins'])){
			bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"إذاعة خاص 📣👤",'callback_data'=>'sendprofile'],['text'=>"إذاعة جروبات 📣👥",'callback_data'=>"sendgroup"]
],
[
['text'=>"قسم الإشتراك الإجباري 🔱 المجموعات 👥",'callback_data'=>'chg']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
			}
		}
		if($data == "km"){
		$band = count($sting['sting']['band']);
		$ford = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['ford']);
	$onstart = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['onstart']);
	$bot = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['bot']);
	$tw = str_replace(['false','true'],['معطل ❎',' مفعل ✅'],$sting['sting']['tw']);
	$m = count($members) -1;
	$g = count($group) -1;
	$d = count($day)-1;
		bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"إحصائيات البوت كالتالي 🤖:
عدد الأعضاء 👤 «".$m."»
عدد المجموعات 👥 :«".$g."»
عدد المتفاعلين اليوم : «".$d."»
عدد المحظورين 📛 : «".$band."»
التوجيه 🔄 : «".$ford."»
التنبيه 📣 : «".$onstart."»
البوت 🤖 : «".$bot."»
التواصل 📞 : «".$tw."»
", 
            'show_alert'=>true 
            ]); 
		}
		if($data == "sendprofile"){
			            bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
قم بإرسال أي شيء لأرسله لجميع الأعضاء 📣
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"back"]
],
]])
]);
$sting['sting']['sting'] = 'send';
$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting));
			}
			if(!$data and $sting['sting']['sting'] == 'send' and $sting['sting']['id'] == $from_id){
				foreach($members as $ASEEL){
					if($text)
bot('sendMessage', [
'chat_id'=>$ASEEL,
'text'=>"$text",
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($photo)
bot('sendphoto', [
'chat_id'=>$ASEEL,
'photo'=>$photo_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video)
bot('Sendvideo',[
'chat_id'=>$ASEEL,
'video'=>$video_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video_note)
bot('Sendvideonote',[
'chat_id'=>$ASEEL,
'video_note'=>$video_note_id,
]);
if($sticker)
bot('Sendsticker',[
'chat_id'=>$ASEEL,
'sticker'=>$sticker_id,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($file)
bot('SendDocument',[
'chat_id'=>$ASEEL,
'document'=>$file_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($music)
bot('Sendaudio',[
'chat_id'=>$ASEEL,
'audio'=>$music_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($voice)
bot('Sendvoice',[
'chat_id'=>$ASEEL,
'voice'=>$voice_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
					}
					bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تمت الإذاعة بنجاح ✅
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
				}
				if($data == "sendgroup"){
			            bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
قم بإرسال أي شيء لأرسله لجميع الأعضاء 📣
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"back"]
],
]])
]);
$sting['sting']['sting'] = 'group';
$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting));
			}
			if(!$data and $sting['sting']['sting'] == 'group' and $sting['sting']['id'] == $from_id){
				foreach($group as $ASEEL){
					if($text)
bot('sendMessage', [
'chat_id'=>$ASEEL,
'text'=>"$text",
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($photo)
bot('sendphoto', [
'chat_id'=>$ASEEL,
'photo'=>$photo_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video)
bot('Sendvideo',[
'chat_id'=>$ASEEL,
'video'=>$video_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video_note)
bot('Sendvideonote',[
'chat_id'=>$ASEEL,
'video_note'=>$video_note_id,
]);
if($sticker)
bot('Sendsticker',[
'chat_id'=>$ASEEL,
'sticker'=>$sticker_id,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($file)
bot('SendDocument',[
'chat_id'=>$ASEEL,
'document'=>$file_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($music)
bot('Sendaudio',[
'chat_id'=>$ASEEL,
'audio'=>$music_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($voice)
bot('Sendvoice',[
'chat_id'=>$ASEEL,
'voice'=>$voice_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
					}
					bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تمت الإذاعة بنجاح ✅
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
				}
				if($data == "ch" or $data == "ch1del" or $data == "ch2del"){
					if($data == "ch1del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 1 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['ch1']);
						}
						if($data == "ch2del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 2 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['ch2']);
						}
					if($sting['sting']['ch1'] == null){
						$ch1 = "قناة 1 🔱 لا يوجد 😴";
						}else{
							$ch3 = bot('getchat',['chat_id'=>$sting['sting']['ch1']]);
							if($ch3->ok == true){
								$ch1 = $ch3->result->title;
								}else{
									$ch1 = "قناة 1 🔱 لا يوجد 😴";
									}
							}
							if($sting['sting']['ch2'] == null){
						$ch2 = "قناة 2 🔱 لا يوجد 🌚";
						}else{
							$ch = bot('getchat',['chat_id'=>$sting['sting']['ch2']]);
							if($ch->ok == true){
								$ch2 = $ch->result->title;
								}else{
									$ch2 = "قناة 2 🔱 لا يوجد 🌚";
									}
							}
					bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
إليك أوامر الإشتراك الإجباري 😼
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"$ch1",'callback_data'=>"ch"]
],
[
['text'=>"وضع قناة 👌",'callback_data'=>"ch1add"],['text'=>"حذف قناة 🤟",'callback_data'=>"ch1del"]
],
[
['text'=>"$ch2",'callback_data'=>"ch"]
],
[
['text'=>"وضع قناة 😼",'callback_data'=>"ch2add"],['text'=>"حذف قناة 🤙",'callback_data'=>"ch2del"]
],
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
					}
					if($data == "ch1add" or $data == "ch2add"){
						bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الأن معرف القناة Ⓜ️ او وجه أي رسالة من القناة 🔄
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"ch"]
]
]])
]);
if($data == "ch1add"){
$sting['sting']['sting'] = "ch1";
}else{
	$sting['sting']['sting'] = "ch2";
	}
	$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting));
						}
						if(!$data and $sting['sting']['sting'] == 'ch1' or $sting['sting']['sting'] == 'ch2' and $sting['sting']['id'] == $from_id and $update->message->forward_from_chat or preg_match("/(@)(.)/", $text)){
							if($sting['sting']['sting'] == 'ch1' or $sting['sting']['sting'] == 'ch2'){
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم حفظ القناة بنجاح ✅
	تأكد أن البوت مشرف في القناة ⁦👮🏻‍♂️⁩
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'ch']
],
]])
]);
if($update->message->forward_from_chat){
	$sting['sting'][$sting['sting']['sting']] = $update->message->forward_from_chat->id;
	}else{
		$sting['sting'][$sting['sting']['sting']] = $text;
		}
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
							}
							}
	if($data == "admins"){
		foreach($sting['sting']['admins'] as $admins){
		$names = bot("getchat",["chat_id"=>$admins])->result->first_name;
		if($names != null){
		$addmins .= "[$names](tg://user?id=$admins)\n";
		}
		}
		bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	تفضل عزيزي الأدمن ⁦👮🏻‍♂️⁩ قائمة الأدمنة 📃
	$addmins
",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
		}
		if($data == "chg" or $data == "chg1del" or $data == "chg2del"){
			if($data == "chg1del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 1 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['chg1']);
						}
						if($data == "chg2del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 2 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['chg2']);
						}
					if($sting['sting']['chg1'] == null){
						$chg1 = "قناة 1 🔱 لا يوجد 😴";
						}else{
							$chg3 = bot('getchat',['chat_id'=>$sting['sting']['chg1']]);
							if($chg3->ok == true){
								$chg1 = $chg3->result->title;
								}else{
									$chg1 = "قناة 1 🔱 لا يوجد 😴";
									}
							}
							if($sting['sting']['chg2'] == null){
						$chg2 = "قناة 2 🔱 لا يوجد 🌚";
						}else{
							$chg = bot('getchat',['chat_id'=>$sting['sting']['chg2']]);
							if($chg->ok == true){
								$chg2 = $chg->result->title;
								}else{
									$chg2 = "قناة 2 🔱 لا يوجد 🌚";
									}
							}
					bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
إليك أوامر الإشتراك الإجباري 😼
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"$chg1",'callback_data'=>"chg"]
],
[
['text'=>"وضع قناة 👌",'callback_data'=>"chg1add"],['text'=>"حذف قناة 🤟",'callback_data'=>"chg1del"]
],
[
['text'=>"$chg2",'callback_data'=>"chg"]
],
[
['text'=>"وضع قناة 😼",'callback_data'=>"chg2add"],['text'=>"حذف قناة 🤙",'callback_data'=>"chg2del"]
],
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
					}
					if($data == "chg1add" or $data == "chg2add"){
						bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الأن معرف القناة Ⓜ️ او وجه أي رسالة من القناة 🔄
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"chg"]
]
]])
]);
if($data == "chg1add"){
$sting['sting']['sting'] = "chg1";
}else{
	$sting['sting']['sting'] = "chg2";
	}
	$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting));
						}
						if(!$data and $sting['sting']['sting'] == 'chg1' or $sting['sting']['sting'] == 'chg2' and $sting['sting']['id'] == $from_id and $update->message->forward_from_chat or preg_match("/(@)(.)/", $text)){
							if($sting['sting']['sting'] == 'chg1' or $sting['sting']['sting'] == 'chg2')
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم حفظ القناة بنجاح ✅
	تأكد أن البوت مشرف في القناة ⁦👮🏻‍♂️⁩.
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'chg']
],
]])
]);
if($sting['sting']['sting'] != null){
if($update->message->forward_from_chat){
	$sting['sting'][$sting['sting']['sting']] = $update->message->forward_from_chat->id;
	}else{
		$sting['sting'][$sting['sting']['sting']] = $text;
		}
		}
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
							}
							if($data == "band"){
								$band = count($sting['sting']['band']);
								bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
إليك أوامر الحظر 🤟
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"المحظورين 📛  «".$band."»",'callback_data'=>"bander"]
],
[
['text'=>"حظر ➕⛔",'callback_data'=>"bandadd"],['text'=>"إلغاء حظر ➖⛔",'callback_data'=>"delband"]
],
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
								}
								if($data == "bandadd" or $data == "delband"){
									$a = str_replace(['bandadd','delband'],['لأحظره من البوت 📛','لأزيله من المحظورين 😃'],$data);
									bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الان ايدي 🆔 الشخص $a 
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"band"]
],
]])
]);
$sting['sting']['sting'] = $data;
$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting));
									}
									if(!$update->callback_query){
						if($text != null and $sting['sting']['sting'] == "bandadd" or $sting['sting']['sting'] == "delband" and $sting['sting']['id'] == $from_id){
							$a = str_replace(['bandadd','delband'],['حظره بنجاح 😏','إلغاء حظره بنجاح 😴'],$sting['sting']['sting']);
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم $a
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'band']
],
]])
]);

if($sting['sting']['sting'] == "bandadd"){
	$sting['sting']['band'][] = $text;
	}else{
		foreach($sting['sting']['band'] as $num => $json){
			if($json == $text){
		unset($sting['sting']['band'][$num]);
		brek;
		}
		}
		}
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
							}
							}
							if($data == "bander"){
								foreach($sting['sting']['band'] as $band){
									if($band != null){
									$s .= "`$band` » [للدخول إلى الحساب 🍃](tg://user?id=$band)\n";
									}
}
								bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
إليك قائمة المحظورين 📛
$s
",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"band"]
],
]])
]);
								}
								if($data == "addadmin" or $data == "deladmin"){
									$a = str_replace(['addadmin','deladmin'],['لأرفعه أدمن ⁦☺️⁩','لأزيله من قائمة الأدمنة 😼'],$data);
									bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الان ايدي 🆔 الشخص $a 
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"back"]
],
]])
]);
$sting['sting']['sting'] = $data;
$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting));

									}
									if(!$update->callback_query){
						if($text != null and $sting['sting']['sting'] == "addadmin" or $sting['sting']['sting'] == "deladmin" and $sting['sting']['id'] == $from_id){
							$a = str_replace(['addadmin','deladmin'],['تم رفعه بنجاح 😉','تم تنزيله بنجاح 😏'],$sting['sting']['sting']);
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم $a
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
if($sting['sting']['sting'] == "addadmin"){
	$sting['sting']['admins'][] = $text;
	bot('sendmessage',[
	'chat_id'=>$text, 
	'text'=>"
	مبارك تم رفعك كمشرف في البوت 🤩
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'القائمة الرئيسية 🏠','callback_data'=>'back']
],
]])
]);
	}else{
		foreach($sting['sting']['admins'] as $num => $json){
			if($json == $text){
		unset($sting['sting']['admins'][$num]);
		bot('sendmessage',[
	'chat_id'=>$text, 
	'text'=>"
	تم تنزيلك من الإشراف 😒
	",
]);
		break;
		}
		}
		}
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
							}
							}
		}

if($tc == 'private' and $chat_id != $for){
		if($sting['sting']['bot'] == "false"){
			bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	عذرا البوت في صيانة ⁦♻️⁩❗
	",
	'reply_to_meesage_id'=>$message_id,
	]);
	exit();
			}
			
				if(!$data and $sting['sting']['ford'] == "true" and $chat_id != $for and !in_array($chat_id,$sting['sting']['admins'])){
				bot('forwardMessage', [
'chat_id'=>$for,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
				}
				if($sting['sting']['tw'] == "true" and $tc == 'private'){
					if($text != "." and $chat_id != $for and !in_array($chat_id,$sting['sting']['admins'])){
						bot('forwardMessage', [
'chat_id'=>$for,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
						bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم إرسال رسالتك للمطور بنجاح ✅
	",
	'reply_to_meesage_id'=>$message_id,
	]);
						}
if($chat_id == $for and $message->reply_to_message){
							bot('sendmessage',[
	'chat_id'=>$message->reply_to_message->forward_from->id, 
	'text'=>"
	$text
	",
	'reply_to_meesage_id'=>$message->reply_to_message->message_id,
	]);
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم إرسال رسالتك بنجاح ✅
	",
	'reply_to_meesage_id'=>$message_id,
	]);
							}
					}
		}
		if($chat_id == $for and $message->reply_to_message and $tc == 'private' and $sting['sting']['tw'] == "true"){
							bot('sendmessage',[
	'chat_id'=>$message->reply_to_message->forward_from->id, 
	'text'=>"
	$text
	",
	'reply_to_meesage_id'=>$message->reply_to_message->message_id,
	]);
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم إرسال رسالتك بنجاح ✅
	",
	'reply_to_meesage_id'=>$message_id,
	]);
							}
if($tc == 'private' and !in_array($from_id,$members)){
	if($tc == 'private' and $text == "." and $sting['sting']['onstart'] == "true" and $chat_id != $for and !in_array($chat_id,$sting['sting']['admins'])){
				bot("sendMessage",[
"chat_id"=>$for,
"text"=>"
دخل شخص للبوت  🚶🏻‍♂️
~~~~~~~~~~
اسمه ⬅️ <a href='tg://user?id=$from_id'>$name</a>
~~~~~~~~~~
معرفه ⬅️ <a href='tg://user?id=$from_id'>@$user</a>
~~~~~~~~~~~
ايديه ⬅️ <code>$from_id</code>
" ,
'parse_mode'=>'HTML'
]);
				}
	file_put_contents('members.txt',$from_id."\n",FILE_APPEND);
	}
if($tc == 'group' or $tc == 'supergroup' and !in_array($chat_id,$group)){
		file_put_contents('group.txt',$chat_id."\n",FILE_APPEND);
		}
if($text == "."){
	$ford = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['ford']);
	$onstart = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['onstart']);
	$bot = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['bot']);
	$tw = str_replace(['false','true'],['معطل ❎',' مفعل ✅'],$sting['sting']['tw']);
	if($chat_id == $for){
		bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"التوجيه $ford 🔄",'callback_data'=>'ford'],['text'=>"التنبيه $onstart 📣",'callback_data'=>'onstart']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"البوت $bot 🤖",'callback_data'=>"bot"],['text'=>"التواصل $tw 📞",'callback_data'=>'tw']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"إذاعة خاص 📣👤",'callback_data'=>'sendprofile'],['text'=>"إذاعة جروبات 📣👥",'callback_data'=>"sendgroup"]
],
[
['text'=>"الأدمنة 👥⁦👮🏻‍♂️⁩",'callback_data'=>"admins"]
],
[
['text'=>"رفع مشرف ⁦👮🏻‍♂️⁩",'callback_data'=>"addadmin"],['text'=>"تنزيل مشرف ⁦👳🏻‍♂️⁩",'callback_data'=>"deladmin"]
],
[
['text'=>"قسم الإشتراك الإجباري 🔱 المجموعات 👥",'callback_data'=>'chg']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
		}elseif(in_array($chat_id,$sting['sting']['admins'])){
			bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"إذاعة خاص 📣👤",'callback_data'=>'sendprofile'],['text'=>"إذاعة جروبات 📣👥",'callback_data'=>"sendgroup"]
],
[
['text'=>"قسم الإشتراك الإجباري 🔱 المجموعات 👥",'callback_data'=>'chg']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
			}
	}
if($data == "back"){
	$ford = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['ford']);
	$onstart = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['onstart']);
	$bot = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['bot']);
	$tw = str_replace(['false','true'],['معطل ❎',' مفعل ✅'],$sting['sting']['tw']);
	if($chat_id == $for){
		bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"التوجيه $ford 🔄",'callback_data'=>'ford'],['text'=>"التنبيه $onstart 📣",'callback_data'=>'onstart']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"البوت $bot 🤖",'callback_data'=>"bot"],['text'=>"التواصل $tw 📞",'callback_data'=>'tw']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"إذاعة خاص 📣👤",'callback_data'=>'sendprofile'],['text'=>"إذاعة جروبات 📣👥",'callback_data'=>"sendgroup"]
],
[
['text'=>"الأدمنة 👥⁦👮🏻‍♂️⁩",'callback_data'=>"admins"]
],
[
['text'=>"رفع مشرف ⁦👮🏻‍♂️⁩",'callback_data'=>"addadmin"],['text'=>"تنزيل مشرف ⁦👳🏻‍♂️⁩",'callback_data'=>"deladmin"]
],
[
['text'=>"قسم الإشتراك الإجباري 🔱 المجموعات 👥",'callback_data'=>'chg']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
		}elseif(in_array($chat_id,$sting['sting']['admins'])){
			bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"إذاعة خاص 📣👤",'callback_data'=>'sendprofile'],['text'=>"إذاعة جروبات 📣👥",'callback_data'=>"sendgroup"]
],
[
['text'=>"قسم الإشتراك الإجباري 🔱 المجموعات 👥",'callback_data'=>'chg']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
			}
	}
if($chat_id == $for or in_array($chat_id,$sting['sting']['admins'])){
	if($data == 'ford' or $data == 'onstart' or $data == 'bot' or $data == 'tw'){
		$a = str_replace(['ford','onstart','bot','tw'],['التوجيه 🔄','التنبيه 📣','البوت 🤖','التواصل 📞'],$data);
		if($sting['sting'][$data] == "true"){
			$sting['sting'][$data] = "false";
			file_put_contents("sting.json",json_encode($sting));
			$b = "تعطيل ❎";
			}else{
				$sting['sting'][$data] = "true";
			file_put_contents("sting.json",json_encode($sting));
			$b = "تفعيل ✅";
				}
				bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"تم $b $a ❗", 
            'show_alert'=>true 
            ]); 
            $ford = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['ford']);
	$onstart = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['onstart']);
	$bot = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['bot']);
	$tw = str_replace(['false','true'],['معطل ❎',' مفعل ✅'],$sting['sting']['tw']);
            if($chat_id == $for){
		bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"التوجيه $ford 🔄",'callback_data'=>'ford'],['text'=>"التنبيه $onstart 📣",'callback_data'=>'onstart']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"البوت $bot 🤖",'callback_data'=>"bot"],['text'=>"التواصل $tw 📞",'callback_data'=>'tw']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"إذاعة خاص 📣👤",'callback_data'=>'sendprofile'],['text'=>"إذاعة جروبات 📣👥",'callback_data'=>"sendgroup"]
],
[
['text'=>"الأدمنة 👥⁦👮🏻‍♂️⁩",'callback_data'=>"admins"]
],
[
['text'=>"رفع مشرف ⁦👮🏻‍♂️⁩",'callback_data'=>"addadmin"],['text'=>"تنزيل مشرف ⁦👳🏻‍♂️⁩",'callback_data'=>"deladmin"]
],
[
['text'=>"قسم الإشتراك الإجباري 🔱 المجموعات 👥",'callback_data'=>'chg']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
		}elseif(in_array($chat_id,$sting['sting']['admins'])){
			bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	أهلا بك ⁦🙋🏻‍♂️⁩ عزيزي الأدمن ⁦👨🏻‍🔧⁩
	يمكنك التحكم ⁦⚙️⁩ بكامل البوت من هنا 🦾
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قسم الإشتراك الإجباري 🔱 الخاص 👤",'callback_data'=>'ch']
],
[
['text'=>"الإحصائيات 📊",'callback_data'=>'km']
],
[
['text'=>"قسم الحظر 🚫",'callback_data'=>"band"]
],
[
['text'=>"إذاعة خاص 📣👤",'callback_data'=>'sendprofile'],['text'=>"إذاعة جروبات 📣👥",'callback_data'=>"sendgroup"]
],
[
['text'=>"قسم الإشتراك الإجباري 🔱 المجموعات 👥",'callback_data'=>'chg']
],
]])
	]);
	$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
			}
		}
		if($data == "km"){
		$band = count($sting['sting']['band']);
		$ford = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['ford']);
	$onstart = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['onstart']);
	$bot = str_replace(['false','true'],['معطل ❎','مفعل ✅'],$sting['sting']['bot']);
	$tw = str_replace(['false','true'],['معطل ❎',' مفعل ✅'],$sting['sting']['tw']);
	$m = count($members) -1;
	$g = count($group) -1;
	$d = count($day)-1;
		bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"إحصائيات البوت كالتالي 🤖:
عدد الأعضاء 👤 «".$m."»
عدد المجموعات 👥 :«".$g."»
عدد المتفاعلين اليوم : «".$d."»
عدد المحظورين 📛 : «".$band."»
التوجيه 🔄 : «".$ford."»
التنبيه 📣 : «".$onstart."»
البوت 🤖 : «".$bot."»
التواصل 📞 : «".$tw."»
", 
            'show_alert'=>true 
            ]); 
		}
		if($data == "sendprofile"){
			            bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
قم بإرسال أي شيء لأرسله لجميع الأعضاء 📣
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"back"]
],
]])
]);
$sting['sting']['sting'] = 'send';
$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting));
			}
			if(!$data and $sting['sting']['sting'] == 'send' and $sting['sting']['id'] == $from_id){
				foreach($members as $ASEEL){
					if($text)
bot('sendMessage', [
'chat_id'=>$ASEEL,
'text'=>"$text",
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($photo)
bot('sendphoto', [
'chat_id'=>$ASEEL,
'photo'=>$photo_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video)
bot('Sendvideo',[
'chat_id'=>$ASEEL,
'video'=>$video_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video_note)
bot('Sendvideonote',[
'chat_id'=>$ASEEL,
'video_note'=>$video_note_id,
]);
if($sticker)
bot('Sendsticker',[
'chat_id'=>$ASEEL,
'sticker'=>$sticker_id,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($file)
bot('SendDocument',[
'chat_id'=>$ASEEL,
'document'=>$file_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($music)
bot('Sendaudio',[
'chat_id'=>$ASEEL,
'audio'=>$music_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($voice)
bot('Sendvoice',[
'chat_id'=>$ASEEL,
'voice'=>$voice_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
					}
					bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تمت الإذاعة بنجاح ✅
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
				}
				if($data == "sendgroup"){
			            bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
قم بإرسال أي شيء لأرسله لجميع الأعضاء 📣
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"back"]
],
]])
]);
$sting['sting']['sting'] = 'group';
$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting));
			}
			if(!$data and $sting['sting']['sting'] == 'group' and $sting['sting']['id'] == $from_id){
				foreach($group as $ASEEL){
					if($text)
bot('sendMessage', [
'chat_id'=>$ASEEL,
'text'=>"$text",
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($photo)
bot('sendphoto', [
'chat_id'=>$ASEEL,
'photo'=>$photo_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video)
bot('Sendvideo',[
'chat_id'=>$ASEEL,
'video'=>$video_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video_note)
bot('Sendvideonote',[
'chat_id'=>$ASEEL,
'video_note'=>$video_note_id,
]);
if($sticker)
bot('Sendsticker',[
'chat_id'=>$ASEEL,
'sticker'=>$sticker_id,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($file)
bot('SendDocument',[
'chat_id'=>$ASEEL,
'document'=>$file_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($music)
bot('Sendaudio',[
'chat_id'=>$ASEEL,
'audio'=>$music_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($voice)
bot('Sendvoice',[
'chat_id'=>$ASEEL,
'voice'=>$voice_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
					}
					bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تمت الإذاعة بنجاح ✅
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
				}
				if($data == "ch" or $data == "ch1del" or $data == "ch2del"){
					if($data == "ch1del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 1 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['ch1']);
						}
						if($data == "ch2del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 2 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['ch2']);
						}
					if($sting['sting']['ch1'] == null){
						$ch1 = "قناة 1 🔱 لا يوجد 😴";
						}else{
							$ch3 = bot('getchat',['chat_id'=>$sting['sting']['ch1']]);
							if($ch3->ok == true){
								$ch1 = $ch3->result->title;
								}else{
									$ch1 = "قناة 1 🔱 لا يوجد 😴";
									}
							}
							if($sting['sting']['ch2'] == null){
						$ch2 = "قناة 2 🔱 لا يوجد 🌚";
						}else{
							$ch = bot('getchat',['chat_id'=>$sting['sting']['ch2']]);
							if($ch->ok == true){
								$ch2 = $ch->result->title;
								}else{
									$ch2 = "قناة 2 🔱 لا يوجد 🌚";
									}
							}
					bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
إليك أوامر الإشتراك الإجباري 😼
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"$ch1",'callback_data'=>"ch"]
],
[
['text'=>"وضع قناة 👌",'callback_data'=>"ch1add"],['text'=>"حذف قناة 🤟",'callback_data'=>"ch1del"]
],
[
['text'=>"$ch2",'callback_data'=>"ch"]
],
[
['text'=>"وضع قناة 😼",'callback_data'=>"ch2add"],['text'=>"حذف قناة 🤙",'callback_data'=>"ch2del"]
],
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
					}
					if($data == "ch1add" or $data == "ch2add"){
						bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الأن معرف القناة Ⓜ️ او وجه أي رسالة من القناة 🔄
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"ch"]
]
]])
]);
if($data == "ch1add"){
$sting['sting']['sting'] = "ch1";
}else{
	$sting['sting']['sting'] = "ch2";
	}
	$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting));
						}
						if(!$data and $sting['sting']['sting'] == 'ch1' or $sting['sting']['sting'] == 'ch2' and $sting['sting']['id'] == $from_id and $update->message->forward_from_chat or preg_match("/(@)(.)/", $text)){
							if($sting['sting']['sting'] == 'ch1' or $sting['sting']['sting'] == 'ch2'){
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم حفظ القناة بنجاح ✅
	تأكد أن البوت مشرف في القناة ⁦👮🏻‍♂️⁩
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'ch']
],
]])
]);
if($update->message->forward_from_chat){
	$sting['sting'][$sting['sting']['sting']] = $update->message->forward_from_chat->id;
	}else{
		$sting['sting'][$sting['sting']['sting']] = $text;
		}
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
							}
							}
	if($data == "admins"){
		foreach($sting['sting']['admins'] as $admins){
		$names = bot("getchat",["chat_id"=>$admins])->result->first_name;
		if($names != null){
		$addmins .= "[$names](tg://user?id=$admins)\n";
		}
		}
		bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	تفضل عزيزي الأدمن ⁦👮🏻‍♂️⁩ قائمة الأدمنة 📃
	$addmins
",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
		}
		if($data == "chg" or $data == "chg1del" or $data == "chg2del"){
			if($data == "chg1del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 1 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['chg1']);
						}
						if($data == "chg2del"){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 2 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($sting['sting']['chg2']);
						}
					if($sting['sting']['chg1'] == null){
						$chg1 = "قناة 1 🔱 لا يوجد 😴";
						}else{
							$chg3 = bot('getchat',['chat_id'=>$sting['sting']['chg1']]);
							if($chg3->ok == true){
								$chg1 = $chg3->result->title;
								}else{
									$chg1 = "قناة 1 🔱 لا يوجد 😴";
									}
							}
							if($sting['sting']['chg2'] == null){
						$chg2 = "قناة 2 🔱 لا يوجد 🌚";
						}else{
							$chg = bot('getchat',['chat_id'=>$sting['sting']['chg2']]);
							if($chg->ok == true){
								$chg2 = $chg->result->title;
								}else{
									$chg2 = "قناة 2 🔱 لا يوجد 🌚";
									}
							}
					bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
إليك أوامر الإشتراك الإجباري 😼
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"$chg1",'callback_data'=>"chg"]
],
[
['text'=>"وضع قناة 👌",'callback_data'=>"chg1add"],['text'=>"حذف قناة 🤟",'callback_data'=>"chg1del"]
],
[
['text'=>"$chg2",'callback_data'=>"chg"]
],
[
['text'=>"وضع قناة 😼",'callback_data'=>"chg2add"],['text'=>"حذف قناة 🤙",'callback_data'=>"chg2del"]
],
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
					}
					if($data == "chg1add" or $data == "chg2add"){
						bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الأن معرف القناة Ⓜ️ او وجه أي رسالة من القناة 🔄
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"chg"]
]
]])
]);
if($data == "chg1add"){
$sting['sting']['sting'] = "chg1";
}else{
	$sting['sting']['sting'] = "chg2";
	}
	$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting));
						}
						if(!$data and $sting['sting']['sting'] == 'chg1' or $sting['sting']['sting'] == 'chg2' and $sting['sting']['id'] == $from_id and $update->message->forward_from_chat or preg_match("/(@)(.)/", $text)){
							if($sting['sting']['sting'] == 'chg1' or $sting['sting']['sting'] == 'chg2')
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم حفظ القناة بنجاح ✅
	تأكد أن البوت مشرف في القناة ⁦👮🏻‍♂️⁩.
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'chg']
],
]])
]);
if($sting['sting']['sting'] != null){
if($update->message->forward_from_chat){
	$sting['sting'][$sting['sting']['sting']] = $update->message->forward_from_chat->id;
	}else{
		$sting['sting'][$sting['sting']['sting']] = $text;
		}
		}
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
							}
							if($data == "band"){
								$band = count($sting['sting']['band']);
								bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
إليك أوامر الحظر 🤟
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"المحظورين 📛  «".$band."»",'callback_data'=>"bander"]
],
[
['text'=>"حظر ➕⛔",'callback_data'=>"bandadd"],['text'=>"إلغاء حظر ➖⛔",'callback_data'=>"delband"]
],
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
$sting['sting']['sting'] = null;
	$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
								}
								if($data == "bandadd" or $data == "delband"){
									$a = str_replace(['bandadd','delband'],['لأحظره من البوت 📛','لأزيله من المحظورين 😃'],$data);
									bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الان ايدي 🆔 الشخص $a 
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"band"]
],
]])
]);
$sting['sting']['sting'] = $data;
$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting));
									}
									if(!$update->callback_query){
						if($text != null and $sting['sting']['sting'] == "bandadd" or $sting['sting']['sting'] == "delband" and $sting['sting']['id'] == $from_id){
							$a = str_replace(['bandadd','delband'],['حظره بنجاح 😏','إلغاء حظره بنجاح 😴'],$sting['sting']['sting']);
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم $a
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'band']
],
]])
]);

if($sting['sting']['sting'] == "bandadd"){
	$sting['sting']['band'][] = $text;
	}else{
		foreach($sting['sting']['band'] as $num => $json){
			if($json == $text){
		unset($sting['sting']['band'][$num]);
		brek;
		}
		}
		}
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
							}
							}
							if($data == "bander"){
								foreach($sting['sting']['band'] as $band){
									if($band != null){
									$s .= "`$band` » [للدخول إلى الحساب 🍃](tg://user?id=$band)\n";
									}
}
								bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
إليك قائمة المحظورين 📛
$s
",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"band"]
],
]])
]);
								}
								if($data == "addadmin" or $data == "deladmin"){
									$a = str_replace(['addadmin','deladmin'],['لأرفعه أدمن ⁦☺️⁩','لأزيله من قائمة الأدمنة 😼'],$data);
									bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الان ايدي 🆔 الشخص $a 
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"back"]
],
]])
]);
$sting['sting']['sting'] = $data;
$sting['sting']['id'] = $from_id;
	file_put_contents("sting.json",json_encode($sting));

									}
									if(!$update->callback_query){
						if($text != null and $sting['sting']['sting'] == "addadmin" or $sting['sting']['sting'] == "deladmin" and $sting['sting']['id'] == $from_id){
							$a = str_replace(['addadmin','deladmin'],['تم رفعه بنجاح 😉','تم تنزيله بنجاح 😏'],$sting['sting']['sting']);
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم $a
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'back']
],
]])
]);
if($sting['sting']['sting'] == "addadmin"){
	$sting['sting']['admins'][] = $text;
	bot('sendmessage',[
	'chat_id'=>$text, 
	'text'=>"
	مبارك تم رفعك كمشرف في البوت 🤩
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'القائمة الرئيسية 🏠','callback_data'=>'back']
],
]])
]);
	}else{
		foreach($sting['sting']['admins'] as $num => $json){
			if($json == $text){
		unset($sting['sting']['admins'][$num]);
		bot('sendmessage',[
	'chat_id'=>$text, 
	'text'=>"
	تم تنزيلك من الإشراف 😒
	",
]);
		break;
		}
		}
		}
					$sting['sting']['sting'] = null;
					$sting['sting']['id'] = null;
	file_put_contents("sting.json",json_encode($sting));
							}
							}
		}
