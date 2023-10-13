import requests
import uuid
import hashlib
import base64
import time
import json
import concurrent.futures
from Crypto.Cipher import AES
import random  # Import modul random bawaan Python
import string
import secrets
import string

def send_request(secretkey,iv,anid,token,headers):
    
    try:
        data = encrypt('{"pkgName":"com.knife.game.happy","imei":"","oaid":"","androidId":"' + anid + '","idfa":"","idfv":"","adKey":"' + generate_random(14) + '","adprice":0.999999,"adPlatform":66,"sign":"' + token + str(round(time.time() * 1000)) + '","status_code":0,"from":1,"country":"ID","adType":0,"version":118,"channel":"knife","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3SinyalKuatHemat","carrierCode":"51089","isOpenVpn":0}', secretkey, iv)

        reward_url = 'https://game.firstwinner.org/api/app/fc/credit/coin?' + str(round(time.time() * 1000))
        response = requests.post(reward_url, headers=headers, data=data)
        reward = response.text
        dec = decrypt(reward, secretkey, iv)
        code = dec.split('"code":')[1].split(",")[0]
        if code == "200":
            print("\rClaim: OK\r")
        else:
            return "Status: " + dec
    except Exception as e:
        return "Error: " + str(e)
def generate_random(length):
    characters = "abcdef0123456789"
    return ''.join(secrets.choice(characters) for _ in range(length))

def random(i):
    characters = "abcdef0123456789"
    return ''.join(secrets.choice(characters) for _ in range(i))
    
def uuidv4():
    return str(uuid.uuid4())

def decrypt(text, key, iv):
    key = hashlib.md5(key.encode()).digest()
    iv = iv.encode('utf-8')
    cipher = AES.new(key, AES.MODE_CBC, iv)
    decrypted_text = cipher.decrypt(base64.b64decode(text))
    return decrypted_text.rstrip(b"\0").decode('utf-8')

def encrypt(text, key, iv):
    key = hashlib.md5(key.encode()).digest()
    iv = iv.encode('utf-8')
    cipher = AES.new(key, AES.MODE_CBC, iv)
    padded_text = text + (AES.block_size - len(text) % AES.block_size) * chr(AES.block_size - len(text) % AES.block_size)
    encrypted_text = base64.b64encode(cipher.encrypt(padded_text.encode('utf-8')))
    return encrypted_text.decode('utf-8')

# Kunci dan IV dari PHP
secretkey = "h3^%4~sxjlsd91"  # Sesuaikan dengan kunci yang Anda miliki
iv = "\x00\x01\x02\x03\x04\x05\x06\x07\x08\x09\x0a\x0b\x0c\x0d\x0e\x0f"  # Sesuaikan dengan IV yang Anda miliki
token = str(uuidv4())
token = "5c5b104e-9ea5-4e8f-ae2d-d4ed978bb4db"
anid = random(16)
headers = {
    'User-Agent': 'Android Client',
    'Content-Type': 'application/json;charset=utf-8',
    'token': token,
    'X-Unity-Version': '2021.3.18f1c1'
}

while True:
    #data = encrypt('{"location":"ID","macAddress":"","uuid":"' + str(uuidv4()) + '","advertisingId":"' + str(uuidv4()) + '","product":0,"app_version":"1.1.8","user_channel":"knife","distinct_id":"' + str(uuidv4()) + '","deviceId":"' + str(uuidv4()) + '","imei":"","anid":"' + generate_random(16) + '","oaid":"","idfa":"","idfv":"","status_code":0,"wxTime":0,"country":"ID","version":118,"channel":"knife","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}', secretkey, iv)
    #url = 'https://game.firstwinner.org/api/app/fc/user/start?' + str(int(time.time() * 1000))
    #response = requests.post(url, headers=headers, data=data)
    #balance = response.text
    #dec = decrypt(balance, secretkey, iv)
    #code = dec.split('"code":')[1].split(",")[0]
    #print(code)
    #balance = dec.split('"total":')[1].split(",")[0]
    #if code == "200":
    #	print("Balance: "+balance)
    #else:
    	#print("Status: "+dec)
    
    with concurrent.futures.ThreadPoolExecutor(max_workers=5) as executor:
        results = list(executor.map(send_request(secretkey,iv,anid,token,headers)))
    for result in results:
	    print("\r"+result+"\r")
