echo "" >| /var/www/html/swear_totals.html
jack_control start
rm /var/www/html/full_log.log
rm /var/www/html/toggle.txt
echo "TRUE" > /var/www/html/toggle.txt
screen -L -Logfile /var/www/html/full_log.log -S Main_Script -dm python3 /var/www/html/main.py
