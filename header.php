<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <?
  $pages = [
    '839, 1250, 1260, 1261, 1262, 1263' => ',3,81670,10477588',
    '835, 1265, 1266, 1267, 1268, 1269' => ',3,81670,10471632',
    '403, 459, 1270, 1271, 1272, 1273, 1274' => ',3,81670,10477592',
    '1389, 1391, 1392, 1393, 1394, 1395, 1419, 1416, 1421, 1423, 1425, 1427' => ''
  ];
  foreach ($pages as $pagesList => $pageRedirect) {
    if (is_single(explode(', ', $pagesList))) {?>
      <script>
        var request = new XMLHttpRequest();

        request.open('GET', 'https://api.ipdata.co?api-key=f63700b91e02aac147f335d6650d2779b0fe077fe87ffd3472c1c46b');

        request.setRequestHeader('Accept', 'application/json');

        request.onreadystatechange = function () {
          if (this.readyState === 4) {
            var g=JSON.parse(this.responseText);
            geoip(g);

          }
        };

        request.send();
        <?if($pagesList == '1389, 1391, 1392, 1393, 1394, 1395, 1419, 1416, 1421, 1423, 1425, 1427'){?>
        var filter = ['FR', 'DE', 'PL', 'ES', 'UA'];
        <?} else {?>
        var filter = ['FR', 'DE', 'PL'];
        <?}?>

        function geoip(g) {
          var url = window.location.href;
          var lang;
          var langString;

          if (inArray(g.country_code, filter)) {
            lang = g.country_code.toLowerCase();
            langString=(lang==='ua')?"":'?lang='+lang;
          } else {
            lang = 'en';
            langString='?lang='+lang;
          }

          console.log(lang);
          <?if($pagesList == '1389, 1391, 1392, 1393, 1394, 1395, 1419, 1416, 1421, 1423, 1425, 1427'){?>

          location.href = "https://nectarica.com/quality-sertificate/" + langString;

          <?} else {?>

          location.href = "https://shop-eu.nectarica.com/" + lang + "/<?=$pageRedirect;?>";

          <?}?>
        }

        function inArray(r, n) {
          for (var t = n.length, e = 0; t > e; e++) if (n[e] == r) return !0;
          return !1
        }

      </script>
    <? }
  }
  ?>

  <meta charset="<?php get_bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NTGTFKT');</script>
    <!-- End Google Tag Manager -->


</head>
<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NTGTFKT"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header class="topheader">
  <div class="headerwrapper">
    <?php language_selector(); ?>
    <div class="headersearch">
      <i class="fa fa-search"></i>
      <?php get_search_form(); ?>
    </div>

    <?php if (get_locale() == en_US) {
      $home = '/?lang=en';
    } elseif (get_locale() == uk_UA) {
      $home = '/';
    } else {
      $home = '/?lang=en';
    }
    ?>
    <div id="htlogo">
      <a href="<?php echo $home; ?>">
        <img src="<?php echo HT_URI ?>/images/logo.png"/>
        <div>NECTARICA</div>
      </a>
    </div>
    <nav class="mainmenu">
        <?php if (is_page_template('page-offer.php')) {?>
            <?php wp_nav_menu(array('menu' => 'offer')); ?>
        <?php } else { ?>
      <?php wp_nav_menu(array('menu' => 'mainmenu')); ?>
        <?php } ?>
    </nav>
  </div>
</header>