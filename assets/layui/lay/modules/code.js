
 
layui.define('jquery', function(exports){
  "use strict";
  
  var $ = layui.$;
  
  exports('code', function(options){
    var elems = [];
    options = options || {};
    options.elem = $(options.elem||'.layui-code');
    options.lang = 'lang' in options ? options.lang : 'code';
    
    options.elem.each(function(){
      elems.push(this);
    });
    
    layui.each(elems.reverse(), function(index, item){
      var othis = $(item), html = othis.html();
      
      //杞箟HTML鏍囩
      if(othis.attr('lay-encode') || options.encode){
        html = html.replace(/&(?!#?[a-zA-Z0-9]+;)/g, '&amp;')
        .replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/'/g, '&#39;').replace(/"/g, '&quot;')
      }
      
      othis.html('<ol class="layui-code-ol"><li>' + html.replace(/[\r\t\n]+/g, '</li><li>') + '</li></ol>')
      
      if(!othis.find('>.layui-code-h3')[0]){
        othis.prepend('<h3 class="layui-code-h3">'+ (othis.attr('lay-title')||options.title||'&lt;/&gt;') + '<a href="javascript:;">'+ (othis.attr('lay-lang')||options.lang||'') +'</a>' + '</h3>');
      }
      
      var ol = othis.find('>.layui-code-ol');
      othis.addClass('layui-box layui-code-view');
      
      //璇嗗埆鐨偆
      if(othis.attr('lay-skin') || options.skin){
        othis.addClass('layui-code-' +(othis.attr('lay-skin') || options.skin));
      }
      
      //鎸夎鏁伴€傞厤宸﹁竟璺�
      if((ol.find('li').length/100|0) > 0){
        ol.css('margin-left', (ol.find('li').length/100|0) + 'px');
      }
      
      //璁剧疆鏈€澶ч珮搴�
      if(othis.attr('lay-height') || options.height){
        ol.css('max-height', othis.attr('lay-height') || options.height);
      }

    });
    
  });
}).addcss('modules/code.css?v=2', 'skincodecss');
