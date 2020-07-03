                                 var swsource = "https://semchilique.opasaquei.com.br/pwa-sw.js";                                          
                                 var config = pnScriptSetting.pn_config;if (!firebase.apps.length) {firebase.initializeApp(config);}
                            const messaging = firebase.messaging();                                 
              function PWAforwpreadCookie(name) {
                  var nameEQ = name + "=";
                  var ca = document.cookie.split(";");
                  for(var i=0;i < ca.length;i++) {
                      var c = ca[i];
                      while (c.charAt(0)==" ") c = c.substring(1,c.length);
                      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                  }
                  return null;
              }
			         if("serviceWorker" in navigator) {
                                     window.addEventListener('load', function() {			         		
			                navigator.serviceWorker.register(swsource, {scope: 'https://semchilique.opasaquei.com.br/'}).then(function(reg){                                                                                        
			                    console.log('Congratulations!!Service Worker Registered ServiceWorker scope: ', reg.scope);
                                            messaging.useServiceWorker(reg); pushnotification_load_messaging();                                                                        
			                }).catch(function(err) {
			                    console.log('ServiceWorker registration failed: ', err);
			                });	
                                                                                                                                                                                                                                                                              
			                var deferredPrompt;                           
                      window.addEventListener('beforeinstallprompt', (e) => {
							  e.preventDefault();
							  deferredPrompt = e;
                                                          
                    if(deferredPrompt != null || deferredPrompt != undefined){

                        var a2hsviashortcode = document.getElementsByClassName("pwaforwp-add-via-class");
                        if(a2hsviashortcode !== null){
                            for (var i = 0; i < a2hsviashortcode.length; i++) {
                              a2hsviashortcode[i].style.display="inline-block"; 
                          }
                        }
                        
                        var a2hsviashortcode = document.getElementsByClassName("pwaforwp-sticky-banner");
                        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent); 
                        if(a2hsviashortcode !== null && checkbarClosedOrNot() && (typeof pwa_cta_assets !== 'undefined') && (pwa_cta_assets.a2h_sticky_on_desktop_cta==1 || isMobile)){
                            for (var i = 0; i < a2hsviashortcode.length; i++) {
                              a2hsviashortcode[i].style.display="flex"; 
                          }
                        }

                        var lastScrollTop = 0;                                        
                              window.addEventListener("scroll", (evt) => {
                                var st = document.documentElement.scrollTop;
                                var closedTime = PWAforwpreadCookie("pwaforwp_prompt_close")
                                    if(closedTime){
                                      var today = new Date();
                                      var closedTime = new Date(closedTime);
                                      var diffMs = (today-closedTime);
                                      var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
                                      if(diffMins<4){
                                        return false;
                                      }
                                    }
                                    if (st > lastScrollTop){
                                       if(deferredPrompt !=null){
                                       var isMobile = /Android/i.test(navigator.userAgent);   if(isMobile){                                                    
                                            var a2hsdesk = document.getElementById("pwaforwp-add-to-home-click");
                                                    if(a2hsdesk !== null  && checkbarClosedOrNot()){
                                                        a2hsdesk.style.display = "block";
                                                    }   
                                        }                                                                 
                                       }                                              
                                    } else {
                                    var bhidescroll = document.getElementById("pwaforwp-add-to-home-click");
                                    if(bhidescroll !== null){
                                    bhidescroll.style.display = "none";
                                    }                                              
                                    }
                                 lastScrollTop = st;  
                                });var addtohomeCloseBtn = document.getElementById("pwaforwp-prompt-close");
                                if(addtohomeCloseBtn !==null){
                                  addtohomeCloseBtn.addEventListener("click", (e) => {
                                      var bhidescroll = document.getElementById("pwaforwp-add-to-home-click");
                                      if(bhidescroll !== null){
                                        bhidescroll.style.display = "none";
                                        document.cookie = "pwaforwp_prompt_close="+new Date();
                                      }                                         
                                  });
                                }
                              var addtohomeBtn = document.getElementById("pwaforwp-add-to-home-click"); 
                                if(addtohomeBtn !==null){
                                    addtohomeBtn.addEventListener("click", (e) => {
                                    addToHome();  
                                });
                                }

                     }
                                                                                                                    
							});			    
              function checkbarClosedOrNot(){
                var closedTime = PWAforwpreadCookie("pwaforwp_prompt_close")
                  if(closedTime){
                    var today = new Date();
                    var closedTime = new Date(closedTime);
                    var diffMs = (today-closedTime);
                    var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
                    if(diffMs){//diffMins<4
                      return false;
                    }
                  }
                  return true;
              }
              
              // Safari 3.0+ "[object HTMLElementConstructor]" 
              var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));
              if( isSafari ){
                var a2hsviashortcode = document.getElementsByClassName("pwaforwp-add-via-class");
                  if(a2hsviashortcode !== null){
                      for (var i = 0; i < a2hsviashortcode.length; i++) {
                        a2hsviashortcode[i].style.display="inline-block"; 
                    }
                  }
                  
                  var a2hsviashortcode = document.getElementsByClassName("pwaforwp-sticky-banner");
                  var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent); 
                  if(a2hsviashortcode !== null && checkbarClosedOrNot() && (typeof pwa_cta_assets !== 'undefined') && (pwa_cta_assets.a2h_sticky_on_desktop_cta==1 || isMobile) ){
                      for (var i = 0; i < a2hsviashortcode.length; i++) {
                        a2hsviashortcode[i].style.display="flex"; 
                    }
                  }
              }                                                         
                                                     
                                                                                                                                                               
                                                     var a2hsviashortcode = document.getElementsByClassName("pwaforwp-add-via-class");
                                                        if(a2hsviashortcode !== null){
                                                            for (var i = 0; i < a2hsviashortcode.length; i++) {
                                                              a2hsviashortcode[i].addEventListener("click", addToHome); 
                                                          }
                                                        }
                                         
                                                     window.addEventListener('appinstalled', (evt) => {
							  
                                                          var a2hsviashortcode = document.getElementsByClassName("pwaforwp-add-via-class");
                                                                 if(a2hsviashortcode !== null){
                                                                     for (var i = 0; i < a2hsviashortcode.length; i++) {
                                                                       a2hsviashortcode[i].style.display="none"; 
                                                                   }
                                                                 }
                                                                 
                                                                 var a2hsviashortcode = document.getElementsByClassName("pwaforwp-sticky-banner");
                                                                    if(a2hsviashortcode !== null){
                                                                        for (var i = 0; i < a2hsviashortcode.length; i++) {
                                                                          a2hsviashortcode[i].style.display="none"; 
                                                                      }
                                                                    }
                                                          var addtohomeBtn = document.getElementById("pwaforwp-add-to-home-click");
                                                          if(addtohomeBtn !==null){ 
                                                            addtohomeBtn.style.display="none";
                                                          }                                           
                                                     });  
                                                                                                          
                                                     function addToHome(){
                                                         if(!deferredPrompt){return ;}
                                                         deferredPrompt.prompt();							  
                                                         deferredPrompt.userChoice
                                                           .then((choiceResult) => {
                                                             if (choiceResult.outcome === "accepted") {
                                                                 
                                                               document.getElementById("pwaforwp-add-to-home-click").style.display = "none"; 
                                                       
                                                                var a2hsviashortcode = document.getElementsByClassName("pwaforwp-add-via-class");
                                                                 if(a2hsviashortcode !== null){
                                                                     for (var i = 0; i < a2hsviashortcode.length; i++) {
                                                                       a2hsviashortcode[i].style.display="none"; 
                                                                   }
                                                                 }
                                                                 
                                                                 var a2hsviashortcode = document.getElementsByClassName("pwaforwp-sticky-banner");
                                                                    if(a2hsviashortcode !== null){
                                                                        for (var i = 0; i < a2hsviashortcode.length; i++) {
                                                                          a2hsviashortcode[i].style.display="none"; 
                                                                      }
                                                                    }
                                                                                                                                          
                                                               console.log("User accepted the prompt");

                                                             } else {
                                                               console.log("User dismissed the prompt");
                                                             }
                                                             deferredPrompt = null;
                                                         });
                                                         
                                                        }
                                          window.addEventListener("offline", pwaforwpOnNetworkChange);   
                                          function pwaforwpOnNetworkChange(event) {
                                            if (!navigator.onLine) {
                                              var a2hsdesk = document.getElementById("pwaforwp-add-to-home-click");
                                              if(a2hsdesk !== null){
                                                a2hsdesk.style.display = "none";
                                              }
                                            }
                                          }            
                                        });
			                             }firebase.analytics();	  

