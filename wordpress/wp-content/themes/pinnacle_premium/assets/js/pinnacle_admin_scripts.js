// Magnific Popup v0.9.9 by Dmitry Semenov
(function(a){var b="Close",c="BeforeClose",d="AfterClose",e="BeforeAppend",f="MarkupParse",g="Open",h="Change",i="mfp",j="."+i,k="mfp-ready",l="mfp-removing",m="mfp-prevent-close",n,o=function(){},p=!!window.jQuery,q,r=a(window),s,t,u,v,w,x=function(a,b){n.ev.on(i+a+j,b)},y=function(b,c,d,e){var f=document.createElement("div");return f.className="mfp-"+b,d&&(f.innerHTML=d),e?c&&c.appendChild(f):(f=a(f),c&&f.appendTo(c)),f},z=function(b,c){n.ev.triggerHandler(i+b,c),n.st.callbacks&&(b=b.charAt(0).toLowerCase()+b.slice(1),n.st.callbacks[b]&&n.st.callbacks[b].apply(n,a.isArray(c)?c:[c]))},A=function(b){if(b!==w||!n.currTemplate.closeBtn)n.currTemplate.closeBtn=a(n.st.closeMarkup.replace("%title%",n.st.tClose)),w=b;return n.currTemplate.closeBtn},B=function(){a.magnificPopup.instance||(n=new o,n.init(),a.magnificPopup.instance=n)},C=function(){var a=document.createElement("p").style,b=["ms","O","Moz","Webkit"];if(a.transition!==undefined)return!0;while(b.length)if(b.pop()+"Transition"in a)return!0;return!1};o.prototype={constructor:o,init:function(){var b=navigator.appVersion;n.isIE7=b.indexOf("MSIE 7.")!==-1,n.isIE8=b.indexOf("MSIE 8.")!==-1,n.isLowIE=n.isIE7||n.isIE8,n.isAndroid=/android/gi.test(b),n.isIOS=/iphone|ipad|ipod/gi.test(b),n.supportsTransition=C(),n.probablyMobile=n.isAndroid||n.isIOS||/(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent),t=a(document),n.popupsCache={}},open:function(b){s||(s=a(document.body));var c;if(b.isObj===!1){n.items=b.items.toArray(),n.index=0;var d=b.items,e;for(c=0;c<d.length;c++){e=d[c],e.parsed&&(e=e.el[0]);if(e===b.el[0]){n.index=c;break}}}else n.items=a.isArray(b.items)?b.items:[b.items],n.index=b.index||0;if(n.isOpen){n.updateItemHTML();return}n.types=[],v="",b.mainEl&&b.mainEl.length?n.ev=b.mainEl.eq(0):n.ev=t,b.key?(n.popupsCache[b.key]||(n.popupsCache[b.key]={}),n.currTemplate=n.popupsCache[b.key]):n.currTemplate={},n.st=a.extend(!0,{},a.magnificPopup.defaults,b),n.fixedContentPos=n.st.fixedContentPos==="auto"?!n.probablyMobile:n.st.fixedContentPos,n.st.modal&&(n.st.closeOnContentClick=!1,n.st.closeOnBgClick=!1,n.st.showCloseBtn=!1,n.st.enableEscapeKey=!1),n.bgOverlay||(n.bgOverlay=y("bg").on("click"+j,function(){n.close()}),n.wrap=y("wrap").attr("tabindex",-1).on("click"+j,function(a){n._checkIfClose(a.target)&&n.close()}),n.container=y("container",n.wrap)),n.contentContainer=y("content"),n.st.preloader&&(n.preloader=y("preloader",n.container,n.st.tLoading));var h=a.magnificPopup.modules;for(c=0;c<h.length;c++){var i=h[c];i=i.charAt(0).toUpperCase()+i.slice(1),n["init"+i].call(n)}z("BeforeOpen"),n.st.showCloseBtn&&(n.st.closeBtnInside?(x(f,function(a,b,c,d){c.close_replaceWith=A(d.type)}),v+=" mfp-close-btn-in"):n.wrap.append(A())),n.st.alignTop&&(v+=" mfp-align-top"),n.fixedContentPos?n.wrap.css({overflow:n.st.overflowY,overflowX:"hidden",overflowY:n.st.overflowY}):n.wrap.css({top:r.scrollTop(),position:"absolute"}),(n.st.fixedBgPos===!1||n.st.fixedBgPos==="auto"&&!n.fixedContentPos)&&n.bgOverlay.css({height:t.height(),position:"absolute"}),n.st.enableEscapeKey&&t.on("keyup"+j,function(a){a.keyCode===27&&n.close()}),r.on("resize"+j,function(){n.updateSize()}),n.st.closeOnContentClick||(v+=" mfp-auto-cursor"),v&&n.wrap.addClass(v);var l=n.wH=r.height(),m={};if(n.fixedContentPos&&n._hasScrollBar(l)){var o=n._getScrollbarSize();o&&(m.marginRight=o)}n.fixedContentPos&&(n.isIE7?a("body, html").css("overflow","hidden"):m.overflow="hidden");var p=n.st.mainClass;return n.isIE7&&(p+=" mfp-ie7"),p&&n._addClassToMFP(p),n.updateItemHTML(),z("BuildControls"),a("html").css(m),n.bgOverlay.add(n.wrap).prependTo(n.st.prependTo||s),n._lastFocusedEl=document.activeElement,setTimeout(function(){n.content?(n._addClassToMFP(k),n._setFocus()):n.bgOverlay.addClass(k),t.on("focusin"+j,n._onFocusIn)},16),n.isOpen=!0,n.updateSize(l),z(g),b},close:function(){if(!n.isOpen)return;z(c),n.isOpen=!1,n.st.removalDelay&&!n.isLowIE&&n.supportsTransition?(n._addClassToMFP(l),setTimeout(function(){n._close()},n.st.removalDelay)):n._close()},_close:function(){z(b);var c=l+" "+k+" ";n.bgOverlay.detach(),n.wrap.detach(),n.container.empty(),n.st.mainClass&&(c+=n.st.mainClass+" "),n._removeClassFromMFP(c);if(n.fixedContentPos){var e={marginRight:""};n.isIE7?a("body, html").css("overflow",""):e.overflow="",a("html").css(e)}t.off("keyup"+j+" focusin"+j),n.ev.off(j),n.wrap.attr("class","mfp-wrap").removeAttr("style"),n.bgOverlay.attr("class","mfp-bg"),n.container.attr("class","mfp-container"),n.st.showCloseBtn&&(!n.st.closeBtnInside||n.currTemplate[n.currItem.type]===!0)&&n.currTemplate.closeBtn&&n.currTemplate.closeBtn.detach(),n._lastFocusedEl&&a(n._lastFocusedEl).focus(),n.currItem=null,n.content=null,n.currTemplate=null,n.prevHeight=0,z(d)},updateSize:function(a){if(n.isIOS){var b=document.documentElement.clientWidth/window.innerWidth,c=window.innerHeight*b;n.wrap.css("height",c),n.wH=c}else n.wH=a||r.height();n.fixedContentPos||n.wrap.css("height",n.wH),z("Resize")},updateItemHTML:function(){var b=n.items[n.index];n.contentContainer.detach(),n.content&&n.content.detach(),b.parsed||(b=n.parseEl(n.index));var c=b.type;z("BeforeChange",[n.currItem?n.currItem.type:"",c]),n.currItem=b;if(!n.currTemplate[c]){var d=n.st[c]?n.st[c].markup:!1;z("FirstMarkupParse",d),d?n.currTemplate[c]=a(d):n.currTemplate[c]=!0}u&&u!==b.type&&n.container.removeClass("mfp-"+u+"-holder");var e=n["get"+c.charAt(0).toUpperCase()+c.slice(1)](b,n.currTemplate[c]);n.appendContent(e,c),b.preloaded=!0,z(h,b),u=b.type,n.container.prepend(n.contentContainer),z("AfterChange")},appendContent:function(a,b){n.content=a,a?n.st.showCloseBtn&&n.st.closeBtnInside&&n.currTemplate[b]===!0?n.content.find(".mfp-close").length||n.content.append(A()):n.content=a:n.content="",z(e),n.container.addClass("mfp-"+b+"-holder"),n.contentContainer.append(n.content)},parseEl:function(b){var c=n.items[b],d;c.tagName?c={el:a(c)}:(d=c.type,c={data:c,src:c.src});if(c.el){var e=n.types;for(var f=0;f<e.length;f++)if(c.el.hasClass("mfp-"+e[f])){d=e[f];break}c.src=c.el.attr("data-mfp-src"),c.src||(c.src=c.el.attr("href"))}return c.type=d||n.st.type||"inline",c.index=b,c.parsed=!0,n.items[b]=c,z("ElementParse",c),n.items[b]},addGroup:function(a,b){var c=function(c){c.mfpEl=this,n._openClick(c,a,b)};b||(b={});var d="click.magnificPopup";b.mainEl=a,b.items?(b.isObj=!0,a.off(d).on(d,c)):(b.isObj=!1,b.delegate?a.off(d).on(d,b.delegate,c):(b.items=a,a.off(d).on(d,c)))},_openClick:function(b,c,d){var e=d.midClick!==undefined?d.midClick:a.magnificPopup.defaults.midClick;if(!e&&(b.which===2||b.ctrlKey||b.metaKey))return;var f=d.disableOn!==undefined?d.disableOn:a.magnificPopup.defaults.disableOn;if(f)if(a.isFunction(f)){if(!f.call(n))return!0}else if(r.width()<f)return!0;b.type&&(b.preventDefault(),n.isOpen&&b.stopPropagation()),d.el=a(b.mfpEl),d.delegate&&(d.items=c.find(d.delegate)),n.open(d)},updateStatus:function(a,b){if(n.preloader){q!==a&&n.container.removeClass("mfp-s-"+q),!b&&a==="loading"&&(b=n.st.tLoading);var c={status:a,text:b};z("UpdateStatus",c),a=c.status,b=c.text,n.preloader.html(b),n.preloader.find("a").on("click",function(a){a.stopImmediatePropagation()}),n.container.addClass("mfp-s-"+a),q=a}},_checkIfClose:function(b){if(a(b).hasClass(m))return;var c=n.st.closeOnContentClick,d=n.st.closeOnBgClick;if(c&&d)return!0;if(!n.content||a(b).hasClass("mfp-close")||n.preloader&&b===n.preloader[0])return!0;if(b!==n.content[0]&&!a.contains(n.content[0],b)){if(d&&a.contains(document,b))return!0}else if(c)return!0;return!1},_addClassToMFP:function(a){n.bgOverlay.addClass(a),n.wrap.addClass(a)},_removeClassFromMFP:function(a){this.bgOverlay.removeClass(a),n.wrap.removeClass(a)},_hasScrollBar:function(a){return(n.isIE7?t.height():document.body.scrollHeight)>(a||r.height())},_setFocus:function(){(n.st.focus?n.content.find(n.st.focus).eq(0):n.wrap).focus()},_onFocusIn:function(b){if(b.target!==n.wrap[0]&&!a.contains(n.wrap[0],b.target))return n._setFocus(),!1},_parseMarkup:function(b,c,d){var e;d.data&&(c=a.extend(d.data,c)),z(f,[b,c,d]),a.each(c,function(a,c){if(c===undefined||c===!1)return!0;e=a.split("_");if(e.length>1){var d=b.find(j+"-"+e[0]);if(d.length>0){var f=e[1];f==="replaceWith"?d[0]!==c[0]&&d.replaceWith(c):f==="img"?d.is("img")?d.attr("src",c):d.replaceWith('<img src="'+c+'" class="'+d.attr("class")+'" />'):d.attr(e[1],c)}}else b.find(j+"-"+a).html(c)})},_getScrollbarSize:function(){if(n.scrollbarSize===undefined){var a=document.createElement("div");a.id="mfp-sbm",a.style.cssText="width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;",document.body.appendChild(a),n.scrollbarSize=a.offsetWidth-a.clientWidth,document.body.removeChild(a)}return n.scrollbarSize}},a.magnificPopup={instance:null,proto:o.prototype,modules:[],open:function(b,c){return B(),b?b=a.extend(!0,{},b):b={},b.isObj=!0,b.index=c||0,this.instance.open(b)},close:function(){return a.magnificPopup.instance&&a.magnificPopup.instance.close()},registerModule:function(b,c){c.options&&(a.magnificPopup.defaults[b]=c.options),a.extend(this.proto,c.proto),this.modules.push(b)},defaults:{disableOn:0,key:null,midClick:!1,mainClass:"",preloader:!0,focus:"",closeOnContentClick:!1,closeOnBgClick:!0,closeBtnInside:!0,showCloseBtn:!0,enableEscapeKey:!0,modal:!1,alignTop:!1,removalDelay:0,prependTo:null,fixedContentPos:"auto",fixedBgPos:"auto",overflowY:"auto",closeMarkup:'<button title="%title%" type="button" class="mfp-close">&times;</button>',tClose:"Close (Esc)",tLoading:"Loading..."}},a.fn.magnificPopup=function(b){B();var c=a(this);if(typeof b=="string")if(b==="open"){var d,e=p?c.data("magnificPopup"):c[0].magnificPopup,f=parseInt(arguments[1],10)||0;e.items?d=e.items[f]:(d=c,e.delegate&&(d=d.find(e.delegate)),d=d.eq(f)),n._openClick({mfpEl:d},c,e)}else n.isOpen&&n[b].apply(n,Array.prototype.slice.call(arguments,1));else b=a.extend(!0,{},b),p?c.data("magnificPopup",b):c[0].magnificPopup=b,n.addGroup(c,b);return c};var D="inline",E,F,G,H=function(){G&&(F.after(G.addClass(E)).detach(),G=null)};a.magnificPopup.registerModule(D,{options:{hiddenClass:"hide",markup:"",tNotFound:"Content not found"},proto:{initInline:function(){n.types.push(D),x(b+"."+D,function(){H()})},getInline:function(b,c){H();if(b.src){var d=n.st.inline,e=a(b.src);if(e.length){var f=e[0].parentNode;f&&f.tagName&&(F||(E=d.hiddenClass,F=y(E),E="mfp-"+E),G=e.after(F).detach().removeClass(E)),n.updateStatus("ready")}else n.updateStatus("error",d.tNotFound),e=a("<div>");return b.inlineElement=e,e}return n.updateStatus("ready"),n._parseMarkup(c,{},b),c}}});var I,J=function(){return I===undefined&&(I=document.createElement("p").style.MozTransform!==undefined),I};a.magnificPopup.registerModule("zoom",{options:{enabled:!1,easing:"ease-in-out",duration:300,opener:function(a){return a.is("img")?a:a.find("img")}},proto:{initZoom:function(){var a=n.st.zoom,d=".zoom",e;if(!a.enabled||!n.supportsTransition)return;var f=a.duration,g=function(b){var c=b.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),d="all "+a.duration/1e3+"s "+a.easing,e={position:"fixed",zIndex:9999,left:0,top:0,"-webkit-backface-visibility":"hidden"},f="transition";return e["-webkit-"+f]=e["-moz-"+f]=e["-o-"+f]=e[f]=d,c.css(e),c},h=function(){n.content.css("visibility","visible")},i,j;x("BuildControls"+d,function(){if(n._allowZoom()){clearTimeout(i),n.content.css("visibility","hidden"),e=n._getItemToZoom();if(!e){h();return}j=g(e),j.css(n._getOffset()),n.wrap.append(j),i=setTimeout(function(){j.css(n._getOffset(!0)),i=setTimeout(function(){h(),setTimeout(function(){j.remove(),e=j=null,z("ZoomAnimationEnded")},16)},f)},16)}}),x(c+d,function(){if(n._allowZoom()){clearTimeout(i),n.st.removalDelay=f;if(!e){e=n._getItemToZoom();if(!e)return;j=g(e)}j.css(n._getOffset(!0)),n.wrap.append(j),n.content.css("visibility","hidden"),setTimeout(function(){j.css(n._getOffset())},16)}}),x(b+d,function(){n._allowZoom()&&(h(),j&&j.remove(),e=null)})},_allowZoom:function(){return n.currItem.type==="image"},_getItemToZoom:function(){return n.currItem.hasSize?n.currItem.img:!1},_getOffset:function(b){var c;b?c=n.currItem.img:c=n.st.zoom.opener(n.currItem.el||n.currItem);var d=c.offset(),e=parseInt(c.css("padding-top"),10),f=parseInt(c.css("padding-bottom"),10);d.top-=a(window).scrollTop()-e;var g={width:c.width(),height:(p?c.innerHeight():c[0].offsetHeight)-f-e};return J()?g["-moz-transform"]=g.transform="translate("+d.left+"px,"+d.top+"px)":(g.left=d.left,g.top=d.top),g}}}),B()})(window.jQuery||window.Zepto)
jQuery(document).ready(function($) {
  $('input.kad-widget-colorpicker').wpColorPicker(); 
});
jQuery(document).on( "panelsopen", function() {
  jQuery('input.kad-widget-colorpicker').wpColorPicker(); 
});
jQuery(document).on( "widget-added", function() {
  jQuery('input.kad-widget-colorpicker').wpColorPicker(); 
});
jQuery(document).on( "widget-updated", function() {
  jQuery('input.kad-widget-colorpicker').wpColorPicker(); 
});
jQuery(document).ready(function($){
	
	$('body').on('click','.kadence-generator-button',function(){
       
 
            $.magnificPopup.open({
                mainClass: 'mfp-zoom-in kt-mfp-shortcode',
 	 		 	items: {
 	  	     		src: '#kadence-shortcode-innercontainer'
  	        	},
  	         	type: 'inline',
	    });         
 
	}); 


  		$('input.kad-popup-colorpicker').wpColorPicker(); 

	$('#kad-shortcode-insert').click(function(){

		var scname = $('#kadence-shortcodes').val();
		var output = '';
		if(scname == 'columns') {
				var columnssetup = '';
    			$('#options-'+scname+' input[type="radio"]').each(function(){
					if($(this).attr('checked') == 'checked') {
    					columnssetup = $(this).attr('value');
    				}
    			});
    			output = '[columns] ';
				if(columnssetup == 'span6') {
					output += '[span6] ';
					output += '<p>add content here</p>';
					output += '[/span6]';
					output += '[span6] ';
					output += '<p>add content here</p>';
					output += '[/span6]';
				}else if(columnssetup == 'span4left') {
					output += '[span4] ';
					output += '<p>add content here</p>';
					output += '[/span4]';
					output += '[span8] ';
					output += '<p>add content here</p>';
					output += '[/span8]';
				}else if(columnssetup == 'span4right') {
					output += '[span8] ';
					output += '<p>add content here</p>';
					output += '[/span8]';
					output += '[span4] ';
					output += '<p>add content here</p>';
					output += '[/span4]';
				}else if(columnssetup == 'span4') {
					output += '[span4] ';
					output += '<p>add content here</p>';
					output += '[/span4]';
					output += '[span4] ';
					output += '<p>add content here</p>';
					output += '[/span4]';
					output += '[span4] ';
					output += '<p>add content here</p>';
					output += '[/span4]';
				}else if(columnssetup == 'span3') {
					output += '[span3] ';
					output += '<p>add content here</p>';
					output += '[/span3]';
					output += '[span3] ';
					output += '<p>add content here</p>';
					output += '[/span3]';
					output += '[span3] ';
					output += '<p>add content here</p>';
					output += '[/span3]';
					output += '[span3] ';
					output += '<p>add content here</p>';
					output += '[/span3]';
				}

				output += '[/columns]';
		} else if(scname == 'table') {

    		var columns = $('#options-'+scname+' .kad-sc-columns').attr('value') != '' ? parseInt( $('#options-'+scname+' .kad-sc-columns').val()) : 2;
    		var rows = $('#options-'+scname+' .kad-sc-rows').attr('value') != '' ? parseInt( $('#options-'+scname+' .kad-sc-rows').val()) : 2;
    		var head = $('#options-'+scname+' #head').attr('checked') == 'checked' ? true : false;

			output = '<table>';
			if(head) {
				output += '<thead>';
				output += '<tr>'
				var col = 1;
				for (c = 0; c < columns; c++) { 
			    output += '<th>Column '+col+'</th>';
			    col ++;
				}
				output += '</tr>';
				output += '</thead>';
			}
			output += '<tbody>';
			var ro = 1;
			for (i = 0; i < rows; i++) { 
			    output += '<tr>';
			    var col = 1;
			    for (c = 0; c < columns; c++) { 
			    output += '<td>Row ' + ro + ', Column '+col+'</td>';
			    col ++;
				}
				ro ++;
			}
			output += '</tr>';
			output += '</tbody>';
			output += '</table>';

		} else if(scname == 'tabs') {
			output = '[tabs]';
			output += '[tab title="title1" start=open] <p>Put content here</p> [/tab]';
			output += '[tab title="title2"] <p>Put content here</p>[/tab]';
			output += '[tab title="title3"]<p>Copy and paste to create more</p>[/tab]';
			output += '[/tabs]';

		} else if(scname == 'accordion') {
			output = '[accordion]';
			output += '[pane title="title1" start=open] <p>Put content here</p> [/pane]';
			output += '[pane title="title2"] <p>Put content here</p>[/pane]';
			output += '[pane title="title3"]<p>Copy and paste to create more</p>[/pane]';
			output += '[/accordion]';

		} else if(scname == 'pullquote' || scname == 'blockquote') {
			var sc_attrs = '', sc_content = '';
			$('#options-'+scname+' select').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('id') + '="' + $(this).attr('value') + '"';
					}
				});
			sc_content = $('#options-'+scname+' textarea.kad-sc-content').val();

			output = '[' + scname;
			output += sc_attrs;
			output += ']';
			output += '<p>' + sc_content + '</p>';
			output += '[/'+ scname +']';
		  
		} else if(scname == 'kt_box') {
			var sc_attrs = '', sc_content = '';
			$('#options-'+scname+' select').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('id') + '="' + $(this).attr('value') + '"';
					}
				});
			$('#options-'+scname+' input[type="text"].attr').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('data-attrname') + '="' + $(this).attr('value') + '"';
			}
			});
			$('#options-'+scname+' input[type="text"].wp-color-picker').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('data-attrname') + '="' + $(this).attr('value') + '"';
			}
			});
			$('#options-'+scname+' input[type=checkbox]').each(function(){
				if($(this).attr('checked') == 'checked') {
				 sc_attrs += ' '+ $(this).attr('data-attrname')+'="middle"'; 
				}
			});	
			sc_content = $('#options-'+scname+' textarea.kad-sc-content').val();

			output = '[' + scname;
			output += sc_attrs;
			output += ']';
			output += '<p>' + sc_content + '</p>';
			output += '[/'+ scname +']';
		  
		}  else if(scname == 'kad_modal') {
			var sc_attrs = '', sc_content = '';
			$('#options-'+scname+' select').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('id') + '="' + $(this).attr('value') + '"';
					}
				});
			$('#options-'+scname+' input[type="text"]').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('data-attrname') + '="' + $(this).attr('value') + '"';
			}
			});
			$('#options-'+scname+' input[type="text"].wp-color-picker').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('data-attrname') + '="' + $(this).attr('value') + '"';
			}
			});
			sc_content = $('#options-'+scname+' textarea.kad-sc-content').val();

			output = '[' + scname;
			output += sc_attrs;
			output += ']';
			output += '<p>' + sc_content + '</p>';
			output += '[/'+ scname +']';
		  } else if(scname == 'iconbox') {
			var sc_attrs = '', sc_content = '', sc_title = '';
			$('#options-'+scname+' select').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('id') + '="' + $(this).attr('value') + '"';
					}
			});
			$('#options-'+scname+' input[type="text"].kad-sc-link').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('data-attrname') + '="' + $(this).attr('value') + '"';
			}
			});
			$('#options-'+scname+' input[type="text"].kad-sc-btn_txt').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('data-attrname') + '="' + $(this).attr('value') + '"';
			}
			});
			$('#options-'+scname+' input[type=checkbox]').each(function(){
			 if($(this).attr('checked') == 'checked') sc_attrs += ' ' + $(this).attr('data-attrname')+'="true"';	
			});
			$('#options-'+scname+' input[type="text"].wp-color-picker').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('data-attrname') + '="' + $(this).attr('value') + '"';
			}
			});
					//textarea loop for extra attrs
			sc_content = $('#options-'+scname+' textarea.kad-sc-description').val();
			sc_title = $('#options-'+scname+' [type="text"].kad-sc-title').attr('value');

			output = '[' + scname;
			output += sc_attrs;
			output += ']';
			if(sc_title) {output += '<h4>' + sc_title + '</h4>';}
			if(sc_content){output += '<p>' + sc_content + '</p>';}
			output += '[/'+ scname +']';
		  
		} else {

		var sc_attrs = '', sc_attrsb = '', code = ' ';
		// Text and Color
		$('#options-'+scname+' input[type="text"].kt-short-textbox').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('data-attrname') + '="' + $(this).attr('value') + '"';
			}
		});
		$('#options-'+scname+' input[type="text"].kad-popup-colorpicker').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('data-attrname') + '="' + $(this).attr('value') + '"';
			}
		});
		$('#options-'+scname+' select').each(function(){
			if($(this).attr('value') != '') {
				sc_attrs += ' ' + $(this).attr('id') + '="' + $(this).attr('value') + '"';
			}
		});
		//Radio
		$('#options-'+scname+' input[type="radio"]').each(function(){
			if($(this).attr('checked') == 'checked') {
			 sc_attrs += ' '+ $(this).attr('data-attrname')+'="' + $(this).attr('value') + '"'; 
			}
		});	
		$('#options-'+scname+' input[type=checkbox]#limit_content').each(function(){
			 if($(this).attr('checked') == 'checked') sc_attrs += ' ' + $(this).attr('data-attrname')+'="false"';	
		});
		$('#options-'+scname+' input[type=checkbox]:not(#limit_content)').each(function(){
			 if($(this).attr('checked') == 'checked') sc_attrs += ' ' + $(this).attr('data-attrname')+'="true"';	
		});
		code += sc_attrs;
		// setup the output of our shortcode
		output = '[' + scname;
		output += code;
		output += ']';
		}


		window.wp.media.editor.insert( output );
		$.magnificPopup.close();
	});
		$('#kadence-shortcodes').change(function(){
				$('.shortcode-options').hide();
				$('#options-'+$(this).val()).show();

		    });
		$('#options-columns input:radio').addClass('input_hidden');
		$('#options-columns label').click(function(){
		    $(this).addClass('selected').siblings().removeClass('selected');
		});

});
/**
 *  jQuery fontIconPicker - v2.0.0
 *
 *  An icon picker built on top of font icons and jQuery
 *
 *  http://codeb.it/fontIconPicker
 *
 *  Made by Alessandro Benoit & Swashata
 *  Under MIT License
 *
 * {@link https://github.com/micc83/fontIconPicker}
 */
