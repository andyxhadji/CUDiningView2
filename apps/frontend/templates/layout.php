<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>

  </head>
  <body>
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId: '<?php echo $_SESSION['facebook']->getAppID() ?>',
          cookie: true,
          channelUrl: '//WWW.LOCALHOST:8080/channel.html',
          xfbml: true,
          oauth: true
        });
        FB.Event.subscribe('auth.login', function(response) {
        });
        FB.Event.subscribe('auth.logout', function(response) {
          window.location.reload();
        });
      };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
    </script>

    <?php include_partial('global/header') ?>

    <?php echo $sf_content ?>
    <?php include_partial('global/footer') ?>
  </body>
</html>
