<? 
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');

$config=array(
'kfqq'=>'418174852',//客服QQ
'siteurl'=>($_SERVER['SERVER_PORT']=='443'?'https://':'http://').$_SERVER['HTTP_HOST'],
'sitename'=>'恒客祛水印', //网站简称
'title'=>'某某祛水印-快手抖音在线去水印 - 快手去水印,抖音去水印,短视频去水印解析', //网站标题
'keywords'=>'快手抖音等视频水印去除,快手去水印,抖音去水印,短视频去水印解析', //网站关键词
'description'=>'某某祛水印,抖音快手皮皮虾等多个短视频平台在线免费去水印解析下载，永久免费、速度快、去视频水印、去封面水印，致力提供全网最优质的去水印解析服务！', //网站描述
    );
include_once ROOT."includes/functions.php";

$Android_url='https://lanzoui.com/ilXR50uj6dod';//蓝奏云安卓APP链接
$Android_pwd='';//蓝奏云安卓APP密码，没有请留空
$Ios_url='https://lanzouq.com/ilXR50uj6dod';//蓝奏云苹果APP链接
$Ios_pwd='';//蓝奏云苹果APP密码，没有请留空

$ip=real_ip(2);
//0 极易被伪造IP，1 在网站使用CDN的情况下选择此项，在不使用CDN的情况下也会被伪造，2 直接获取真实请求IP，无法被伪造，但可能获取到的是CDN节点IP