!function(a){"use strict";function c(c,d){this.element=a(c),this.settings=a.extend({},b,d),this.settings.emptyIcon&&this.settings.iconsPerPage--,this.iconPicker=a("<div/>",{"class":"icons-selector",style:"position: relative",html:'<div class="selector"><span class="selected-icon"><i class="fip-icon-block"></i></span><span class="selector-button"><i class="fip-icon-down-dir"></i></span></div><div class="selector-popup" style="display: none;">'+(this.settings.hasSearch?'<div class="selector-search"><input type="text" name="" value="" placeholder="Search icon" class="icons-search-input"/><i class="fip-icon-search"></i></div>':"")+'<div class="selector-category">'+'<select name="" class="icon-category-select" style="display: none">'+"</select>"+"</div>"+'<div class="fip-icons-container"></div>'+'<div class="selector-footer" style="display:none;">'+'<span class="selector-pages">1/2</span>'+'<span class="selector-arrows">'+'<span class="selector-arrow-left" style="display:none;">'+'<i class="fip-icon-left-dir"></i>'+"</span>"+'<span class="selector-arrow-right">'+'<i class="fip-icon-right-dir"></i>'+"</span>"+"</span>"+"</div>"+"</div>"}),this.iconContainer=this.iconPicker.find(".fip-icons-container"),this.searchIcon=this.iconPicker.find(".selector-search i"),this.iconsSearched=[],this.isSearch=!1,this.totalPage=1,this.currentPage=1,this.currentIcon=!1,this.iconsCount=0,this.open=!1,this.searchValues=[],this.availableCategoriesSearch=[],this.triggerEvent=null,this.backupSource=[],this.backupSearch=[],this.isCategorized=!1,this.selectCategory=this.iconPicker.find(".icon-category-select"),this.selectedCategory=!1,this.availableCategories=[],this.unCategorizedKey=null,this.init()}var b={theme:"fip-grey",source:!1,emptyIcon:!0,emptyIconValue:"",iconsPerPage:20,hasSearch:!0,searchSource:!1,useAttribute:!1,attributeName:"data-icon",convertToHex:!0,allCategoryText:"From all categories",unCategorizedText:"Uncategorized"};c.prototype={init:function(){this.iconPicker.addClass(this.settings.theme),this.iconPicker.css({left:-9999}).appendTo("body");var b=this.iconPicker.outerHeight(),c=this.iconPicker.outerWidth();if(this.iconPicker.css({left:""}),this.element.before(this.iconPicker),this.element.css({visibility:"hidden",top:0,position:"relative",zIndex:"-1",left:"-"+c+"px",display:"inline-block",height:b+"px",width:c+"px",padding:"0",margin:"0 -"+c+"px 0 0",border:"0 none",verticalAlign:"top"}),!this.element.is("select")){var d=function(){for(var a=3,b=document.createElement("div"),c=b.all||[];b.innerHTML="<!--[if gt IE "+ ++a+"]><br><![endif]-->",c[0];);return a>4?a:!a}(),e=document.createElement("div");this.triggerEvent=9!==d&&"oninput"in e?["input","keyup"]:["keyup"]}!this.settings.source&&this.element.is("select")?(this.settings.source=[],this.settings.searchSource=[],this.element.find("optgroup").length?(this.isCategorized=!0,this.element.find("optgroup").each(a.proxy(function(b,c){var d=this.availableCategories.length,e=a("<option />");e.attr("value",d),e.html(a(c).attr("label")),this.selectCategory.append(e),this.availableCategories[d]=[],this.availableCategoriesSearch[d]=[],a(c).find("option").each(a.proxy(function(b,c){var e=a(c).val(),f=a(c).html();e&&e!==this.settings.emptyIconValue&&(this.settings.source.push(e),this.availableCategories[d].push(e),this.searchValues.push(f),this.availableCategoriesSearch[d].push(f))},this))},this)),this.element.find("> option").length&&this.element.find("> option").each(a.proxy(function(b,c){var d=a(c).val(),e=a(c).html();return d&&""!==d&&d!=this.settings.emptyIconValue?(null===this.unCategorizedKey&&(this.unCategorizedKey=this.availableCategories.length,this.availableCategories[this.unCategorizedKey]=[],this.availableCategoriesSearch[this.unCategorizedKey]=[],a("<option />").attr("value",this.unCategorizedKey).html(this.settings.unCategorizedText).appendTo(this.selectCategory)),this.settings.source.push(d),this.availableCategories[this.unCategorizedKey].push(d),this.searchValues.push(e),this.availableCategoriesSearch[this.unCategorizedKey].push(e),void 0):!0},this))):this.element.find("option").each(a.proxy(function(b,c){var d=a(c).val(),e=a(c).html();d&&(this.settings.source.push(d),this.searchValues.push(e))},this)),this.backupSource=this.settings.source.slice(0),this.backupSearch=this.searchValues.slice(0),this.loadCategories()):this.initSourceIndex(),this.loadIcons(),this.selectCategory.on("change keyup",a.proxy(function(b){if(this.isCategorized===!1)return!1;var c=a(b.currentTarget),d=c.val();if("all"===c.val())this.settings.source=this.backupSource,this.searchValues=this.backupSearch;else{var e=parseInt(d,10);this.availableCategories[e]&&(this.settings.source=this.availableCategories[e],this.searchValues=this.availableCategoriesSearch[e])}this.resetSearch(),this.loadIcons()},this)),this.iconPicker.find(".selector-button").click(a.proxy(function(){this.toggleIconSelector()},this)),this.iconPicker.find(".selector-arrow-right").click(a.proxy(function(b){this.currentPage<this.totalPage&&(this.iconPicker.find(".selector-arrow-left").show(),this.currentPage=this.currentPage+1,this.renderIconContainer()),this.currentPage===this.totalPage&&a(b.currentTarget).hide()},this)),this.iconPicker.find(".selector-arrow-left").click(a.proxy(function(b){this.currentPage>1&&(this.iconPicker.find(".selector-arrow-right").show(),this.currentPage=this.currentPage-1,this.renderIconContainer()),1===this.currentPage&&a(b.currentTarget).hide()},this)),this.iconPicker.find(".icons-search-input").keyup(a.proxy(function(b){var c=a(b.currentTarget).val();return""===c?(this.resetSearch(),void 0):(this.searchIcon.removeClass("fip-icon-search"),this.searchIcon.addClass("fip-icon-cancel"),this.isSearch=!0,this.currentPage=1,this.iconsSearched=[],a.grep(this.searchValues,a.proxy(function(a,b){return a.toLowerCase().search(c.toLowerCase())>=0?(this.iconsSearched[this.iconsSearched.length]=this.settings.source[b],!0):void 0},this)),this.renderIconContainer(),void 0)},this)),this.iconPicker.find(".selector-search").on("click",".fip-icon-cancel",a.proxy(function(){this.iconPicker.find(".icons-search-input").focus(),this.resetSearch()},this)),this.iconContainer.on("click",".fip-box",a.proxy(function(b){this.setSelectedIcon(a(b.currentTarget).find("i").attr("data-fip-value")),this.toggleIconSelector()},this)),this.iconPicker.click(function(a){return a.stopPropagation(),!1}),a("html").click(a.proxy(function(){this.open&&this.toggleIconSelector()},this))},initSourceIndex:function(){if("object"==typeof this.settings.source){if(a.isArray(this.settings.source))this.isCategorized=!1,this.selectCategory.html("").hide(),this.settings.source=a.map(this.settings.source,function(a){return"function"==typeof a.toString?a.toString():a}),this.searchValues=a.isArray(this.settings.searchSource)?a.map(this.settings.searchSource,function(a){return"function"==typeof a.toString?a.toString():a}):this.settings.source.slice(0);else{var b=a.extend(!0,{},this.settings.source);this.settings.source=[],this.searchValues=[],this.availableCategoriesSearch=[],this.selectedCategory=!1,this.availableCategories=[],this.unCategorizedKey=null,this.isCategorized=!0,this.selectCategory.html("");for(var c in b){var d=this.availableCategories.length,e=a("<option />");e.attr("value",d),e.html(c),this.selectCategory.append(e),this.availableCategories[d]=[],this.availableCategoriesSearch[d]=[];for(var f in b[c]){var g=b[c][f],h=this.settings.searchSource&&this.settings.searchSource[c]&&this.settings.searchSource[c][f]?this.settings.searchSource[c][f]:g;"function"==typeof g.toString&&(g=g.toString()),g&&g!==this.settings.emptyIconValue&&(this.settings.source.push(g),this.availableCategories[d].push(g),this.searchValues.push(h),this.availableCategoriesSearch[d].push(h))}}}this.backupSource=this.settings.source.slice(0),this.backupSearch=this.searchValues.slice(0),this.loadCategories()}},loadCategories:function(){this.isCategorized!==!1&&(a('<option value="all">'+this.settings.allCategoryText+"</option>").prependTo(this.selectCategory),this.selectCategory.show().val("all").trigger("change"))},loadIcons:function(){this.iconContainer.html('<i class="fip-icon-spin3 animate-spin loading"></i>'),this.settings.source instanceof Array&&this.renderIconContainer()},renderIconContainer:function(){var b,c=[];if(c=this.isSearch?this.iconsSearched:this.settings.source,this.iconsCount=c.length,this.totalPage=Math.ceil(this.iconsCount/this.settings.iconsPerPage),this.totalPage>1?this.iconPicker.find(".selector-footer").show():this.iconPicker.find(".selector-footer").hide(),this.iconPicker.find(".selector-pages").html(this.currentPage+"/"+this.totalPage+" <em>("+this.iconsCount+")</em>"),b=(this.currentPage-1)*this.settings.iconsPerPage,this.settings.emptyIcon)this.iconContainer.html('<span class="fip-box"><i class="fip-icon-block" data-fip-value="fip-icon-block"></i></span>');else{if(c.length<1)return this.iconContainer.html('<span class="icons-picker-error"><i class="fip-icon-block" data-fip-value="fip-icon-block"></i></span>'),void 0;this.iconContainer.html("")}c=c.slice(b,b+this.settings.iconsPerPage);for(var e,d=0;e=c[d++];){var f=e;a.grep(this.settings.source,a.proxy(function(a,b){return a===e?(f=this.searchValues[b],!0):!1},this)),a("<span/>",{html:'<i data-fip-value="'+e+'" '+(this.settings.useAttribute?this.settings.attributeName+'="'+(this.settings.convertToHex?"&#x"+parseInt(e,10).toString(16)+";":e)+'"':'class="'+e+'"')+"></i>","class":"fip-box",title:f}).appendTo(this.iconContainer)}this.settings.emptyIcon||this.element.val()&&-1!==a.inArray(this.element.val(),this.settings.source)?-1===a.inArray(this.element.val(),this.settings.source)?this.setSelectedIcon():this.setSelectedIcon(this.element.val()):this.setSelectedIcon(c[0])},setHighlightedIcon:function(){this.iconContainer.find(".current-icon").removeClass("current-icon"),this.currentIcon&&this.iconContainer.find('[data-fip-value="'+this.currentIcon+'"]').parent("span").addClass("current-icon")},setSelectedIcon:function(a){if("fip-icon-block"===a&&(a=""),this.settings.useAttribute?a?this.iconPicker.find(".selected-icon").html("<i "+this.settings.attributeName+'="'+(this.settings.convertToHex?"&#x"+parseInt(a,10).toString(16)+";":a)+'"></i>'):this.iconPicker.find(".selected-icon").html('<i class="fip-icon-block"></i>'):this.iconPicker.find(".selected-icon").html('<i class="'+(a||"fip-icon-block")+'"></i>'),this.element.val(""===a?this.settings.emptyIconValue:a).trigger("change"),null!==this.triggerEvent)for(var b in this.triggerEvent)this.element.trigger(this.triggerEvent[b]);this.currentIcon=a,this.setHighlightedIcon()},toggleIconSelector:function(){this.open=this.open?0:1,this.iconPicker.find(".selector-popup").slideToggle(300),this.iconPicker.find(".selector-button i").toggleClass("fip-icon-down-dir"),this.iconPicker.find(".selector-button i").toggleClass("fip-icon-up-dir"),this.open&&this.iconPicker.find(".icons-search-input").focus().select()},resetSearch:function(){this.iconPicker.find(".icons-search-input").val(""),this.searchIcon.removeClass("fip-icon-cancel"),this.searchIcon.addClass("fip-icon-search"),this.iconPicker.find(".selector-arrow-left").hide(),this.currentPage=1,this.isSearch=!1,this.renderIconContainer(),this.totalPage>1&&this.iconPicker.find(".selector-arrow-right").show()}},a.fn.fontIconPicker=function(b){return this.each(function(){a.data(this,"fontIconPicker")||a.data(this,"fontIconPicker",new c(this,b))}),this.setIcons=a.proxy(function(b,c){void 0===b&&(b=!1),void 0===c&&(c=!1),this.each(function(){a.data(this,"fontIconPicker").settings.source=b,a.data(this,"fontIconPicker").settings.searchSource=c,a.data(this,"fontIconPicker").initSourceIndex(),a.data(this,"fontIconPicker").resetSearch(),a.data(this,"fontIconPicker").loadIcons()})},this),this.destroyPicker=a.proxy(function(){this.each(function(){a.data(this,"fontIconPicker")&&(a.data(this,"fontIconPicker").iconPicker.remove(),a.data(this,"fontIconPicker").element.css({visibility:"",top:"",position:"",zIndex:"",left:"",display:"",height:"",width:"",padding:"",margin:"",border:"",verticalAlign:""}),a.removeData(this,"fontIconPicker"))})},this),this.refreshPicker=a.proxy(function(d){d||(d=b),this.destroyPicker(),this.each(function(){a.data(this,"fontIconPicker")||a.data(this,"fontIconPicker",new c(this,d))})},this),this}}(jQuery);
 
 
 jQuery( document ).ready( function() {
	function kt_init_iconpicker( widget ) {
	        jQuery(widget).find( 'select.kad_icomoon').fontIconPicker({
			emptyIcon:true,
			iconsPerPage:25,
	  	});
	}
	function kt_initColorPicker( widget ) {
	        jQuery(widget).find( '.kad-widget-colorpicker' ).wpColorPicker( {
	                change: _.throttle( function() { // For Customizer
	                        jQuery(this).trigger( 'change' );
	                }, 3000 )
	        });
	}
        jQuery( '#widgets-right .widget:has(select.kad_icomoon)' ).each( function () {
                kt_init_iconpicker( jQuery( this ) );                                                   
        } );
        jQuery( '#widgets-right .widget:has(.kad-widget-colorpicker)' ).each( function () {
                kt_initColorPicker( jQuery( this ) );                                                   
        } );
        function kt_onFormUpdate( event, widget ) {
		    kt_initColorPicker( widget );
		    kt_init_iconpicker( widget );
		}
		jQuery( document ).on( 'widget-added widget-updated', kt_onFormUpdate );
		jQuery( document ).on( 'panelsopen', kt_onpanelUpdate );
		 function kt_onpanelUpdate( event, widget ) {
		    kt_initColorPicker( '.so-content.panel-dialog' );
		    kt_init_iconpicker( '.so-content.panel-dialog' );
		}
} );

 jQuery(document).ready(function($) {
  $('select#kadence-shortcodes').select2().on("select2-open", function() {
      		$('body').addClass('kt-select-mask');
	}).on("select2:open", function() {
      		$('body').addClass('kt-select-mask');
      		$('.wp-admin .mfp-wrap.kt-mfp-shortcode').removeAttr('tabindex');
	}).on("select2-close", function() {
      		$('body').removeClass('kt-select-mask');
	}).on("select2:close", function() {
      		$('body').removeClass('kt-select-mask');
	});
	$('select.kad-sc-select').select2().on("select2-open", function() {
      		$('body').addClass('kt-select-mask');
	}).on("select2:open", function() {
      		$('body').addClass('kt-select-mask');
	}).on("select2-close", function() {
      		$('body').removeClass('kt-select-mask');
	}).on("select2:close", function() {
      		$('body').removeClass('kt-select-mask');
	});
  $('select.kad-icon-select').fontIconPicker({
	emptyIcon:true,
	iconsPerPage:25,
  });
$('#post-formats-select input').change(checkFormat);
function checkFormat(){
  var format = $('#post-formats-select input:checked').attr('value');
		
		if(typeof format != 'undefined'){
			
				if(format == 'gallery'){
					$('#gallery_post_metabox').stop(true,true).fadeIn(500);
				}
				else {
					$('#gallery_post_metabox').stop(true,true).fadeOut(500);
				}
				if(format == '0'){
					$('#standard_post_metabox').stop(true,true).fadeIn(500);
				}
				else {
					$('#standard_post_metabox').stop(true,true).fadeOut(500);
				}
				if(format == 'image'){
					$('#image_post_metabox').stop(true,true).fadeIn(500);
				}
				else {
					$('#image_post_metabox').stop(true,true).fadeOut(500);
				}
				if(format == 'video'){
					$('#video_post_metabox').stop(true,true).fadeIn(500);
				}
				else {
					$('#video_post_metabox').stop(true,true).fadeOut(500);
				}
				
			}
		}
	$(window).load(function(){
		checkFormat();
	})
});


  (function($){
    "use strict";

    $.imgupload = $.imgupload || {};
    
    $(document).ready(function () {
         $.imgupload();
    });
$.imgupload = function(){
        // When the user clicks on the Add/Edit gallery button, we need to display the gallery editing
        $('body').on({
             click: function(event){
                var current_imgupload = $(this).closest('.kad_img_upload_widget');

                // Make sure the media gallery API exists
                if ( typeof wp === 'undefined' || ! wp.media ) {
                    return;
                }
                event.preventDefault();

                var frame;
                // Activate the media editor
                var $$ = $(this);

                // If the media frame already exists, reopen it.
                if ( frame ) {
                        frame.open();
                        return;
                    }

                    // Create the media frame.
                    frame = wp.media({
                        multiple: false,
                        library: {type: 'image'}
                    });

                        // When an image is selected, run a callback.
                frame.on( 'select', function() {

                    // Grab the selected attachment.
                    var attachment = frame.state().get('selection').first();
                    frame.close();

                    current_imgupload.find('.kad_custom_media_url').val(attachment.attributes.url);
                    current_imgupload.find('.kad_custom_media_id').val(attachment.attributes.id);
                    var thumbSrc = attachment.attributes.url;
                    if (typeof attachment.attributes.sizes !== 'undefined' && typeof attachment.attributes.sizes.thumbnail !== 'undefined') {
                        thumbSrc = attachment.attributes.sizes.thumbnail.url;
                    } else {
                        thumbSrc = attachment.attributes.icon;
                    }
                    current_imgupload.find('.kad_custom_media_image').attr('src', thumbSrc);
                });

                // Finally, open the modal.
                frame.open();
            }

        }, '.kad_custom_media_upload');
     };
})(jQuery);


