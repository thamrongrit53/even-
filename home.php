
<?php 
require_once('condb.php');
require_once('session_std.php');
require_once('navbar.php'); 

?>
<script type="text/javascript" src="qrcode.js"></script>
<br>

<div class="container">
<h3>home</h3>
    
        <div id="qrcode"></div>
</div>

<?php 

require_once('footer.php'); 

?>
 <script>
    
   
        var userInput ="<?php echo "std_id=".$_SESSION['std_id']; ?>";
        var qrcode = new QRCode("qrcode", {
            text: userInput,
            width: 256,
            height: 256,
            colorDark: "black",
            colorLight: "white",
            correctLevel : QRCode.CorrectLevel.H
        });
    
    
    </script>