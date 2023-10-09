<?php
// Read the contents of the /proc/uptime file
$uptime_info = file_get_contents('/proc/uptime');

// Extract the first value from the string (the system uptime in seconds)
$uptime_seconds = (float) explode(' ', $uptime_info)[0];

// Calculate the system boot time by subtracting the uptime from the current time
$boot_time = time() - $uptime_seconds;

// Output the system boot time in a human-readable format
echo "<font style='color:gray'><i>Started on: " . date('Y-m-d H:i:s', $boot_time).'</i></font>';
?>

<?php
echo "<br><br><br><h3>Detected Swear Words (For Team 2, 5)</h3><br><div style='background-color: #232323; border-radius: 25px; box-shadow: 0 0 50px 15px #9DE7BB; width:800px;'><br>".file_get_contents("swear_totals.html")."<br></div>";
?>
<br><br><br>
<h3>Realtime Detection</h3>
<?php
$file = file("full_log.log");
echo "<pre><div style='width:800px; overflow: hidden; border-radius: 25px; box-shadow: 0 0 50px 15px #48abe0; background-color: #232323; color:lightgray; text-align:left; margin:0 auto;'>";
for ($i = max(0, count($file)-35); $i < count($file); $i++) {
  echo "".$file[$i] . "";
}
echo '</div></pre>';
?>