(function($){
    "use strict";
    
    $.pinnaclegallery = $.pinnaclegallery || {};
    
    $(document).ready(function () {
        $.pinnaclegallery();
    });

    $.pinnaclegallery = function(){
        // When the user clicks on the Add/Edit gallery button, we need to display the gallery editing
        $('body').on({
            click: function(event){
                var current_gallery = $(this).closest('.kad_widget_image_gallery');

                if (event.currentTarget.id === 'clear-gallery') {
                    //remove value from input 
                    
                    var rmVal = current_gallery.find('.gallery_values').val('');

                    //remove preview images
                    current_gallery.find(".gallery_images").html("");

                    return;

                }

                // Make sure the media gallery API exists
                if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
                    return;
                }
                event.preventDefault();

                // Activate the media editor
                var $$ = $(this);

                var val = current_gallery.find('.gallery_values').val();
                wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
                    template: function(view){
                      return;
                    },
                });
                var final;
                if (!val) {
                    var options = {
					frame: 'post',
					       state: 'gallery',
					       multiple: true
					};

					var frame = wp.media.editor.open('gallery_values',options);
                } else {
                    final = '[gallery ids="' + val + '"]';
                    frame = wp.media.gallery.edit(final);
                }


                    
                // When the gallery-edit state is updated, copy the attachment ids across
                frame.state('gallery-edit').on( 'update', function( selection ) {

                    //clear screenshot div so we can append new selected images
                    current_gallery.find(".gallery_images").html("");
                    
                    var element, preview_html= "", preview_img, img_id;
                    var ids = selection.models.map(function(e){
                        element = e.toJSON();
                        preview_img = typeof element.sizes.thumbnail !== 'undefined'  ? element.sizes.thumbnail.url : element.url ;
                        img_id = element.id;
                        preview_html = '<a class="of-uploaded-image edit-kt-meta-gal" data-attachment-id="'+img_id+'" href="#"><img class="gallery-widget-image" src="'+preview_img+'" /></a>';
                        current_gallery.find(".gallery_images").append(preview_html);
                        return e.id;
                    });
                    current_gallery.find('.gallery_values').val(ids.join(','));
                     current_gallery.find( '.gallery_values' );
    
                });


                return false;
            }
        }, '.gallery-attachments');
    };
})(jQuery);
(function($){
    "use strict";
    
    $.pinnacle_attachment_gallery = $.pinnacle_attachment_gallery || {};
    
    $(document).ready(function () {
        $.pinnacle_attachment_gallery();
    });

    $.pinnacle_attachment_gallery = function(){
        // When the user clicks on the Add/Edit gallery button, we need to display the gallery editing
        $('body').on({
            click: function(event){
                var current_gallery = $(this).closest('.kad_widget_image_gallery');
                var selected = $(this).data('attachment-id');

                // Make sure the media gallery API exists
                if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
                    return;
                }

                event.preventDefault();
                // Activate the media editor
                 wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
                    template: function(view){
                      return;
                    },
                });
                var $$ = $(this);
                var val = current_gallery.find('.gallery_values').val();
                var final = '[gallery ids="' + val + '"]';
                var frame = wp.media.gallery.edit(final);
                
                // When the gallery-edit state is updated, copy the attachment ids across
                frame.state('gallery-edit').on( 'update', function( selection ) {

                    //clear screenshot div so we can append new selected images
                    current_gallery.find(".gallery_images").html("");
                    
                    var element, preview_html= "", preview_img, img_id;
                    var ids = selection.models.map(function(e){
                        element = e.toJSON();
                        preview_img = typeof element.sizes.thumbnail !== 'undefined'  ? element.sizes.thumbnail.url : element.url ;
                        img_id = element.id;
                        preview_html = '<a class="of-uploaded-image edit-kt-meta-gal" data-attachment-id="'+img_id+'" href="#"><img class="gallery-widget-image" src="'+preview_img+'" /></a>';
                        current_gallery.find(".gallery_images").append(preview_html);
                        return e.id;
                    });
                    current_gallery.find('.gallery_values').val(ids.join(','));
                    current_gallery.find( '.gallery_values' );
    
                });


                return false;
            }
        }, '.edit-kt-meta-gal');
    };
})(jQuery);
/* Tabs and accordion widget. Thanks Proteus themes for plugin example. */

