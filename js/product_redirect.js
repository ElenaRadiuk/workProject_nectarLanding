/*!
   * GeoIP Target Filter
   * Project: https://github.com/OpenAff/geoip-target-filter
   *
   * ---------------------------------------------------------------------
   * A small snippet for geo-filter redirection using GeoIP API.
   * Add your targeted country's "ISO 3166-1 - Alpha-2" codes to the filter
   * to automatically redirect targeted visitors to your targeted URL and
   * to non-targeted URL otherwise.
   *
   * Country Codes can be found @( Wikipedia - http://bit.ly/nWBMYz )
   * See Column: "Alpha-2 Code"
   * ---------------------------------------------------------------------
   */
var filter = ['FR', 'DE', 'PL'];

function setCookie(name, value, days) {
  var expires = "";
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

function eraseCookie(name) {
  document.cookie = name + '=; Max-Age=-99999999;';
}

// ------------------------------------------------------
// DON'T EDIT THE BELOW CODE UNLESS REQUIRED
// ------------------------------------------------------
/**
 * Check if the visitor is from targeted country, Redirect to target URL.
 * Otherwise to non-target URL.
 */
function geoip(g) {
  console.log(g.country_code);

  // if (g.country_code!=='UA'){
    var url = window.location.href;

    var lang;

    if(inArray(g.country_code,filter)) {
      lang=g.country_code.toLowerCase();
    } else {
      lang='en';
    }
    console.log(lang);

    // switch (url){
    //   case 'http://nectarica.com/products/sunflowerhoney290/':
    //     location.href = "https://shop-eu.nectarica.com/"+lang+"/,3,81670,10477592";
    //     break;
    //   case 'http://nectarica.com/products/sunflowerhoney4_5/':
    //     location.href = "https://shop-eu.nectarica.com/"+lang+"/,3,81670,10471632";
    //     break;
    //   case 'http://nectarica.com/products/sunflowerhoney25/':
    //     location.href = "https://shop-eu.nectarica.com/"+lang+"/,3,81670,10477588";
    //     break;
    //   case 'https://nectarica.com/products/sunflowerhoney290/':
    //     location.href = "https://shop-eu.nectarica.com/"+lang+"/,3,81670,10477592";
    //     break;
    //   case 'https://nectarica.com/products/sunflowerhoney4_5/':
    //     location.href = "https://shop-eu.nectarica.com/"+lang+"/,3,81670,10471632";
    //     break;
    //   case 'https://nectarica.com/products/sunflowerhoney25/':
    //     location.href = "https://shop-eu.nectarica.com/"+lang+"/,3,81670,10477588";
    //     break;
    //   default:
    //     break;
    // }
  // } else {
  //   alert('Ukraine!!!')
  // }


}

function inArray(r, n) {
  for (var t = n.length, e = 0; t > e; e++) if (n[e] == r) return !0;
  return !1
}


// (function (g, e, o, i, p) {
//   i = g.createElement(e), p = g.getElementsByTagName(e)[0];
//   i.async = 0;
//   i.src = o;
//   p.parentNode.insertBefore(i, p)
// })(document, 'script', 'https://api.ipdata.co/1.1.1.1?api-key=f63700b91e02aac147f335d6650d2779b0fe077fe87ffd3472c1c46b');
