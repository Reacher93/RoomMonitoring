
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
  
  
  <?php if(!is_checked_in()): ?>
  <a href="login.php" class="w3-bar-item w3-button">Login</a> 
  <a href="#" class="w3-bar-item w3-button">Impressum</a>

  <?php else: ?>
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
  <a href="sensordaten.php" class="w3-bar-item w3-button">Sensordaten</a>
  <a href="usersettings.php" class="w3-bar-item w3-button">User Settings</a>
  <a href="sensorsettings.php" class="w3-bar-item w3-button">Sensor Settings</a>  
  <a href="#" class="w3-bar-item w3-button">Impressum</a>

  <?php endif; ?>
  
  <!--
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="login.php" method="post">	
								<input class="form-control" placeholder="E-Mail" name="email" type="email" required>								
						<input class="form-control" placeholder="Passwort" name="passwort" type="password" value="" required>
						<button type="submit" class="btn btn-success">Login</button>	
						<label style="margin-bottom: 0px; font-weight: normal;"><input type="checkbox" name="angemeldet_bleiben" value="remember-me" title="Angemeldet bleiben"  checked="checked" style="margin: 0; vertical-align: middle;" /> <small>Angemeldet bleiben</small></label></td>
						<small><a href="passwortvergessen.php">Passwort vergessen</a></small>    
          </form>         
        </div>
        
-->
        
  
  
  
  

</div>
<!--
<div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;" id="rightMenu">
  <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>
-->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
 <!-- <button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()">&#9776;</button> -->
  <div class="w3-container">
    <h1>Room Monitoring</h1>
  </div>
</div>


     
<script>
function openLeftMenu() {
  document.getElementById("leftMenu").style.display = "block";
}

function closeLeftMenu() {
  document.getElementById("leftMenu").style.display = "none";
}
</script>
