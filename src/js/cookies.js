/*! js-cookie v3.0.0-rc.4 | MIT */
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(e=e||self,function(){var n=e.Cookies,r=e.Cookies=t();r.noConflict=function(){return e.Cookies=n,r}}())}(this,function(){"use strict";function e(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var r in n)e[r]=n[r]}return e}var t={read:function(e){return e.replace(/(%[\dA-F]{2})+/gi,decodeURIComponent)},write:function(e){return encodeURIComponent(e).replace(/%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g,decodeURIComponent)}};return function n(r,o){function i(t,n,i){if("undefined"!=typeof document){"number"==typeof(i=e({},o,i)).expires&&(i.expires=new Date(Date.now()+864e5*i.expires)),i.expires&&(i.expires=i.expires.toUTCString()),t=encodeURIComponent(t).replace(/%(2[346B]|5E|60|7C)/g,decodeURIComponent).replace(/[()]/g,escape),n=r.write(n,t);var c="";for(var u in i)i[u]&&(c+="; "+u,!0!==i[u]&&(c+="="+i[u].split(";")[0]));return document.cookie=t+"="+n+c}}return Object.create({set:i,get:function(e){if("undefined"!=typeof document&&(!arguments.length||e)){for(var n=document.cookie?document.cookie.split("; "):[],o={},i=0;i<n.length;i++){var c=n[i].split("="),u=c.slice(1).join("=");'"'===u[0]&&(u=u.slice(1,-1));try{var f=t.read(c[0]);if(o[f]=r.read(u,f),e===f)break}catch(e){}}return e?o[e]:o}},remove:function(t,n){i(t,"",e({},n,{expires:-1}))},withAttributes:function(t){return n(this.converter,e({},this.attributes,t))},withConverter:function(t){return n(e({},this.converter,t),this.attributes)}},{attributes:{value:Object.freeze(o)},converter:{value:Object.freeze(r)}})}(t,{path:"/"})});

  const pageGet = window.location.search.substr(1);
  if(pageGet.includes('rdtm')){
  	Cookies.set('rd_GAB', pageGet, { domain: 'rapiddirect.com', expires: 30 });
	const now = new Date();
	Cookies.set('rd_GAB_created', now.toISOString(), { domain: 'rapiddirect.com', expires: 30});
  }
  if(pageGet.includes('salesrep')){
	let searchParams = new URLSearchParams(window.location.search.substr(1));
	Cookies.set('rd_salesrep', searchParams.get("salesrep"), { domain: 'rapiddirect.com', expires: 30 })
  }
  
  function closeNotify(){
  	Cookies.set('rd_notify_cms', 'true', { expires: 1, path: '/' })
	isSingleNotification();
  }
  function closeNotifyFlip(){
  	Cookies.set('rd_notify_cms_flip', 'true', { expires: 1, path: '/' })
	isSingleNotification();
  }
  (function() {
  	if(!Cookies.get('rd_usr_landing')){
  		Cookies.set('rd_usr_landing', window.location.href.split('?')[0], { domain: 'rapiddirect.com', expires: 3 })
  		Cookies.set('rd_usr_landing_full_url', window.location.href, { domain: 'rapiddirect.com', expires: 3 })
  	}
  })();
  Cookies.set('rd_last_page_visit', window.location, { domain: 'rapiddirect.com', expires: 30 })
  if(!Cookies.get('rd_usr_landing_session')){
  	Cookies.set('rd_usr_landing_session', window.location.href.split('?')[0], { domain: 'rapiddirect.com' })
  }
	//Notification Center
(function() {
  	if(!Cookies.get('rd_notify_cms') || !Cookies.get('rd_notify_cms_flip')){
		var currentdate = new Date();
		ppp = '/wp-content/themes/mml-theme/notification-center.php'
		fetch("/notification-center/?time=" + currentdate)
		  .then((response) => {
			return response.text();
		  })
		  .then((html) => {
			const divp = document.createElement("div");
			divp.className = "notification-center-rd";
			divp.innerHTML = html;
			let notifyP = document.querySelector('#header-rd-p');
			notifyP.prepend(divp);
			jQuery('.switcher.top-switch .selected a span.jkhui').html(jQuery('.switcher:not(.top-switch) .selected a').html())
			isSingleNotification();
			jQuery(window).trigger('resize')
			watchForWheelButton(); 
		  });
  	}else{
		isSingleNotification();
	}
})();
function isSingleNotification(){
	if(Cookies.get('rd_notify_cms') || Cookies.get('rd_notify_cms_flip')){
		jQuery(".simple-flip-e-d").removeClass("flip-notification");
		jQuery(".notify-center").addClass("position-relative-imp");
		jQuery(".ghost-div").remove();	 
	}
	if(Cookies.get('rd_notify_cms')){
	   	jQuery(".front-flip-notify").remove();
		jQuery(".notify-center").removeClass("back-flip-notify");
	}
	if(Cookies.get('rd_notify_cms_flip')){
	   jQuery(".back-flip-botify-v2").remove();	
	}
};

jQuery(function(){
    var lastScrollTop = 0, delta = 15;
    jQuery(window).scroll(function(event){
	   event.preventDefault();
	   event.stopPropagation();
		//console.log('working right');
	   var navbarHeight = jQuery('.notification-center-rd').outerHeight();
       var st = window.pageYOffset;
//        if(Math.abs(lastScrollTop - st) <= delta)
//           return;
if (st >> 0) {
	//console.log('working right if');
       // downscroll code
      //jQuery(".notification-center-rd").css({"top":"-80px", "margin-bottom": "-"+navbarHeight+"px"});
//   		jQuery(".notification-center-rd").addClass('hide-ntfy')
		jQuery(".notification-center-rd").hide();
		jQuery(".mml-ele-custom-menu").addClass('top-75');
   } else if(st == 0 ){
	   //console.log('working right if else');
      // upscroll code
      //jQuery(".notification-center-rd").css({"top":"0px", "margin-bottom": "0px"});
// 	   jQuery(".notification-center-rd").removeClass('hide-ntfy')
       jQuery(".notification-center-rd").show();
	   jQuery(".mml-ele-custom-menu").removeClass('top-75');
   }
       lastScrollTop = st;
    });
});

function gt_jquery_ready_custom(event) {
	event.preventDefault();
	jQuery('.switcher .option-2 a img').each(function() {
		if (!jQuery(this)[0].hasAttribute('src')) jQuery(this).attr('src', jQuery(this).attr('data-gt-lazy-src'))
	});
	jQuery('.switcher.top-options').toggle();
}