/**
 * Admin dashboard JS code
 */
(function( $ ) {

	// Make tabs settings foldable.
	$(document).on( 'click', '.kadence-tabs-widget-toggle', function() {
		$( this ).toggleClass( 'dashicons-minus dashicons-plus' );
		$( this ).closest( '.kadence-tabs-widget' ).find( '.kadence-tabs-widget-content' ).toggle();
	});

	// Update tab setting header on tab title change.
	$(document).on( 'change', '.js-kadence-tabs-widget-title', function() {
		$( this ).closest( '.kadence-tabs-widget' ).find( '.kadence-tabs-widget-header-title' ).text( $( this ).val() );
	});

})( jQuery );

/********************************************************
 			Backbone code for repeating fields in widget
********************************************************/

// Namespace for Backbone elements
window.KTTabs = {
	Models:    {},
	ListViews: {},
	Views:     {},
	Utils:     {},
};

/**
 ******************** Backbone Models *******************
 */

_.extend( KTTabs.Models, {
	Tab: Backbone.Model.extend( {
		defaults: {
			'title':       '',
			'builder_id':  '',
			'panels_data': '',
		}
	} ),
} );

/**
 ******************** Backbone Views *******************
 */

// Generic single view that others can extend from
KTTabs.Views.Abstract = Backbone.View.extend( {
	initialize: function ( params ) {
		this.templateHTML = params.templateHTML;

		return this;
	},

	render: function () {
		this.$el.html( Mustache.render( this.templateHTML, this.model.attributes ) );

		return this;
	},

	destroy: function ( ev ) {
		ev.preventDefault();

		this.remove();
		this.model.trigger( 'destroy' );
	},
} );

