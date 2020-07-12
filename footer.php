  
  <style type="text/css">
   footer {
   left: 0;
   bottom: 0;
   width: 100%;
   color: white;
   text-align: center;
   margin-top:1000px;
}
a{
  color:#fff;
}
  </style>
  <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v6.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="403996436383599"
  logged_in_greeting="สวัสดี...จ้า"
  logged_out_greeting="สวัสดี...จ้า">
      </div>

 <footer  class="footer py-3 bg-dark text-white-80">
    <div class="container text-center">
      <small class="text-muted">Copyright &copy; SBAC &nbsp;by &nbsp;ไม่นอน</small>
    </div>
  </footer>
</body>
</html>