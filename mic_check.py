import speech_recognition as sr

r = sr.Recognizer()

# List available microphones
mic_list = sr.Microphone.list_microphone_names()
print(f"Available microphones: {mic_list}")

