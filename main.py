import re, os, json
import speech_recognition as sr
if os.name =="nt":
    os.system("cls")
else:
    os.system("clear")

print ('''

.?? ? ????.?? ? ?????  
?? ?. ?????? ?. ??? ?? 
????????? ????????? ???
?????????.????????. ?? 
 ???? ???  ???? ?????? 

Simple Fukin Swear Detection.
Version 1.0 - Using pyspeechrecognition.

''')

with open("/var/www/html/swear_words.json", "r") as f:
    data = json.load(f)
swear_words = data["swear_words"]
swear_count = {}
for word in swear_words:
    swear_count[word] = 0
regex = re.compile(r'\b(' + '|'.join(swear_words) + r')\b', re.IGNORECASE)
r = sr.Recognizer()
print("Listening...")
try:
    with sr.Microphone() as source:
        r.adjust_for_ambient_noise(source)
        source.energy_threshold = 3000
        while True:
            
            try:
                audio = r.listen(source, timeout=10, phrase_time_limit=10)
                transcript = r.recognize_google(audio)
                matches = regex.findall(transcript)
                for word in matches:
                    swear_count[word.lower()] += 1
                    
                sorted_swears = sorted(swear_count.items(), key=lambda x: x[1], reverse=True)
                with open('/var/www/html/swear_totals.html', 'w') as f:

                    for word, count in sorted_swears:
                        if count > 0:
                            f.write(f"<h3><div style='width:200px; text-align:left; margin:0 auto;'>{word}: {count}</div></h3>")
                            #print(f'{word}: {count}')
            except Exception as e:
                print (e)
                pass
except Exception as e:
    print (e)
    print ("Do you have a microphone connected?")
    
