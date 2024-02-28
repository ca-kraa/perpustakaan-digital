<html>
  <head>
    <title>hCaptcha Demo</title>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
  </head>
  <body>
    <form action="" method="POST">
      <input type="text" name="email" placeholder="Email" />
      <input type="password" name="password" placeholder="Password" />
      <div class="h-captcha" data-sitekey="{{ env('HCAPTCHA_RECAPTCHA_SITE_KEY') }}"></div>
      <br />
      <input type="submit" value="Submit" />
    </form>
  </body>
</html>