function pushnotification_load_messaging(){
  // [START refresh_token]
  // Callback fired if Instance ID token is updated.
  messaging.onTokenRefresh(() => {
    messaging.getToken().then((refreshedToken) => {
      console.log('Token refreshed.');
      // Indicate that the new Instance ID token has not yet been sent to the
      // app server.
      push_notification_setTokenSentToServer(false);
      // Send Instance ID token to app server.
      sendTokenToServer(refreshedToken);
      // [START_EXCLUDE]
      // Display new Instance ID token and clear UI of all previous messages.
      resetUI();
      // [END_EXCLUDE]
    }).catch((err) => {
      console.log('Unable to retrieve refreshed token ', err);
      showToken('Unable to retrieve refreshed token ', err);
    });
  });
  // [END refresh_token]

	if(PWAforwpreadCookie("pn_notification_block")==null){
		var wrapper = document.getElementsByClassName("pn-wrapper");
		if(wrapper){ wrapper[0].style.display="flex"; }
	}
	document.getElementById("pn-activate-permission_link_nothanks").addEventListener("click", function(){
		document.cookie = "pn_notification_block=true";
		var wrapper = document.getElementsByClassName("pn-wrapper");
		if(wrapper){ wrapper[0].style.display="none"; }
	})
	document.getElementById("pn-activate-permission_link").addEventListener("click", function(){
		var wrapper = document.getElementsByClassName("pn-wrapper");
		if(wrapper){ wrapper[0].style.display="none"; }
		document.cookie = "pn_notification_block=true";
	messaging.requestPermission().then(function() {
		console.log("Notification permission granted.");
		document.cookie = "notification_permission=granted";
		if(push_notification_isTokenSentToServer()){
			console.log('Token already saved');
		}else{
			push_notification_getRegToken();
		}                                   
	}).catch(function(err) {
		  console.log("Unable to get permission to notify.", err);
	});
})

	 messaging.onMessage(function(payload) {
		 console.log('Message received. ', payload);
		 
		 notificationTitle = payload.data.title;
			notificationOptions = {
			body: payload.data.body,
			icon: payload.data.icon
			}
			var notification = new Notification(notificationTitle, notificationOptions); 
				notification.onclick = function(event) {
				event.preventDefault();
				window.open(payload.data.url, '_blank');
				notification.close();
				}
		});

}
function push_notification_getRegToken(argument){
	 
	messaging.getToken().then(function(currentToken) {
	  if (currentToken) {                      
	   push_notification_saveToken(currentToken);
	   console.log(currentToken);
		push_notification_setTokenSentToServer(true);
	  } else {                       
		console.log('No Instance ID token available. Request permission to generate one.');                       
		push_notification_setTokenSentToServer(false);
	  }
	}).catch(function(err) {
	  console.log('An error occurred while retrieving token. ', err);                      
	  push_notification_setTokenSentToServer(false);
	});
}
function push_notification_setTokenSentToServer(sent) {
 window.localStorage.setItem('sentToServer', sent ? '1' : '0');
}

