!function(e){var t="Close",i="BeforeClose",s="AfterClose",n="BeforeAppend",a="MarkupParse",o="Open",r="Change",c="mfp",l="."+c,d="mfp-ready",p="mfp-removing",h="mfp-prevent-close",u,f=function(){},m=!!window.jQuery,g,v=e(window),y,k,b,C,w,P=function(e,t){u.ev.on(c+e+l,t)},I=function(t,i,s,n){var a=document.createElement("div");return a.className="mfp-"+t,s&&(a.innerHTML=s),n?i&&i.appendChild(a):(a=e(a),i&&a.appendTo(i)),a},_=function(t,i){u.ev.triggerHandler(c+t,i),u.st.callbacks&&(t=t.charAt(0).toLowerCase()+t.slice(1),u.st.callbacks[t]&&u.st.callbacks[t].apply(u,e.isArray(i)?i:[i]))},x=function(t){return t===w&&u.currTemplate.closeBtn||(u.currTemplate.closeBtn=e(u.st.closeMarkup.replace("%title%",u.st.tClose)),w=t),u.currTemplate.closeBtn},T=function(){e.magnificPopup.instance||(u=new f,u.init(),e.magnificPopup.instance=u)},S=function(){var e=document.createElement("p").style,t=["ms","O","Moz","Webkit"];if(void 0!==e.transition)return!0;for(;t.length;)if(t.pop()+"Transition"in e)return!0;return!1};f.prototype={constructor:f,init:function(){var t=navigator.appVersion;u.isIE7=-1!==t.indexOf("MSIE 7."),u.isIE8=-1!==t.indexOf("MSIE 8."),u.isLowIE=u.isIE7||u.isIE8,u.isAndroid=/android/gi.test(t),u.isIOS=/iphone|ipad|ipod/gi.test(t),u.supportsTransition=S(),u.probablyMobile=u.isAndroid||u.isIOS||/(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent),k=e(document),u.popupsCache={}},open:function(t){y||(y=e(document.body));var i;if(!1===t.isObj){u.items=t.items.toArray(),u.index=0;var s=t.items,n;for(i=0;i<s.length;i++)if(n=s[i],n.parsed&&(n=n.el[0]),n===t.el[0]){u.index=i;break}}else u.items=e.isArray(t.items)?t.items:[t.items],u.index=t.index||0;if(u.isOpen)return void u.updateItemHTML();u.types=[],C="",t.mainEl&&t.mainEl.length?u.ev=t.mainEl.eq(0):u.ev=k,t.key?(u.popupsCache[t.key]||(u.popupsCache[t.key]={}),u.currTemplate=u.popupsCache[t.key]):u.currTemplate={},u.st=e.extend(!0,{},e.magnificPopup.defaults,t),u.fixedContentPos="auto"===u.st.fixedContentPos?!u.probablyMobile:u.st.fixedContentPos,u.st.modal&&(u.st.closeOnContentClick=!1,u.st.closeOnBgClick=!1,u.st.showCloseBtn=!1,u.st.enableEscapeKey=!1),u.bgOverlay||(u.bgOverlay=I("bg").on("click"+l,function(){u.close()}),u.wrap=I("wrap").attr("tabindex",-1).on("click"+l,function(e){u._checkIfClose(e.target)&&u.close()}),u.container=I("container",u.wrap)),u.contentContainer=I("content"),u.st.preloader&&(u.preloader=I("preloader",u.container,u.st.tLoading));var r=e.magnificPopup.modules;for(i=0;i<r.length;i++){var c=r[i];c=c.charAt(0).toUpperCase()+c.slice(1),u["init"+c].call(u)}_("BeforeOpen"),u.st.showCloseBtn&&(u.st.closeBtnInside?(P(a,function(e,t,i,s){i.close_replaceWith=x(s.type)}),C+=" mfp-close-btn-in"):u.wrap.append(x())),u.st.alignTop&&(C+=" mfp-align-top"),u.fixedContentPos?u.wrap.css({overflow:u.st.overflowY,overflowX:"hidden",overflowY:u.st.overflowY}):u.wrap.css({top:v.scrollTop(),position:"absolute"}),(!1===u.st.fixedBgPos||"auto"===u.st.fixedBgPos&&!u.fixedContentPos)&&u.bgOverlay.css({height:k.height(),position:"absolute"}),u.st.enableEscapeKey&&k.on("keyup"+l,function(e){27===e.keyCode&&u.close()}),v.on("resize"+l,function(){u.updateSize()}),u.st.closeOnContentClick||(C+=" mfp-auto-cursor"),C&&u.wrap.addClass(C);var p=u.wH=v.height(),h={};if(u.fixedContentPos&&u._hasScrollBar(p)){var f=u._getScrollbarSize();f&&(h.marginRight=f)}u.fixedContentPos&&(u.isIE7?e("body, html").css("overflow","hidden"):h.overflow="hidden");var m=u.st.mainClass;return u.isIE7&&(m+=" mfp-ie7"),m&&u._addClassToMFP(m),u.updateItemHTML(),_("BuildControls"),e("html").css(h),u.bgOverlay.add(u.wrap).prependTo(u.st.prependTo||y),u._lastFocusedEl=document.activeElement,setTimeout(function(){u.content?(u._addClassToMFP(d),u._setFocus()):u.bgOverlay.addClass(d),k.on("focusin"+l,u._onFocusIn)},16),u.isOpen=!0,u.updateSize(p),_(o),t},close:function(){u.isOpen&&(_(i),u.isOpen=!1,u.st.removalDelay&&!u.isLowIE&&u.supportsTransition?(u._addClassToMFP(p),setTimeout(function(){u._close()},u.st.removalDelay)):u._close())},_close:function(){_(t);var i=p+" "+d+" ";if(u.bgOverlay.detach(),u.wrap.detach(),u.container.empty(),u.st.mainClass&&(i+=u.st.mainClass+" "),u._removeClassFromMFP(i),u.fixedContentPos){var n={marginRight:""};u.isIE7?e("body, html").css("overflow",""):n.overflow="",e("html").css(n)}k.off("keyup.mfp focusin"+l),u.ev.off(l),u.wrap.attr("class","mfp-wrap").removeAttr("style"),u.bgOverlay.attr("class","mfp-bg"),u.container.attr("class","mfp-container"),u.st.showCloseBtn&&(!u.st.closeBtnInside||!0===u.currTemplate[u.currItem.type])&&u.currTemplate.closeBtn&&u.currTemplate.closeBtn.detach(),u._lastFocusedEl&&e(u._lastFocusedEl).focus(),u.currItem=null,u.content=null,u.currTemplate=null,u.prevHeight=0,_(s)},updateSize:function(e){if(u.isIOS){var t=document.documentElement.clientWidth/window.innerWidth,i=window.innerHeight*t;u.wrap.css("height",i),u.wH=i}else u.wH=e||v.height();u.fixedContentPos||u.wrap.css("height",u.wH),_("Resize")},updateItemHTML:function(){var t=u.items[u.index];u.contentContainer.detach(),u.content&&u.content.detach(),t.parsed||(t=u.parseEl(u.index));var i=t.type;if(_("BeforeChange",[u.currItem?u.currItem.type:"",i]),u.currItem=t,!u.currTemplate[i]){var s=!!u.st[i]&&u.st[i].markup;_("FirstMarkupParse",s),u.currTemplate[i]=!s||e(s)}b&&b!==t.type&&u.container.removeClass("mfp-"+b+"-holder");var n=u["get"+i.charAt(0).toUpperCase()+i.slice(1)](t,u.currTemplate[i]);u.appendContent(n,i),t.preloaded=!0,_(r,t),b=t.type,u.container.prepend(u.contentContainer),_("AfterChange")},appendContent:function(e,t){u.content=e,e?u.st.showCloseBtn&&u.st.closeBtnInside&&!0===u.currTemplate[t]?u.content.find(".mfp-close").length||u.content.append(x()):u.content=e:u.content="",_(n),u.container.addClass("mfp-"+t+"-holder"),u.contentContainer.append(u.content)},parseEl:function(t){var i=u.items[t],s;if(i.tagName?i={el:e(i)}:(s=i.type,i={data:i,src:i.src}),i.el){for(var n=u.types,a=0;a<n.length;a++)if(i.el.hasClass("mfp-"+n[a])){s=n[a];break}i.src=i.el.attr("data-mfp-src"),i.src||(i.src=i.el.attr("href"))}return i.type=s||u.st.type||"inline",i.index=t,i.parsed=!0,u.items[t]=i,_("ElementParse",i),u.items[t]},addGroup:function(e,t){var i=function(i){i.mfpEl=this,u._openClick(i,e,t)};t||(t={});var s="click.magnificPopup";t.mainEl=e,t.items?(t.isObj=!0,e.off(s).on(s,i)):(t.isObj=!1,t.delegate?e.off(s).on(s,t.delegate,i):(t.items=e,e.off(s).on(s,i)))},_openClick:function(t,i,s){if((void 0!==s.midClick?s.midClick:e.magnificPopup.defaults.midClick)||2!==t.which&&!t.ctrlKey&&!t.metaKey){var n=void 0!==s.disableOn?s.disableOn:e.magnificPopup.defaults.disableOn;if(n)if(e.isFunction(n)){if(!n.call(u))return!0}else if(v.width()<n)return!0;t.type&&(t.preventDefault(),u.isOpen&&t.stopPropagation()),s.el=e(t.mfpEl),s.delegate&&(s.items=i.find(s.delegate)),u.open(s)}},updateStatus:function(e,t){if(u.preloader){g!==e&&u.container.removeClass("mfp-s-"+g),!t&&"loading"===e&&(t=u.st.tLoading);var i={status:e,text:t};_("UpdateStatus",i),e=i.status,t=i.text,u.preloader.html(t),u.preloader.find("a").on("click",function(e){e.stopImmediatePropagation()}),u.container.addClass("mfp-s-"+e),g=e}},_checkIfClose:function(t){if(!e(t).hasClass(h)){var i=u.st.closeOnContentClick,s=u.st.closeOnBgClick;if(i&&s)return!0;if(!u.content||e(t).hasClass("mfp-close")||u.preloader&&t===u.preloader[0])return!0;if(t===u.content[0]||e.contains(u.content[0],t)){if(i)return!0}else if(s&&e.contains(document,t))return!0;return!1}},_addClassToMFP:function(e){u.bgOverlay.addClass(e),u.wrap.addClass(e)},_removeClassFromMFP:function(e){this.bgOverlay.removeClass(e),u.wrap.removeClass(e)},_hasScrollBar:function(e){return(u.isIE7?k.height():document.body.scrollHeight)>(e||v.height())},_setFocus:function(){(u.st.focus?u.content.find(u.st.focus).eq(0):u.wrap).focus()},_onFocusIn:function(t){if(t.target!==u.wrap[0]&&!e.contains(u.wrap[0],t.target))return u._setFocus(),!1},_parseMarkup:function(t,i,s){var n;s.data&&(i=e.extend(s.data,i)),_(a,[t,i,s]),e.each(i,function(e,i){if(void 0===i||!1===i)return!0;if(n=e.split("_"),n.length>1){var s=t.find(l+"-"+n[0]);if(s.length>0){var a=n[1];"replaceWith"===a?s[0]!==i[0]&&s.replaceWith(i):"img"===a?s.is("img")?s.attr("src",i):s.replaceWith('<img src="'+i+'" class="'+s.attr("class")+'" />'):s.attr(n[1],i)}}else t.find(l+"-"+e).html(i)})},_getScrollbarSize:function(){if(void 0===u.scrollbarSize){var e=document.createElement("div");e.id="mfp-sbm",e.style.cssText="width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;",document.body.appendChild(e),u.scrollbarSize=e.offsetWidth-e.clientWidth,document.body.removeChild(e)}return u.scrollbarSize}},e.magnificPopup={instance:null,proto:f.prototype,modules:[],open:function(t,i){return T(),t=t?e.extend(!0,{},t):{},t.isObj=!0,t.index=i||0,this.instance.open(t)},close:function(){return e.magnificPopup.instance&&e.magnificPopup.instance.close()},registerModule:function(t,i){i.options&&(e.magnificPopup.defaults[t]=i.options),e.extend(this.proto,i.proto),this.modules.push(t)},defaults:{disableOn:0,key:null,midClick:!1,mainClass:"",preloader:!0,focus:"",closeOnContentClick:!1,closeOnBgClick:!0,closeBtnInside:!0,showCloseBtn:!0,enableEscapeKey:!0,modal:!1,alignTop:!1,removalDelay:0,prependTo:null,fixedContentPos:"auto",fixedBgPos:"auto",overflowY:"auto",closeMarkup:'<button title="%title%" type="button" class="mfp-close">&times;</button>',tClose:"Close (Esc)",tLoading:"Loading..."}},e.fn.magnificPopup=function(t){T();var i=e(this);if("string"==typeof t)if("open"===t){var s,n=m?i.data("magnificPopup"):i[0].magnificPopup,a=parseInt(arguments[1],10)||0;n.items?s=n.items[a]:(s=i,n.delegate&&(s=s.find(n.delegate)),s=s.eq(a)),u._openClick({mfpEl:s},i,n)}else u.isOpen&&u[t].apply(u,Array.prototype.slice.call(arguments,1));else t=e.extend(!0,{},t),m?i.data("magnificPopup",t):i[0].magnificPopup=t,u.addGroup(i,t);return i};var O="inline",z,M,E,j=function(){E&&(M.after(E.addClass(z)).detach(),E=null)};e.magnificPopup.registerModule(O,{options:{hiddenClass:"hide",markup:"",tNotFound:"Content not found"},proto:{initInline:function(){u.types.push(O),P(t+"."+O,function(){j()})},getInline:function(t,i){if(j(),t.src){var s=u.st.inline,n=e(t.src);if(n.length){var a=n[0].parentNode;a&&a.tagName&&(M||(z=s.hiddenClass,M=I(z),z="mfp-"+z),E=n.after(M).detach().removeClass(z)),u.updateStatus("ready")}else u.updateStatus("error",s.tNotFound),n=e("<div>");return t.inlineElement=n,n}return u.updateStatus("ready"),u._parseMarkup(i,{},t),i}}});var B,V=function(){return void 0===B&&(B=void 0!==document.createElement("p").style.MozTransform),B};e.magnificPopup.registerModule("zoom",{options:{enabled:!1,easing:"ease-in-out",duration:300,opener:function(e){return e.is("img")?e:e.find("img")}},proto:{initZoom:function(){var e=u.st.zoom,s=".zoom",n;if(e.enabled&&u.supportsTransition){var a=e.duration,o=function(t){var i=t.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),s="all "+e.duration/1e3+"s "+e.easing,n={position:"fixed",zIndex:9999,left:0,top:0,"-webkit-backface-visibility":"hidden"},a="transition";return n["-webkit-"+a]=n["-moz-"+a]=n["-o-"+a]=n[a]=s,i.css(n),i},r=function(){u.content.css("visibility","visible")},c,l;P("BuildControls"+s,function(){if(u._allowZoom()){if(clearTimeout(c),u.content.css("visibility","hidden"),n=u._getItemToZoom(),!n)return void r();l=o(n),l.css(u._getOffset()),u.wrap.append(l),c=setTimeout(function(){l.css(u._getOffset(!0)),c=setTimeout(function(){r(),setTimeout(function(){l.remove(),n=l=null,_("ZoomAnimationEnded")},16)},a)},16)}}),P(i+s,function(){if(u._allowZoom()){if(clearTimeout(c),u.st.removalDelay=a,!n){if(!(n=u._getItemToZoom()))return;l=o(n)}l.css(u._getOffset(!0)),u.wrap.append(l),u.content.css("visibility","hidden"),setTimeout(function(){l.css(u._getOffset())},16)}}),P(t+s,function(){u._allowZoom()&&(r(),l&&l.remove(),n=null)})}},_allowZoom:function(){return"image"===u.currItem.type},_getItemToZoom:function(){return!!u.currItem.hasSize&&u.currItem.img},_getOffset:function(t){var i;i=t?u.currItem.img:u.st.zoom.opener(u.currItem.el||u.currItem);var s=i.offset(),n=parseInt(i.css("padding-top"),10),a=parseInt(i.css("padding-bottom"),10);s.top-=e(window).scrollTop()-n;var o={width:i.width(),height:(m?i.innerHeight():i[0].offsetHeight)-a-n};return V()?o["-moz-transform"]=o.transform="translate("+s.left+"px,"+s.top+"px)":(o.left=s.left,o.top=s.top),o}}}),T()}(window.jQuery||window.Zepto),jQuery(document).ready(function($){$("input.kad-widget-colorpicker").wpColorPicker()}),jQuery(document).on("panelsopen",function(){jQuery("input.kad-widget-colorpicker").wpColorPicker()}),jQuery(document).on("widget-added",function(){jQuery("input.kad-widget-colorpicker").wpColorPicker()}),jQuery(document).on("widget-updated",function(){jQuery("input.kad-widget-colorpicker").wpColorPicker()}),jQuery(document).ready(function($){$("body").on("click",".kadence-generator-button",function(){$.magnificPopup.open({mainClass:"mfp-zoom-in kt-mfp-shortcode",items:{src:"#kadence-shortcode-innercontainer"},type:"inline"})}),$("input.kad-popup-colorpicker").wpColorPicker(),$("#kad-shortcode-insert").click(function(){var e=$("#kadence-shortcodes").val(),t="";if("columns"==e){var s="";$("#options-"+e+' input[type="radio"]').each(function(){"checked"==$(this).attr("checked")&&(s=$(this).attr("value"))}),t="[columns] ","span6"==s?(t+="[span6] ",t+="<p>add content here</p>",t+="[/span6]",t+="[span6] ",t+="<p>add content here</p>",t+="[/span6]"):"span4left"==s?(t+="[span4] ",t+="<p>add content here</p>",t+="[/span4]",t+="[span8] ",t+="<p>add content here</p>",t+="[/span8]"):"span4right"==s?(t+="[span8] ",t+="<p>add content here</p>",t+="[/span8]",t+="[span4] ",t+="<p>add content here</p>",t+="[/span4]"):"span4"==s?(t+="[span4] ",t+="<p>add content here</p>",t+="[/span4]",t+="[span4] ",t+="<p>add content here</p>",t+="[/span4]",t+="[span4] ",t+="<p>add content here</p>",t+="[/span4]"):"span3"==s&&(t+="[span3] ",t+="<p>add content here</p>",t+="[/span3]",t+="[span3] ",t+="<p>add content here</p>",t+="[/span3]",t+="[span3] ",t+="<p>add content here</p>",t+="[/span3]",t+="[span3] ",t+="<p>add content here</p>",t+="[/span3]"),t+="[/columns]"}else if("table"==e){var n=""!=$("#options-"+e+" .kad-sc-columns").attr("value")?parseInt($("#options-"+e+" .kad-sc-columns").val()):2,a=""!=$("#options-"+e+" .kad-sc-rows").attr("value")?parseInt($("#options-"+e+" .kad-sc-rows").val()):2,o="checked"==$("#options-"+e+" #head").attr("checked");if(t="<table>",o){t+="<thead>",t+="<tr>";var r=1;for(c=0;c<n;c++)t+="<th>Column "+r+"</th>",r++;t+="</tr>",t+="</thead>"}t+="<tbody>";var l=1;for(i=0;i<a;i++){t+="<tr>";var r=1;for(c=0;c<n;c++)t+="<td>Row "+l+", Column "+r+"</td>",r++;l++}t+="</tr>",t+="</tbody>",t+="</table>"}else if("tabs"==e)t="[tabs]",t+='[tab title="title1" start=open] <p>Put content here</p> [/tab]',t+='[tab title="title2"] <p>Put content here</p>[/tab]',t+='[tab title="title3"]<p>Copy and paste to create more</p>[/tab]',t+="[/tabs]";else if("accordion"==e)t="[accordion]",t+='[pane title="title1" start=open] <p>Put content here</p> [/pane]',t+='[pane title="title2"] <p>Put content here</p>[/pane]',t+='[pane title="title3"]<p>Copy and paste to create more</p>[/pane]',t+="[/accordion]";else if("pullquote"==e||"blockquote"==e){var d="",p="";$("#options-"+e+" select").each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("id")+'="'+$(this).attr("value")+'"')}),p=$("#options-"+e+" textarea.kad-sc-content").val(),t="["+e,t+=d,t+="]",t+="<p>"+p+"</p>",t+="[/"+e+"]"}else if("kt_box"==e){var d="",p="";$("#options-"+e+" select").each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("id")+'="'+$(this).attr("value")+'"')}),$("#options-"+e+' input[type="text"].attr').each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("data-attrname")+'="'+$(this).attr("value")+'"')}),$("#options-"+e+' input[type="text"].wp-color-picker').each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("data-attrname")+'="'+$(this).attr("value")+'"')}),$("#options-"+e+" input[type=checkbox]").each(function(){"checked"==$(this).attr("checked")&&(d+=" "+$(this).attr("data-attrname")+'="middle"')}),p=$("#options-"+e+" textarea.kad-sc-content").val(),t="["+e,t+=d,t+="]",t+="<p>"+p+"</p>",t+="[/"+e+"]"}else if("kad_modal"==e){var d="",p="";$("#options-"+e+" select").each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("id")+'="'+$(this).attr("value")+'"')}),$("#options-"+e+' input[type="text"]').each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("data-attrname")+'="'+$(this).attr("value")+'"')}),$("#options-"+e+' input[type="text"].wp-color-picker').each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("data-attrname")+'="'+$(this).attr("value")+'"')}),p=$("#options-"+e+" textarea.kad-sc-content").val(),t="["+e,t+=d,t+="]",t+="<p>"+p+"</p>",t+="[/"+e+"]"}else if("iconbox"==e){var d="",p="",h="";$("#options-"+e+" select").each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("id")+'="'+$(this).attr("value")+'"')}),$("#options-"+e+' input[type="text"].kad-sc-link').each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("data-attrname")+'="'+$(this).attr("value")+'"')}),$("#options-"+e+' input[type="text"].kad-sc-btn_txt').each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("data-attrname")+'="'+$(this).attr("value")+'"')}),$("#options-"+e+" input[type=checkbox]").each(function(){"checked"==$(this).attr("checked")&&(d+=" "+$(this).attr("data-attrname")+'="true"')}),$("#options-"+e+' input[type="text"].wp-color-picker').each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("data-attrname")+'="'+$(this).attr("value")+'"')}),p=$("#options-"+e+" textarea.kad-sc-description").val(),h=$("#options-"+e+' [type="text"].kad-sc-title').attr("value"),t="["+e,t+=d,t+="]",h&&(t+="<h4>"+h+"</h4>"),p&&(t+="<p>"+p+"</p>"),t+="[/"+e+"]"}else{var d="",u="",f=" ";$("#options-"+e+' input[type="text"].kt-short-textbox').each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("data-attrname")+'="'+$(this).attr("value")+'"')}),$("#options-"+e+' input[type="text"].kad-popup-colorpicker').each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("data-attrname")+'="'+$(this).attr("value")+'"')}),$("#options-"+e+" select").each(function(){""!=$(this).attr("value")&&(d+=" "+$(this).attr("id")+'="'+$(this).attr("value")+'"')}),$("#options-"+e+' input[type="radio"]').each(function(){"checked"==$(this).attr("checked")&&(d+=" "+$(this).attr("data-attrname")+'="'+$(this).attr("value")+'"')}),$("#options-"+e+" input[type=checkbox]#limit_content").each(function(){"checked"==$(this).attr("checked")&&(d+=" "+$(this).attr("data-attrname")+'="false"')}),$("#options-"+e+" input[type=checkbox]:not(#limit_content)").each(function(){"checked"==$(this).attr("checked")&&(d+=" "+$(this).attr("data-attrname")+'="true"')}),f+=d,t="["+e,t+=f,t+="]"}window.wp.media.editor.insert(t),$.magnificPopup.close()}),$("#kadence-shortcodes").change(function(){$(".shortcode-options").hide(),$("#options-"+$(this).val()).show()}),$("#options-columns input:radio").addClass("input_hidden"),$("#options-columns label").click(function(){$(this).addClass("selected").siblings().removeClass("selected")})}),function(e){"use strict";function t(t,s){this.element=e(t),this.settings=e.extend({},i,s),this.settings.emptyIcon&&this.settings.iconsPerPage--,this.iconPicker=e("<div/>",{class:"icons-selector",style:"position: relative",html:'<div class="selector"><span class="selected-icon"><i class="fip-icon-block"></i></span><span class="selector-button"><i class="fip-icon-down-dir"></i></span></div><div class="selector-popup" style="display: none;">'+(this.settings.hasSearch?'<div class="selector-search"><input type="text" name="" value="" placeholder="Search icon" class="icons-search-input"/><i class="fip-icon-search"></i></div>':"")+'<div class="selector-category"><select name="" class="icon-category-select" style="display: none"></select></div><div class="fip-icons-container"></div><div class="selector-footer" style="display:none;"><span class="selector-pages">1/2</span><span class="selector-arrows"><span class="selector-arrow-left" style="display:none;"><i class="fip-icon-left-dir"></i></span><span class="selector-arrow-right"><i class="fip-icon-right-dir"></i></span></span></div></div>'}),this.iconContainer=this.iconPicker.find(".fip-icons-container"),this.searchIcon=this.iconPicker.find(".selector-search i"),this.iconsSearched=[],this.isSearch=!1,this.totalPage=1,this.currentPage=1,this.currentIcon=!1,this.iconsCount=0,this.open=!1,this.searchValues=[],this.availableCategoriesSearch=[],this.triggerEvent=null,this.backupSource=[],this.backupSearch=[],this.isCategorized=!1,this.selectCategory=this.iconPicker.find(".icon-category-select"),this.selectedCategory=!1,this.availableCategories=[],this.unCategorizedKey=null,this.init()}var i={theme:"fip-grey",source:!1,emptyIcon:!0,emptyIconValue:"",iconsPerPage:20,hasSearch:!0,searchSource:!1,useAttribute:!1,attributeName:"data-icon",convertToHex:!0,allCategoryText:"From all categories",unCategorizedText:"Uncategorized"};t.prototype={init:function(){this.iconPicker.addClass(this.settings.theme),this.iconPicker.css({left:-9999}).appendTo("body");var t=this.iconPicker.outerHeight(),i=this.iconPicker.outerWidth();if(this.iconPicker.css({left:""}),this.element.before(this.iconPicker),this.element.css({visibility:"hidden",top:0,position:"relative",zIndex:"-1",left:"-"+i+"px",display:"inline-block",height:t+"px",width:i+"px",padding:"0",margin:"0 -"+i+"px 0 0",border:"0 none",verticalAlign:"top"}),!this.element.is("select")){var s=function(){for(var e=3,t=document.createElement("div"),i=t.all||[];t.innerHTML="<!--[if gt IE "+ ++e+"]><br><![endif]-->",i[0];);return e>4?e:!e}(),n=document.createElement("div");this.triggerEvent=9!==s&&"oninput"in n?["input","keyup"]:["keyup"]}!this.settings.source&&this.element.is("select")?(this.settings.source=[],this.settings.searchSource=[],this.element.find("optgroup").length?(this.isCategorized=!0,this.element.find("optgroup").each(e.proxy(function(t,i){var s=this.availableCategories.length,n=e("<option />");n.attr("value",s),n.html(e(i).attr("label")),this.selectCategory.append(n),this.availableCategories[s]=[],this.availableCategoriesSearch[s]=[],e(i).find("option").each(e.proxy(function(t,i){var n=e(i).val(),a=e(i).html();n&&n!==this.settings.emptyIconValue&&(this.settings.source.push(n),this.availableCategories[s].push(n),this.searchValues.push(a),this.availableCategoriesSearch[s].push(a))},this))},this)),this.element.find("> option").length&&this.element.find("> option").each(e.proxy(function(t,i){var s=e(i).val(),n=e(i).html();return!s||""===s||s==this.settings.emptyIconValue||(null===this.unCategorizedKey&&(this.unCategorizedKey=this.availableCategories.length,this.availableCategories[this.unCategorizedKey]=[],this.availableCategoriesSearch[this.unCategorizedKey]=[],e("<option />").attr("value",this.unCategorizedKey).html(this.settings.unCategorizedText).appendTo(this.selectCategory)),this.settings.source.push(s),this.availableCategories[this.unCategorizedKey].push(s),this.searchValues.push(n),void this.availableCategoriesSearch[this.unCategorizedKey].push(n))},this))):this.element.find("option").each(e.proxy(function(t,i){var s=e(i).val(),n=e(i).html();s&&(this.settings.source.push(s),this.searchValues.push(n))},this)),this.backupSource=this.settings.source.slice(0),this.backupSearch=this.searchValues.slice(0),this.loadCategories()):this.initSourceIndex(),this.loadIcons(),this.selectCategory.on("change keyup",e.proxy(function(t){if(!1===this.isCategorized)return!1;var i=e(t.currentTarget),s=i.val();if("all"===i.val())this.settings.source=this.backupSource,this.searchValues=this.backupSearch;else{var n=parseInt(s,10);this.availableCategories[n]&&(this.settings.source=this.availableCategories[n],this.searchValues=this.availableCategoriesSearch[n])}this.resetSearch(),this.loadIcons()},this)),this.iconPicker.find(".selector-button").click(e.proxy(function(){this.toggleIconSelector()},this)),this.iconPicker.find(".selector-arrow-right").click(e.proxy(function(t){this.currentPage<this.totalPage&&(this.iconPicker.find(".selector-arrow-left").show(),this.currentPage=this.currentPage+1,this.renderIconContainer()),this.currentPage===this.totalPage&&e(t.currentTarget).hide()},this)),this.iconPicker.find(".selector-arrow-left").click(e.proxy(function(t){this.currentPage>1&&(this.iconPicker.find(".selector-arrow-right").show(),this.currentPage=this.currentPage-1,this.renderIconContainer()),1===this.currentPage&&e(t.currentTarget).hide()},this)),this.iconPicker.find(".icons-search-input").keyup(e.proxy(function(t){var i=e(t.currentTarget).val();return""===i?void this.resetSearch():(this.searchIcon.removeClass("fip-icon-search"),this.searchIcon.addClass("fip-icon-cancel"),this.isSearch=!0,this.currentPage=1,this.iconsSearched=[],e.grep(this.searchValues,e.proxy(function(e,t){return e.toLowerCase().search(i.toLowerCase())>=0?(this.iconsSearched[this.iconsSearched.length]=this.settings.source[t],!0):void 0},this)),void this.renderIconContainer())},this)),this.iconPicker.find(".selector-search").on("click",".fip-icon-cancel",e.proxy(function(){this.iconPicker.find(".icons-search-input").focus(),this.resetSearch()},this)),this.iconContainer.on("click",".fip-box",e.proxy(function(t){this.setSelectedIcon(e(t.currentTarget).find("i").attr("data-fip-value")),this.toggleIconSelector()},this)),this.iconPicker.click(function(e){return e.stopPropagation(),!1}),e("html").click(e.proxy(function(){this.open&&this.toggleIconSelector()},this))},initSourceIndex:function(){if("object"==typeof this.settings.source){if(e.isArray(this.settings.source))this.isCategorized=!1,this.selectCategory.html("").hide(),this.settings.source=e.map(this.settings.source,function(e){return"function"==typeof e.toString?e.toString():e}),this.searchValues=e.isArray(this.settings.searchSource)?e.map(this.settings.searchSource,function(e){return"function"==typeof e.toString?e.toString():e}):this.settings.source.slice(0);else{var t=e.extend(!0,{},this.settings.source);this.settings.source=[],this.searchValues=[],this.availableCategoriesSearch=[],this.selectedCategory=!1,this.availableCategories=[],this.unCategorizedKey=null,this.isCategorized=!0,this.selectCategory.html("");for(var i in t){var s=this.availableCategories.length,n=e("<option />");n.attr("value",s),n.html(i),this.selectCategory.append(n),this.availableCategories[s]=[],this.availableCategoriesSearch[s]=[];for(var a in t[i]){var o=t[i][a],r=this.settings.searchSource&&this.settings.searchSource[i]&&this.settings.searchSource[i][a]?this.settings.searchSource[i][a]:o;"function"==typeof o.toString&&(o=o.toString()),o&&o!==this.settings.emptyIconValue&&(this.settings.source.push(o),this.availableCategories[s].push(o),this.searchValues.push(r),this.availableCategoriesSearch[s].push(r))}}}this.backupSource=this.settings.source.slice(0),this.backupSearch=this.searchValues.slice(0),this.loadCategories()}},loadCategories:function(){!1!==this.isCategorized&&(e('<option value="all">'+this.settings.allCategoryText+"</option>").prependTo(this.selectCategory),this.selectCategory.show().val("all").trigger("change"))},loadIcons:function(){this.iconContainer.html('<i class="fip-icon-spin3 animate-spin loading"></i>'),this.settings.source instanceof Array&&this.renderIconContainer()},renderIconContainer:function(){var t,i=[];if(i=this.isSearch?this.iconsSearched:this.settings.source,this.iconsCount=i.length,this.totalPage=Math.ceil(this.iconsCount/this.settings.iconsPerPage),this.totalPage>1?this.iconPicker.find(".selector-footer").show():this.iconPicker.find(".selector-footer").hide(),this.iconPicker.find(".selector-pages").html(this.currentPage+"/"+this.totalPage+" <em>("+this.iconsCount+")</em>"),t=(this.currentPage-1)*this.settings.iconsPerPage,this.settings.emptyIcon)this.iconContainer.html('<span class="fip-box"><i class="fip-icon-block" data-fip-value="fip-icon-block"></i></span>');else{if(i.length<1)return void this.iconContainer.html('<span class="icons-picker-error"><i class="fip-icon-block" data-fip-value="fip-icon-block"></i></span>');this.iconContainer.html("")}i=i.slice(t,t+this.settings.iconsPerPage);for(var s,n=0;s=i[n++];){var a=s;e.grep(this.settings.source,e.proxy(function(e,t){return e===s&&(a=this.searchValues[t],!0)},this)),e("<span/>",{html:'<i data-fip-value="'+s+'" '+(this.settings.useAttribute?this.settings.attributeName+'="'+(this.settings.convertToHex?"&#x"+parseInt(s,10).toString(16)+";":s)+'"':'class="'+s+'"')+"></i>",class:"fip-box",title:a}).appendTo(this.iconContainer)}this.settings.emptyIcon||this.element.val()&&-1!==e.inArray(this.element.val(),this.settings.source)?-1===e.inArray(this.element.val(),this.settings.source)?this.setSelectedIcon():this.setSelectedIcon(this.element.val()):this.setSelectedIcon(i[0])},setHighlightedIcon:function(){this.iconContainer.find(".current-icon").removeClass("current-icon"),this.currentIcon&&this.iconContainer.find('[data-fip-value="'+this.currentIcon+'"]').parent("span").addClass("current-icon")},setSelectedIcon:function(e){if("fip-icon-block"===e&&(e=""),this.settings.useAttribute?e?this.iconPicker.find(".selected-icon").html("<i "+this.settings.attributeName+'="'+(this.settings.convertToHex?"&#x"+parseInt(e,10).toString(16)+";":e)+'"></i>'):this.iconPicker.find(".selected-icon").html('<i class="fip-icon-block"></i>'):this.iconPicker.find(".selected-icon").html('<i class="'+(e||"fip-icon-block")+'"></i>'),this.element.val(""===e?this.settings.emptyIconValue:e).trigger("change"),null!==this.triggerEvent)for(var t in this.triggerEvent)this.element.trigger(this.triggerEvent[t]);this.currentIcon=e,this.setHighlightedIcon()},toggleIconSelector:function(){this.open=this.open?0:1,this.iconPicker.find(".selector-popup").slideToggle(300),this.iconPicker.find(".selector-button i").toggleClass("fip-icon-down-dir"),this.iconPicker.find(".selector-button i").toggleClass("fip-icon-up-dir"),this.open&&this.iconPicker.find(".icons-search-input").focus().select()},resetSearch:function(){this.iconPicker.find(".icons-search-input").val(""),this.searchIcon.removeClass("fip-icon-cancel"),this.searchIcon.addClass("fip-icon-search"),this.iconPicker.find(".selector-arrow-left").hide(),this.currentPage=1,this.isSearch=!1,this.renderIconContainer(),this.totalPage>1&&this.iconPicker.find(".selector-arrow-right").show()}},e.fn.fontIconPicker=function(i){return this.each(function(){e.data(this,"fontIconPicker")||e.data(this,"fontIconPicker",new t(this,i))}),this.setIcons=e.proxy(function(t,i){void 0===t&&(t=!1),void 0===i&&(i=!1),this.each(function(){e.data(this,"fontIconPicker").settings.source=t,e.data(this,"fontIconPicker").settings.searchSource=i,e.data(this,"fontIconPicker").initSourceIndex(),e.data(this,"fontIconPicker").resetSearch(),e.data(this,"fontIconPicker").loadIcons()})},this),this.destroyPicker=e.proxy(function(){this.each(function(){e.data(this,"fontIconPicker")&&(e.data(this,"fontIconPicker").iconPicker.remove(),e.data(this,"fontIconPicker").element.css({visibility:"",top:"",position:"",zIndex:"",left:"",display:"",height:"",width:"",padding:"",margin:"",border:"",verticalAlign:""}),e.removeData(this,"fontIconPicker"))})},this),this.refreshPicker=e.proxy(function(s){s||(s=i),this.destroyPicker(),this.each(function(){e.data(this,"fontIconPicker")||e.data(this,"fontIconPicker",new t(this,s))})},this),this}}(jQuery),jQuery(document).ready(function(){function e(e){jQuery(e).find("select.kad_icomoon").fontIconPicker({emptyIcon:!0,iconsPerPage:25})}function t(e){jQuery(e).find(".kad-widget-colorpicker").wpColorPicker({change:_.throttle(function(){jQuery(this).trigger("change")},3e3)})}function i(i,s){t(s),e(s)}function s(i,s){t(".so-content.panel-dialog"),e(".so-content.panel-dialog")}
jQuery("#widgets-right .widget:has(select.kad_icomoon)").each(function(){e(jQuery(this))}),jQuery("#widgets-right .widget:has(.kad-widget-colorpicker)").each(function(){t(jQuery(this))}),jQuery(document).on("widget-added widget-updated",i),jQuery(document).on("panelsopen",s)}),jQuery(document).ready(function($){function e(){var e=$("#post-formats-select input:checked").attr("value");void 0!==e&&("gallery"==e?$("#gallery_post_metabox").stop(!0,!0).fadeIn(500):$("#gallery_post_metabox").stop(!0,!0).fadeOut(500),"0"==e?$("#standard_post_metabox").stop(!0,!0).fadeIn(500):$("#standard_post_metabox").stop(!0,!0).fadeOut(500),"image"==e?$("#image_post_metabox").stop(!0,!0).fadeIn(500):$("#image_post_metabox").stop(!0,!0).fadeOut(500),"video"==e?$("#video_post_metabox").stop(!0,!0).fadeIn(500):$("#video_post_metabox").stop(!0,!0).fadeOut(500))}$("select#kadence-shortcodes").select2().on("select2-open",function(){$("body").addClass("kt-select-mask")}).on("select2:open",function(){$("body").addClass("kt-select-mask"),$(".wp-admin .mfp-wrap.kt-mfp-shortcode").removeAttr("tabindex")}).on("select2-close",function(){$("body").removeClass("kt-select-mask")}).on("select2:close",function(){$("body").removeClass("kt-select-mask")}),$("select.kad-sc-select").select2().on("select2-open",function(){$("body").addClass("kt-select-mask")}).on("select2:open",function(){$("body").addClass("kt-select-mask")}).on("select2-close",function(){$("body").removeClass("kt-select-mask")}).on("select2:close",function(){$("body").removeClass("kt-select-mask")}),$("select.kad-icon-select").fontIconPicker({emptyIcon:!0,iconsPerPage:25}),$("#post-formats-select input").change(e),$(window).load(function(){e()})}),function($){"use strict";$.imgupload=$.imgupload||{},$(document).ready(function(){$.imgupload()}),$.imgupload=function(){$("body").on({click:function(e){var t=$(this).closest(".kad_img_upload_widget");if("undefined"!=typeof wp&&wp.media){e.preventDefault();var i,s=$(this);if(i)return void i.open();i=wp.media({multiple:!1,library:{type:"image"}}),i.on("select",function(){var e=i.state().get("selection").first();i.close(),t.find(".kad_custom_media_url").val(e.attributes.url),t.find(".kad_custom_media_id").val(e.attributes.id);var s=e.attributes.url;s=void 0!==e.attributes.sizes&&void 0!==e.attributes.sizes.thumbnail?e.attributes.sizes.thumbnail.url:e.attributes.icon,t.find(".kad_custom_media_image").attr("src",s)}),i.open()}}},".kad_custom_media_upload")}}(jQuery),function($){"use strict";$.pinnaclegallery=$.pinnaclegallery||{},$(document).ready(function(){$.pinnaclegallery()}),$.pinnaclegallery=function(){$("body").on({click:function(e){var t=$(this).closest(".kad_widget_image_gallery");if("clear-gallery"===e.currentTarget.id){var i=t.find(".gallery_values").val("");return void t.find(".gallery_images").html("")}if("undefined"!=typeof wp&&wp.media&&wp.media.gallery){e.preventDefault();var s=$(this),n=t.find(".gallery_values").val();wp.media.view.Settings.Gallery=wp.media.view.Settings.Gallery.extend({template:function(e){}});var a;if(n)a='[gallery ids="'+n+'"]',r=wp.media.gallery.edit(a);else var o={frame:"post",state:"gallery",multiple:!0},r=wp.media.editor.open("gallery_values",o);return r.state("gallery-edit").on("update",function(e){t.find(".gallery_images").html("");var i,s="",n,a,o=e.models.map(function(e){return i=e.toJSON(),n=void 0!==i.sizes.thumbnail?i.sizes.thumbnail.url:i.url,a=i.id,s='<a class="of-uploaded-image edit-kt-meta-gal" data-attachment-id="'+a+'" href="#"><img class="gallery-widget-image" src="'+n+'" /></a>',t.find(".gallery_images").append(s),e.id});t.find(".gallery_values").val(o.join(",")),t.find(".gallery_values")}),!1}}},".gallery-attachments")}}(jQuery),function($){"use strict";$.pinnacle_attachment_gallery=$.pinnacle_attachment_gallery||{},$(document).ready(function(){$.pinnacle_attachment_gallery()}),$.pinnacle_attachment_gallery=function(){$("body").on({click:function(e){var t=$(this).closest(".kad_widget_image_gallery"),i=$(this).data("attachment-id");if("undefined"!=typeof wp&&wp.media&&wp.media.gallery){e.preventDefault(),wp.media.view.Settings.Gallery=wp.media.view.Settings.Gallery.extend({template:function(e){}});var s=$(this),n=t.find(".gallery_values").val(),a='[gallery ids="'+n+'"]';return wp.media.gallery.edit(a).state("gallery-edit").on("update",function(e){t.find(".gallery_images").html("");var i,s="",n,a,o=e.models.map(function(e){return i=e.toJSON(),n=void 0!==i.sizes.thumbnail?i.sizes.thumbnail.url:i.url,a=i.id,s='<a class="of-uploaded-image edit-kt-meta-gal" data-attachment-id="'+a+'" href="#"><img class="gallery-widget-image" src="'+n+'" /></a>',t.find(".gallery_images").append(s),e.id});t.find(".gallery_values").val(o.join(",")),t.find(".gallery_values")}),!1}}},".edit-kt-meta-gal")}}(jQuery),function($){$(document).on("click",".kadence-tabs-widget-toggle",function(){$(this).toggleClass("dashicons-minus dashicons-plus"),$(this).closest(".kadence-tabs-widget").find(".kadence-tabs-widget-content").toggle()}),$(document).on("change",".js-kadence-tabs-widget-title",function(){$(this).closest(".kadence-tabs-widget").find(".kadence-tabs-widget-header-title").text($(this).val())})}(jQuery),window.KTTabs={Models:{},ListViews:{},Views:{},Utils:{}},_.extend(KTTabs.Models,{Tab:Backbone.Model.extend({defaults:{title:"",builder_id:"",panels_data:""}})}),KTTabs.Views.Abstract=Backbone.View.extend({initialize:function(e){return this.templateHTML=e.templateHTML,this},render:function(){return this.$el.html(Mustache.render(this.templateHTML,this.model.attributes)),this},destroy:function(e){e.preventDefault(),this.remove(),this.model.trigger("destroy")}}),_.extend(KTTabs.Views,{Tab:KTTabs.Views.Abstract.extend({className:"kadence-widget-single-tab",events:{"click .js-kadence-remove-tab":"destroy"},render:function(){return this.model.set("panels_data",JSON.stringify(this.model.get("panels_data"))),this.$el.html(Mustache.render(this.templateHTML,this.model.attributes)),this}})}),KTTabs.ListViews.Abstract=Backbone.View.extend({initialize:function(e){return this.widgetId=e.widgetId,this.itemsModel=e.itemsModel,this.itemView=e.itemView,this.itemTemplate=e.itemTemplate,this.$items=this.$(e.itemsClass),this.items=new Backbone.Collection([],{model:this.itemsModel}),this.listenTo(this.items,"add",this.appendOne),this},addNew:function(e){e.preventDefault();var t=this.getMaxId();return this.items.add(new this.itemsModel({id:t+1})),this},getMaxId:function(){if(this.items.isEmpty())return-1;var e=this.items.max(function(e){return parseInt(e.id,10)});return parseInt(e.id,10)},appendOne:function(e){var t=new this.itemView({model:e,templateHTML:jQuery(this.itemTemplate+this.widgetId).html()}).render();return"__i__"!==this.widgetId.slice(-5)&&this.$items.append(t.el),this}}),_.extend(KTTabs.ListViews,{Tabs:KTTabs.ListViews.Abstract.extend({events:{"click .js-kadence-add-tab":"addNew"},appendOne:function(e){e.attributes.builder_id=_.uniqueId("layout-builder-");var t=new this.itemView({model:e,templateHTML:jQuery(this.itemTemplate+this.widgetId).html()}).render();return"__i__"!==this.widgetId.slice(-5)&&this.$items.append(t.el),void 0===jQuery.fn.soPanelsSetupBuilderWidget||jQuery("body").hasClass("wp-customizer")||jQuery("#siteorigin-page-builder-widget-"+e.attributes.builder_id).soPanelsSetupBuilderWidget(),this}})}),_.extend(KTTabs.Utils,{repopulateGeneric:function(e,t,i,s){var n=new e(t);_(i).isObject()&&(i=_(i).values()),n.items.add(i,{parse:!0})},repopulateTabs:function(e,t){var i={el:"#tabs-"+t,widgetId:t,itemsClass:".tabs",itemTemplate:"#js-kadence-tab-",itemsModel:KTTabs.Models.Tab,itemView:KTTabs.Views.Tab};this.repopulateGeneric(KTTabs.ListViews.Tabs,i,e,t)}});