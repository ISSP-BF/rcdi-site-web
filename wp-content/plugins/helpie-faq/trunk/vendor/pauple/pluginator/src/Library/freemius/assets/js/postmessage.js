!function(t,e){var n,s,o,i,r,a,c,p,u=this;u.FS=u.FS||{},u.FS.PostMessage=(s=new NoJQueryPostMessageMixin("postMessage","receiveMessage"),o={},i=decodeURIComponent(document.location.hash.replace(/^#/,"")),r=i.substring(0,i.indexOf("/","https://"===i.substring(0,"https://".length)?8:7)),a=""!==i,c=t(window),p=t("html"),{init:function(t,e){n=t,s.receiveMessage((function(t){var e=JSON.parse(t.data);if(o[e.type])for(var n=0;n<o[e.type].length;n++)o[e.type][n](e.data)}),n),FS.PostMessage.receiveOnce("forward",(function(t){window.location=t.url})),(e=e||[]).length>0&&c.on("scroll",(function(){for(var t=0;t<e.length;t++)FS.PostMessage.postScroll(e[t])}))},init_child:function(){this.init(r),t(window).bind("load",(function(){FS.PostMessage.postHeight(),FS.PostMessage.post("loaded")}))},hasParent:function(){return a},postHeight:function(e,n){e=e||0,n=n||"#wrap_section",this.post("height",{height:e+t(n).outerHeight(!0)})},postScroll:function(t){this.post("scroll",{top:c.scrollTop(),height:c.height()-parseFloat(p.css("paddingTop"))-parseFloat(p.css("marginTop"))},t)},post:function(t,e,n){n?s.postMessage(JSON.stringify({type:t,data:e}),n.src,n.contentWindow):s.postMessage(JSON.stringify({type:t,data:e}),i,window.parent)},receive:function(t,n){e===o[t]&&(o[t]=[]),o[t].push(n)},receiveOnce:function(t,e){this.is_set(t)||this.receive(t,e)},is_set:function(t){return e!=o[t]},parent_url:function(){return i},parent_subdomain:function(){return r}})}(jQuery);