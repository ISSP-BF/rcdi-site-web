var FaqCollections=require("../faq/collections.js"),FaqFunctions=require("../faq/functions.js"),selectors={pagination:".helpie-faq__pagination",paginationHide:"helpie-faq__pagination--hide",pages:".helpie-faq__pagination__listItem .helpie-faq__pagination__listItem--anchor"},Pagination={init:function(){this.events()},events:function(){var e=this;jQuery(selectors.pagination).on("click",selectors.pages,(function(){e.loadFAQs(this)}))},loadFAQs:function(e){let t=this,a=jQuery(e).attr("data-page"),n=t.getTotalNoOfPage(e),i=t.getCurrentPage(e);if(a instanceof String||"string"==typeof a)if("PREV"==a){if(0==i)return!1;a=parseInt(i)-1}else if("NEXT"==a){if(parseInt(i)===parseInt(n))return!1;a=parseInt(i)+1}let s=FaqFunctions.getElements(e),o=FaqFunctions.getCollectionPropsFromHtml(s);o.search_term=t.getSearchValue(s),o.page=a,t.setFAQs(o,s),0==jQuery(s.root).attr("data-search")&&jQuery(s.root).attr("data-pagination",a)},setFAQs:function(e,t){let a=FaqFunctions.getShortcodeIndex(t);e.shortcodeIndex=a;let n=FaqCollections.getCurrentShortcodeViewProps(a),i=n.items,s=FaqCollections.getTotalNoOfPages(n);if(""!=e.search_term&&null!=e.search_term&&"undefined"!=e.search_term){let t=FaqFunctions.searchTermFromFaqObject(i,e.search_term);s=FaqCollections.getTotalNoOfPages({collection:n.collection,items:t}),i=t}let o=FaqCollections.getCurrentPageViewProps(e,{collection:n.collection,items:i});FaqFunctions.appendFaqsContent(t,o),this.renderPageLinks(t.pagination,{current:e.page,last:s})},loader:function(e,t){const a=1==t?"active":"",n=0==t?"active":"";jQuery(e).closest(selectors.pagination).find(".helpie-faq__spinner").removeClass(n).addClass(a)},getCurrentPage:function(e){let t=jQuery(e).closest(selectors.pagination).find(selectors.pages+".active").attr("data-page");return t=null==t?0:parseInt(t),t},getTotalNoOfPage:function(e){let t=jQuery(e).closest(selectors.pagination).find(selectors.pages).last().attr("data-page");return parseInt(t)},renderPageLinks:function(e,t){let a=this,n="";n+=a.getPageLink({page:0,label:"First"}),n+=a.getPageLink({page:"PREV",label:"Previous"}),n+=a.getPagesLinks(t.last,t.current),n+=a.getPageLink({page:"NEXT",label:"Next"}),n+=a.getPageLink({page:t.last,label:"Last"}),jQuery(e).removeClass(selectors.paginationHide).find(".helpie-faq__pagination__list").empty().append(n)},getPagesLinks:function(e,t){let a=this,n=[-2,-1,0,1,2],i="";for(buttonItr=0;buttonItr<n.length;buttonItr++){let s=n[buttonItr],o=parseInt(t)+parseInt(s),r=o==t?"active":"";o>=0&&o<=e&&(i+=a.getPageLink({classes:r,page:o,label:parseInt(o)+1}))}return i},getPageLink:function(e){let t="";return t+='<li class="helpie-faq__pagination__listItem">',t+='<a class="helpie-faq__pagination__listItem--anchor '+(void 0===e.classes?"":e.classes)+' " data-page="'+e.page+'">'+e.label+"</a>",t+="</li>",t},getSearchValue:function(e){let t=jQuery(e.root).find(".search__input");return 0==t.length?"":t.val().toLowerCase().replace(/[.*+?^${}()|[\]\\]/gi,"")}};module.exports=Pagination;