_.extend( KTTabs.Views, {

	// View of a single tab
	Tab: KTTabs.Views.Abstract.extend( {
		className: 'kadence-widget-single-tab',

		events: {
			'click .js-kadence-remove-tab': 'destroy',
		},

		render: function () {
			this.model.set( 'panels_data', JSON.stringify( this.model.get('panels_data') ) );
			this.$el.html( Mustache.render( this.templateHTML, this.model.attributes ) );

			return this;
		},
	} ),

} );


/**
 ******************** Backbone ListViews *******************
 *
 * Parent container for multiple view nodes.
 */

KTTabs.ListViews.Abstract = Backbone.View.extend( {

	initialize: function ( params ) {
		this.widgetId     = params.widgetId;
		this.itemsModel   = params.itemsModel;
		this.itemView     = params.itemView;
		this.itemTemplate = params.itemTemplate;

		// Cached reference to the element in the DOM
		this.$items = this.$( params.itemsClass );

		// Collection of items
		this.items = new Backbone.Collection( [], {
			model: this.itemsModel
		} );

		// Listen to adding of the new items
		this.listenTo( this.items, 'add', this.appendOne );

		return this;
	},

	addNew: function ( ev ) {
		ev.preventDefault();

		var currentMaxId = this.getMaxId();

		this.items.add( new this.itemsModel( {
			id: (currentMaxId + 1)
		} ) );

		return this;
	},

	getMaxId: function () {
		if ( this.items.isEmpty() ) {
			return -1;
		}
		else {
			var itemWithMaxId = this.items.max( function ( item ) {
				return parseInt( item.id, 10 );
			} );

			return parseInt( itemWithMaxId.id, 10 );
		}
	},

	appendOne: function ( item ) {
		var renderedItem = new this.itemView( {
			model:        item,
			templateHTML: jQuery( this.itemTemplate + this.widgetId ).html()
		} ).render();

		var currentWidgetId = this.widgetId;

		// If the widget is in the initialize state (hidden), then do not append a new item
		if ( '__i__' !== currentWidgetId.slice( -5 ) ) {
			this.$items.append( renderedItem.el );
		}

		return this;
	}
} );


