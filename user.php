<? //千山万水总是情，留个版权行不行，@远昔博客 yuanxiblog.cn
include_once('./includes/config.php');
$url=$_GET['url'];
$file=file_name($url); if($file==null){ exit(include_once('./404.php')); }
if(file_exists($file)){ $user=@json_decode(file_get_contents($file),true); }
if($user==null||!is_array($user)){   swal(2,'系统提示','解析错误，请您返回重新解析试下!','知道了','./');  }
$images=$user['images'];
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
     <meta name="referrer"  content="no-referrer" />
    
    <title><?=$user['desc'].' - '.$config['sitename']?></title>
    <link rel="stylesheet" href="./assets/layui/css/layui.css">
    <link href="./assets/user/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/user/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/user/css/main.css">
    <link rel="stylesheet" href="./assets/user/css/oneui.css">

</head>

<body><br>

<style>body { background: linear-gradient(to right, #2F4F4F, #483D8B) fixed; }</style>

<div class="col-xs-12 col-sm-10 col-md-8 col-lg-5 center-block" style="float: none;">
<div class="widget">

<div class="widget-content themed-background-flat text-center" style="background-image:url(./assets/user/head.png);background-size: 100% 100%;">

<a href="javascript:void(0)">
<img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?=$config['kfqq']?>&spec=100" alt="Avatar" width="80" style="height: auto filter: alpha(Opacity=80);-moz-opacity: 0.80;opacity: 0.80;" class="img-circle img-thumbnail img-thumbnail-avatar-1x animated zoomInDown"></a>
            </div>
<img src="./assets/img/app.png" width="100%" onclick="app()">

	<div class="widget-content themed-background-muted text-center">
<div class="btn-group themed-background-muted ">

<span class="btn btn-effect-ripple btn-default"><i class="fa fa-tags"></i><b><?=$user['name']?></b></span>
<span class="btn btn-effect-ripple btn-default"><i class="fa fa-eye"></i><b><?=$user['type']?></b></span>
<span class="btn btn-effect-ripple btn-default"><i class="fa fa-calendar"></i><b><?=date('Y-m-d',strtotime($user['date']))?></b></span></center>
</div>
</div>
</div>
  

        
        <div class="block full2">
            <!--TAB标签开始-->
            <div class="block-title">
<ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
<li style="width: 50%;" align="center" class="active"><a href="#yx_1" data-toggle="tab"><span style="font-weight:bold"><i class="fa fa-video-camera" ></i> <?=$user['name']?><?=$user['type']?></span></a></li>
<li style="width: 50%;" align="center"><a href="#yx_2" data-toggle="tab"><span style="font-weight:bold"><i class="fa fa-comments"></i> 站长留言</span></a></li>

                </ul>
            </div>
            <!--TAB标签结束-->
            
                  <div class="alert alert-warning alert-dismissable text-center">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" style="color: black"><i class="fa fa-times-circle"></i></span></button>
<a style="color:red;">请熟记本平台永久网址<i class="layui-icon layui-icon-next"></i><i class="layui-icon layui-icon-next"></i><a href="<?=$config['siteurl']?>" target="_blank"><font color=blue><b><?=$config['siteurl']?></b></a></font></font></div>

            
<div class="tab-content">
<div class="tab-pane active" id="yx_1">

<?  if(strpos($user['type'],'视频')!==false){ ?>
<div class="form-group"><div class="input-group">
<div class="input-group-addon"><i class="fa fa-vimeo"></i> 视频地址</div>
<? if($user['video']){ ?>
<input type="text" class="form-control" value="<?=$user['video']?>" id="qsy_url" download="<?=$user['video']?>" onclick="copy( $('#qsy_url').val() )">
<span class="input-group-btn"><a class="btn btn-default" href="<?=$user['video']?>" rel="noreferrer" id="chakan"target="_blank">查看视频</a></span>
 <?}else{?><input type="text"  class="form-control" value="获取失败"disabled><?}?>
</div>

<? if(mobile()=='电脑'){?>
<pre><i class="layui-icon layui-icon-windows"></i>电脑用户：点击查看视频后，一般右下角有下载或另存为的按钮</pre>
<? }if(mobile()=='安卓'){?>
<pre><i class="layui-icon layui-icon-android"></i>安卓用户：建议使用UC、360等浏览器使用本站方便下载视频</pre>
<? }if(mobile()=='苹果'){?>
<pre><i class="layui-icon layui-icon-ios"></i>苹果用户：<button onclick="ios_course()" class="layui-btn layui-btn-xs"><i class="layui-icon layui-icon-next"></i>点我查看视频下载教程<i class="layui-icon layui-icon-prev"></i></button></pre><?}?>
</div><?}?>


<div class="input-group">
<span class="input-group-addon"><i class="layui-icon layui-icon-picture"></i> 封面图片</span>
<? if($user['cover']){ ?><img src="<?=$user['cover']?>" width="100%" height="80px" class="LightGallery_YX"lg-data-src="<?=$user['cover']?>">
<?}else{?><input type="text"  class="form-control" value="获取失败"disabled><?}?>
</div><br>

<? if(strpos($user['type'],'图集')!==false && $images[0]!=null){ ?>
<div class="input-group">
<span class="input-group-addon"><i class="layui-icon layui-icon-carousel"></i> 图集列表</span>
<? foreach($images as $row){?><img src="<?=$row?>" width="25%" height="80px" class="LightGallery_YX"lg-data-src="<?=$row?>"> <?}?>
</div><pre><i class="layui-icon layui-icon-speaker"></i>小提示：点击图片即可放大查看并保存图片</pre>
<?}?>


<div class="input-group">
<span class="input-group-addon"><i class="layui-icon layui-icon-headset"></i> 描述文案</span>
<? if($user['desc']){?><input type="text" id="desc" class="form-control" value="<?=$user['desc']?>" onclick="copy( $('#desc').val() )">
<span class="input-group-btn"><button class="btn btn-default" data-clipboard-target="#desc">复制</button></span>
<?}else{?><input type="text"  class="form-control" value="获取失败"disabled><?}?>
</div><br>

<div class="input-group">
<span class="input-group-addon"><i class="layui-icon layui-icon-note"></i> 作品类型</span>
<input type="text" class="form-control" value="<?=($user['type']!=null?$user['type']:'未知')?>"disabled>
</div><br>

<div class="input-group">
<span class="input-group-addon"><i class="fa fa-ge"></i> APP名称</span>
<input type="text" class="form-control" value="<?=($user['name']!=null?$user['name']:'未知')?>"disabled>
</div><br>

</div>

<div class="tab-pane" id="yx_2">
    
  		<table class="table table-borderless table-pricing">
            <tbody>
                
<tr class="active"><td>
<div align="center">
    
<div class="layui-card"><p><span><i class="layui-icon layui-icon-speaker"></i>运营需要成本，觉得好用的话，记得帮忙宣传推广一下，请不要让本站亏本跑路，谢谢支持！</span></p></div>

<div class="layui-card"><p><span><i class="layui-icon layui-icon-speaker"></i>建议截图保存下方二维码，方便以后直接扫码进入本平台！</span></p></div>

<div class="layui-card"><p><img src="https://yuanxiapi.cn/api/tgimg/?id=1&url=<?=get_url()?>&text=快手抖音皮皮虾等各种祛水印&text2=聚合短视频祛水印，永久免费&name=<?=$config['sitename']?>" width="50%"></p></div>

<button type="button" style="width:49%; margin: 0;" class="layui-btn layui-btn-fluid layui-btn-normal layui-btn-radius" onclick="copy('<?=get_url()?>')"><i class="layui-icon layui-icon-file"></i>复制链接</button>

<button type="button" style="width:49%; margin: 0;" class="layui-btn layui-btn-fluid layui-btn-normal  layui-btn-radius" onclick="app()"><i class="layui-icon layui-icon-app"></i>下载APP</button>

</div>

<tr><td class="text-muted">
<small><em>* <?=$config['sitename']?> <i class="fa fa-arrows-h"></i> <?=get_host()?>
<br>原作品链接：<?=$user['url']?></em></small>
</td></tr>

</tbody></table>
 
</div>
</div>

<div class="btn-group btn-group-justified form-group">
<a class="btn btn-block btn-success btn-rounded" href="./"><i class="fa fa-home sidebar-nav-icon"></i>返回首页</a>
<a class="btn btn-block btn-primary btn-rounded" id="cxjx" onclick="cx_jiexi()"><i class="fa fa-repeat"></i>重新解析</a></div>
            
        </div>

<center><li class="list-group-item">
<b style="text-shadow: LightSteelBlue 1px 0px 0px;">
<span style="font-weight:bold">
<?  if(strpos($user['type'],'视频')!==false){ ?>如果去水印视频加载不出来或打不开，请重新解析视频再试下！<br><?}?>
视频版权归相关网站及作者所有，<?=$config['sitename']?>不存储任何视频及图片<br>
</span></b>
</li></center></div>

<script src="./assets/user/js/jquery.min.js"></script>
<script src="./assets/user/js/bootstrap.min.js"></script>

<? include_once('./includes/js.php');?>