function push_notification_isTokenSentToServer() {
return window.localStorage.getItem('sentToServer') === '1';
}

// Send the Instance ID token your application server, so that it can:
// - send messages back to this app
// - subscribe/unsubscribe the token from topics
function sendTokenToServer(currentToken) {
	if (!push_notification_isTokenSentToServer()) {
	  console.log('Sending token to server...');
	  push_notification_saveToken(currentToken);
	  
	} else {
	  console.log('Token already sent to server so won\'t send it again ' +
		  'unless it changes');
	}

}

function push_notification_saveToken(currentToken){
  var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
		if(this.responseText.status==200){
			push_notification_setTokenSentToServer(true);
		}
		console.log(this.responseText);
	  }
	};
	console.log(currentToken);
	var grabOs = pushnotificationFCMGetOS();
	var browserClient = pushnotificationFCMbrowserclientDetector();
	xhttp.open("POST", pnScriptSetting.ajax_url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send('token_id='+currentToken+'&user_agent='+browserClient+'&os='+grabOs+'&nonce='+pnScriptSetting.nonce+'&action=pn_register_subscribers');
}              


var pushnotificationFCMbrowserclientDetector  = function (){
	var browserClient = '';

	// Opera 8.0+
	var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

	// Firefox 1.0+
	var isFirefox = typeof InstallTrigger !== 'undefined';

	// Safari 3.0+ "[object HTMLElementConstructor]" 
	var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));

	// Internet Explorer 6-11
	var isIE = /*@cc_on!@*/false || !!document.documentMode;

	// Edge 20+
	var isEdge = !isIE && !!window.StyleMedia;

	// Chrome 1 - 71
	var isChrome = !!window.chrome && (!!window.chrome.webstore || !!window.chrome.runtime);

	// Blink engine detection
	var isBlink = (isChrome || isOpera) && !!window.CSS;


	if(navigator.userAgent.match('CriOS')){
		browserClient = 'Chrome ios';
		return browserClient;
	}
	var isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);
	var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
	if (isSafari && iOS) {
		browserClient = 'Safari ios';
		return browserClient;
	} else if(isSafari) {
		browserClient = 'Safari';
		return browserClient;
	}else if(isFirefox){
		browserClient = 'Firefox';
		return browserClient;
	}else if(isChrome){
		browserClient = 'Chrome';
		return browserClient;
	}else if(isOpera){
		browserClient = 'Opera';
		return browserClient;
	}else if(isIE ){
		browserClient = 'IE';
		return browserClient;
	}else if(isEdge ){
		browserClient = 'Edge';
		return browserClient;
	}else if( isBlink ){
		browserClient = 'Blink';
		return browserClient;
	}


}

var pushnotificationFCMGetOS = function() {
  var userAgent = window.navigator.userAgent,
      platform = window.navigator.platform,
      macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'],
      windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'],
      iosPlatforms = ['iPhone', 'iPad', 'iPod'],
      os = null;

  if (macosPlatforms.indexOf(platform) !== -1) {
    os = 'Mac OS';
  } else if (iosPlatforms.indexOf(platform) !== -1) {
    os = 'iOS';
  } else if (windowsPlatforms.indexOf(platform) !== -1) {
    os = 'Windows';
  } else if (/Android/.test(userAgent)) {
    os = 'Android';
  } else if (!os && /Linux/.test(platform)) {
    os = 'Linux';
  }

  return os;
}

if (Notification.permission !== "granted") {
	document.cookie = "notification_permission=granted";
}