<?php
if(isset($_POST['mute'])) {
  shell_exec("sudo ./dbus_alsa.sh");
  $file = '/var/www/html/toggle.txt';

if (file_exists($file)) {
  // Read the current content of the file
  $content = file_get_contents($file);

  // Toggle the value
  if (trim($content) === 'TRUE') {
    $content = 'FALSE';
  } else {
    $content = 'TRUE';
  }

  // Write the new content to the file
  file_put_contents($file, $content);
} else {
  // If the file doesn't exist, create it with the default value of TRUE
  file_put_contents($file, 'TRUE');
}
}
?>

<title>SFSD</title>
<body bgcolor="black"> 
<font style="color:white">
<center><br><br><br>
<img src="./assets/abs_logo.png" width="350"><br>
</center>
<style>

#page-container {
  position: relative;
  min-height: 100vh;
}

#content-wrap {
  padding-bottom: 2.5rem;    /* Footer height */
}

#footer {
  position: absolute;
  bottom: 0;
  width: 99%;
  height: 2.5rem;            /* Footer height */
}
h3 {
  font-family: 'Courier', sans-serif;
  font-weight: lighter;
  font-size: 20px;
  text-align: center;
  margin: 0
}
</style>

<script type="text/javascript">
      function Ajax()
      {
          var
              $http,
              $self = arguments.callee;

          if (window.XMLHttpRequest) {
              $http = new XMLHttpRequest();
          } else if (window.ActiveXObject) {
              try {
                  $http = new ActiveXObject('Msxml2.XMLHTTP');
              } catch(e) {
                  $http = new ActiveXObject('Microsoft.XMLHTTP');
              }
          }

          if ($http) {
              $http.onreadystatechange = function()
              {
                  if (/4|^complete$/.test($http.readyState)) {
                      document.getElementById('ReloadThis').innerHTML = $http.responseText;
                      setTimeout(function(){$self();}, 1000);
                  }
              };

              $http.open('GET', './rl_logging.php');

              $http.send(null);
          }

      }
  </script>
  <script type="text/javascript">
            setTimeout(function() {Ajax();}, 1000);
  </script>
  <center>


<?php
$file = 'toggle.txt';

if (file_exists($file)) {
  // Read the current content of the file
  $content = file_get_contents($file);

  // Check the value and display the appropriate text
  if (trim($content) === 'TRUE') {
    #echo '<form method="post" action="/"><button type="submit" name="mute">Mute Microphone</button></form>';
  } else {
    #echo '<form method="post" action="/"><button type="submit" name="mute">Unmute Microphone</button></form>';
  }
} else {
  // If the file doesn't exist, display an error message
  echo 'Error: toggle file not found';
}
?>


<div id="ReloadThis" style=""><h3>Loading...</h3></div>



