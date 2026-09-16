<div class="footer" >
  <b>Disclaimer</b></br>
  <p>The Website is provided “as is” and the DRAMP hereby disclaim all warranties of any kind, express or implied. The DRAMP does not make any warranty that the services will be free of errors. You understand that you download from, or otherwise obtain content or services through, the DRAMP at your own discretion and risk.   DRAMP is consturcted by Zheng group. </p>
   <p> <img scr="./head/css/CCby.png"><a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" width="80" height="25"/></a>    This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.</p>
  

   <!-- <p><ul class="list-inline"><li><a href="../static/help.php">Help</a></li><li><a href="#">Sitemap</a></li><li><a href="../static/feed_back.php">Contact Us</a></li></ul></p> -->
</div>

<!-- 2020.11.24 Shi wanted to simplify the foot fo the website, so he annotated the code below -->

<script>
$(document).ready(function() {
$('a.login-window').click(function() {
    
            //Getting the variable's value from a link 
    var loginBox = $(this).attr('href');

    //Fade in the Popup
    $(loginBox).fadeIn(300);
    
    //Set the center alignment padding + border see css style
    var popMargTop = ($(loginBox).height() + 24) / 2; 
    var popMargLeft = ($(loginBox).width() + 24) / 2; 
    
    $(loginBox).css({ 
        'margin-top' : -popMargTop,
        'margin-left' : -popMargLeft
    });
    
    // Add the mask to body
    $('body').append('<div id="mask"></div>');
    $('#mask').fadeIn(300);
    
    return false;
});

// When clicking on the button close or the mask layer the popup closed
$('a.close, #mask').live('click', function() { 
  $('#mask , .login-popup').fadeOut(300 , function() {
    $('#mask').remove();  
}); 
return false;
});
});
</script>

<script>
	function sub(){
/*
	document.getElementById("hid").value="sadfasfsadfsadf";		

document.getElementById('sign_login').submit();*/

	alert("We Maybe Open Sign in Next Version");

	}
</script>

<div id="login-box" class="login-popup">
<a href="#" class="close"><img src="../images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
  <form method="get" class="signin"  id="sign_login" action="../login/checklogin.php">
        <fieldset class="textbox">
        <label class="username">
        <span>Username or email</span>
        <input id="username" name="myusername" value="" type="text" autocomplete="on" placeholder="Username">
        </label>
        <label class="password">
        <span>Password</span>
        <input id="password" name="mypassword" value="" type="password" placeholder="Password">
        </label>
	<input id="hid"  name="select" value="" type="hidden" >
        <a href="#" id="sign_in" name="sign" onClick="sub()" >Sign in</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="login" onClick="sub()">login</a>
        <p>
        <a class="forgot" href="#" onClick="sub()"  >Forgot your password?</a>
        </p>
        </fieldset>
  </form>
</div>