_.extend( KTTabs.ListViews, {

	// Collection of all tabs, but associated with each individual widget
	Tabs: KTTabs.ListViews.Abstract.extend( {
		events: {
			'click .js-kadence-add-tab': 'addNew'
		},

		// Overwrite the appendOne function to setup the layout builder
		appendOne: function ( item ) {
			// Set an unique ID for a new tab (will be used in the div id)
			item.attributes.builder_id = _.uniqueId('layout-builder-');

			var renderedItem = new this.itemView( {
				model:        item,
				templateHTML: jQuery( this.itemTemplate + this.widgetId ).html()
			} ).render();

			var currentWidgetId = this.widgetId;

			// If the widget is in the initialize state (hidden), then do not append a new item
			if ( '__i__' !== currentWidgetId.slice( -5 ) ) {
				this.$items.append( renderedItem.el );
			}

			// Setup the Page Builder layout builder
			if(typeof jQuery.fn.soPanelsSetupBuilderWidget != 'undefined' && !jQuery('body').hasClass('wp-customizer')) {
				jQuery( "#siteorigin-page-builder-widget-" + item.attributes.builder_id ).soPanelsSetupBuilderWidget();
			}

			return this;
		}
	} ),
} );


/**
 ******************** Repopulate Functions *******************
 */

_.extend( KTTabs.Utils, {
	// Generic repopulation function used in all repopulate functions
	repopulateGeneric: function ( collectionType, parameters, json, widgetId ) {
		var collection = new collectionType( parameters );

		// Convert to array if needed
		if ( _( json ).isObject() ) {
			json = _( json ).values();
		}

		// Add all items to collection of newly created view
		collection.items.add( json, { parse: true } );
	},

	/**
	 * Function which adds the existing tabs to the DOM
	 * @param  {json} tabsJSON
	 * @param  {string} widgetId ID of widget from PHP $this->id
	 * @return {void}
	 */
	repopulateTabs: function ( tabsJSON, widgetId ) {
		var parameters = {
			el:           '#tabs-' + widgetId,
			widgetId:     widgetId,
			itemsClass:   '.tabs',
			itemTemplate: '#js-kadence-tab-',
			itemsModel:   KTTabs.Models.Tab,
			itemView:     KTTabs.Views.Tab,
		};

		this.repopulateGeneric( KTTabs.ListViews.Tabs, parameters, tabsJSON, widgetId );
	},
} );