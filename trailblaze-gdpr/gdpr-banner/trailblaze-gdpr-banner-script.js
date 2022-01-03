console.log('banner script loaded');

const gdprBanner = document.querySelector('#gdpr')
const yesButton = document.querySelector('#gdpr button#gdpr-yes');
const noButton = document.querySelector('#gdpr button#gdpr-no');
const consentYesCookie = '';

function removeBanner(banner) {
	banner.parentNode.removeChild(banner);
	console.log('Banner Removed');
}
function gtagConsentDefault() {
	gtag('set', 'ads_data_redaction', true);
	console.log('Ads Data Redaction Set to True');
}
function gtagConsentGranted() {
	gtag('consent', 'update', {
		'ad_storage': 'granted',
		'analytics_storage': 'granted',
		'functionality_storage': 'granted',
		'personalization_storage': 'granted',
		'security_storage': 'granted'
	});	
	console.log('Consent Updated to Granted');
	gtag('set', 'ads_data_redaction', false);
	console.log('Ads Data Redaction Set to False');
	dataLayer.push({'event': 'consent_granted'});
}
function clearAllCookies() {
	var cookies = document.cookie.split('; ');
    for (var c = 0; c < cookies.length; c++) {
        var d = window.location.hostname.split('.');
        while (d.length > 0) {
            var cookieBase = encodeURIComponent(cookies[c].split(';')[0].split('=')[0]) + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=' + d.join('.') + ' ;path=';
            var p = location.pathname.split('/');
            document.cookie = cookieBase + '/';
            while (p.length > 0) {
                document.cookie = cookieBase + p.join('/');
                p.pop();
            };
            d.shift();
        }
    }
	console.log('Cookies Cleared');
}
function setYesCookie() {
	document.cookie = 'consentYes=yes; max-age=2592000; Secure;'	
	console.log('Yes Cookie Set');
}
function yesCookieSet() {
	if (document.cookie.split(';').some((item) => item.trim().startsWith('consentYes='))) {
		removeBanner(gdprBanner);
		gtagConsentGranted();
		console.log('Yes Granted: '+document.cookie);
	}
}
function gdprBannerButtonEvents(yes,no){
	yes.addEventListener('click', event => {
		console.log('Yes');
		removeBanner(gdprBanner);
		gtagConsentGranted();
		setYesCookie();
	});
	no.addEventListener('click', event => {
		console.log('No');
		removeBanner(gdprBanner);
		clearAllCookies();
	});
}

gtagConsentDefault();
gdprBannerButtonEvents(yesButton,noButton);
yesCookieSet();