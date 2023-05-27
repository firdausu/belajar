import requests
from requests.structures import CaseInsensitiveDict
import json
from faker import Faker
from datetime import datetime
import secrets
import random
import pytz
from bs4 import BeautifulSoup
import bs4
import logging
import time
logging.basicConfig(level=logging.ERROR)

def cdkm():
    gema = requests.get("https://generator.email/")
    soup = BeautifulSoup(gema.text, 'html.parser')
    email_span = soup.find('span', id='email_ch_text')
    email = email_span.text
    return email

while True:
  try:
    tz = pytz.timezone('Europe/London')
    now = datetime.now(tz)
    timesa = now.strftime("%Y-%m-%dT%H:%M:%S.%fZ")
    dt1 = secrets.token_urlsafe(140)  # Menentukan panjang token
    dt2 = secrets.token_urlsafe(22)
    fake = Faker()
    devid = fake.uuid4()
    headers = {
        'Host': 'exp.host',
        'content-type': 'application/json',
        'user-agent': 'okhttp/4.9.2'
    }
    
    data = {
        "type": "fcm",
        "deviceId": devid,
        "development": False,
        "appId": "com.sopae.app",
        "deviceToken": f"{dt2}:{dt1}",
        "projectId": "9e599085-7ef2-46da-b729-fac0ac6308c9"
    }
    
    response = requests.post('https://exp.host/--/api/v2/push/getExpoPushToken', headers=headers, json=data)
    zz = json.loads(response.text)
    expos = zz["data"]["expoPushToken"]
    
    url = "https://www.googleapis.com/identitytoolkit/v3/relyingparty/signupNewUser?key=AIzaSyDrH267mGDZQcgqK_xNoc8SW4zb-FT5YwI"
    
    headers = CaseInsensitiveDict()
    headers["Content-Type"] = "application/json"
    headers["X-Android-Package"] = "com.sopae.app"
    headers["X-Android-Cert"] = "B88C6B1F4CC14300D646D4AA8801BCEF2AC9AED2"
    headers["Accept-Language"] = "in-ID, en-US"
    headers["X-Client-Version"] = "Android/Fallback/X21002000/FirebaseCore-Android"
    headers["X-Firebase-GMPID"] = "1:528065607627:android:46442e812747657fe3284e"
    headers["X-Firebase-Client"] = "H4sIAAAAAAAAAHWSQY7CMAxFr4KyJmnTzMCIqwws3NQtEW1SJQaBEHcf04YiFrP9ft-xv3MXR4RINQIlsfu9C-jQk9iJ1kWUMI7SHtGe5NjDTTpP2EVHt32hN0qrajVRNkTcF1WpzEsBD_2NnE0sM6Z0BnsW9A9zm1lo7cCEebeCMx2zp1w80jenxdfgxVmUdQTf7IsEQzr7Lptrmrz69R4jMTjGTLmKCJakB3IXfperNSSeWm_VlzKrTPKGiaDvMe4LGwbVhdD1qHJVjWBPnM8CLbbBeZmeQ1Z60TgxakPkBedhiCdOY4g0raLVdiEJYoc0NzBmpkeMbc5Uv3b2MPDEQafr9frShtBgP4mrU6Deee6uuH1Obzng58Xed22wPnf_FRO0SDfpkT6JHABnGXyaMtQqzx3tdAKjSrEWDRA-f5WoysrI8ltWRhweh7W4YEzs5W9WiccfC5bdr4MCAAA"
    headers["User-Agent"] = "Dalvik/2.1.0 (Linux; U; Android 11; SMG991B Build/RP1A.200720.012)"
    headers["Host"] = "www.googleapis.com"
    headers["Connection"] = "Keep-Alive"
    
    data = "{}"
    resp = requests.post(url, headers=headers, data=data)
    aa = json.loads(resp.text)
    idtoken = aa["idToken"]
    retok = aa['refreshToken']
    fn = fake.first_name()
    ln = fake.last_name()
    rnf = fake.random_int(min=11111, max=99999)
    dnam = fn+ str(rnf)
    email = cdkm()
    username, domain = email.split("@")
    surl = f"{domain}/{username}"
    angka_random = random.randint(1, 9)
    print("Email: "+email)
    headers = {
        "accept": "application/json, text/plain, */*",
        "authorization": "Bearer "+idtoken,
        "Content-Type": "application/json",
        "Host": "api.sopay.ai",
        "Connection": "Keep-Alive",
        "User-Agent": "okhttp/4.9.2"
    }
    #email = input("Email: ")
    data = {
        "email": email
    }
    response = requests.post("http://api.sopay.ai/user/exists", headers=headers, json=data)
    bb = json.loads(response.text)
    bbc = bb["message"]
    print("Message: "+bbc)
    res = requests.post("http://api.sopay.ai/user/send-otp", headers=headers, json=data)
    cc = json.loads(res.text)
    
    cce = cc.get("message", "")
        
    print("Message: "+cce)
    ccd = cc["verificationId"]
    hoos = {
        "authority": "generator.email",
        "accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
        "accept-language": "en-US,en;q=0.9",
        "cookie": f"_ga=GA1.2.1551302149.1679196441; _gid=GA1.2.1911480829.1679196441; embx=^[^\"nixd2l4c^@equityoptions.io^\"]; surl={surl}",
        "sec-ch-ua": "\"Google Chrome\";v=\"111\", \"Not(A:Brand\";v=\"8\", \"Chromium\";v=\"111\"",
        "sec-ch-ua-mobile": "?0",
        "sec-ch-ua-platform": "\"Windows\"",
        "sec-fetch-dest": "document",
        "sec-fetch-mode": "navigate",
        "sec-fetch-site": "same-origin",
        "sec-fetch-user": "?1",
        "upgrade-insecure-requests": "1",
        "user-agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36",
    }
    
    pema = requests.get(f"https://generator.email/inbox{angka_random}/", headers=hoos)
    soup = BeautifulSoup(pema.text, 'html.parser')
    mess_span = soup.find('span', id='mess_number')
    start_time = time.time()
    while mess_span is None and time.time() - start_time < 60:
        pema = requests.get(f"https://generator.email/inbox{angka_random}/", headers=hoos)
        soup = BeautifulSoup(pema.text, 'html.parser')
        mess_span = soup.find('span', id='mess_number')
        time.sleep(2)
    if mess_span is not None:
        mess = mess_span.text
    else:
        jamal = "app"
    otsox = soup.find('p', class_='otp')
    
    otp = otsox.text
    data = {
        "email": email,
        "verificationId": ccd,
        "otp": otp
    }
    res = requests.post("http://api.sopay.ai/user/verify-otp", headers=headers, json=data)
    dd = json.loads(res.text)
    dde = dd["message"]
    print("Message: "+dde)
    
    data = {
        "email": email,
        "password": "TeamYocky2023"
    }
    res = requests.post("http://api.sopay.ai/user/register", headers=headers, json=data)
    bbn = json.loads(res.text)
    #print(bbn)
    aacc = bbn["loginToken"]
    
    url = "https://www.googleapis.com/identitytoolkit/v3/relyingparty/verifyCustomToken?key=AIzaSyDrH267mGDZQcgqK_xNoc8SW4zb-FT5YwI"
    
    headers = CaseInsensitiveDict()
    headers["Content-Type"] = "application/json"
    headers["X-Android-Package"] = "com.sopae.app"
    headers["X-Android-Cert"] = "B88C6B1F4CC14300D646D4AA8801BCEF2AC9AED2"
    headers["Accept-Language"] = "in-ID, en-US"
    headers["X-Client-Version"] = "Android/Fallback/X21002000/FirebaseCore-Android"
    headers["X-Firebase-GMPID"] = "1:528065607627:android:46442e812747657fe3284e"
    headers["X-Firebase-Client"] = "H4sIAAAAAAAAAKtWykhNLCpJSk0sKVayio7VUSpLLSrOzM9TslIyUqoFAFyivEQfAAAA"
    headers["User-Agent"] = "Dalvik/2.1.0 (Linux; U; Android 11; SMG991B Build/RP1A.200720.012)"
    headers["Host"] = "www.googleapis.com"
    headers["Connection"] = "Keep-Alive"
    
    data = {
        "token": aacc,
        "returnSecureToken": True
    }
    resp = requests.post(url, headers=headers, json=data)
    kkk = json.loads(resp.text)
    idtoken = kkk["idToken"]
    
    url = "https://www.googleapis.com/identitytoolkit/v3/relyingparty/getAccountInfo?key=AIzaSyDrH267mGDZQcgqK_xNoc8SW4zb-FT5YwI"
    
    headers = CaseInsensitiveDict()
    headers["Content-Type"] = "application/json"
    headers["X-Android-Package"] = "com.sopae.app"
    headers["X-Android-Cert"] = "B88C6B1F4CC14300D646D4AA8801BCEF2AC9AED2"
    headers["Accept-Language"] = "in-ID, en-US"
    headers["X-Client-Version"] = "Android/Fallback/X21002000/FirebaseCore-Android"
    headers["X-Firebase-GMPID"] = "1:528065607627:android:46442e812747657fe3284e"
    headers["X-Firebase-Client"] = "H4sIAAAAAAAAAKtWykhNLCpJSk0sKVayio7VUSpLLSrOzM9TslIyUqoFAFyivEQfAAAA"
    headers["User-Agent"] = "Dalvik/2.1.0 (Linux; U; Android 11; SMG991B Build/RP1A.200720.012)"
    headers["Host"] = "www.googleapis.com"
    headers["Connection"] = "Keep-Alive"
    
    data = {
        "idToken": idtoken
    }
    resp = requests.post(url, headers=headers, json=data)
    lll = json.loads(resp.text)
    #print(lll)
    
    headers = {
        "accept": "application/json, text/plain, */*",
        "authorization": "Bearer "+idtoken,
        "Content-Type": "application/json",
        "Host": "api.sopay.ai",
        "Connection": "Keep-Alive",
        "User-Agent": "okhttp/4.9.2"
    }
    data = {
        "logType": "LOGIN",
        "logData": {
        "logType": "LOGIN",
        "timestamp": timesa
        }
    }
    res = requests.post("http://api.sopay.ai/user/log", headers=headers, json=data)
    ee = json.loads(res.text)
    #print(ee)
    data = {
        "token": expos
    }
    res = requests.post("http://api.sopay.ai/user/expo-push-token", headers=headers, json=data)
    ff = json.loads(res.text)
    #print(ff)
    
    data = {
        "referralId": "rzPrVuwx"
    }
    res = requests.post("http://api.sopay.ai/user/refer", headers=headers, json=data)
    gg = json.loads(res.text)
    print("Message: "+gg["message"])
    
    nso = datetime.now(tz)
    nsoz = nso.strftime("T%H:%M:%S.%fZ")
    nnnx = nsoz[:-4]
    nxsb = nnnx+"Z"
    
    random_number = random.randrange(1, 13)
    monta = str(random_number).zfill(2)
    rnxss = random.randrange(1, 27)
    daya = str(rnxss).zfill(2)
    #monta = random.randint(1, 12)
    #daya = random.randint(1, 12)
    yera = random.randint(1980, 2000)
    dobb = f"{yera}-{monta}-{daya}{nxsb}"
    gender_options = ["FEMALE", "MALE"]
    genxer = random.choice(gender_options)
    oxos = ["PERSONAL", "BUSINESS"]
    pedsi = random.choice(oxos)
    telpx = [
    "Afghanistan",
    "Albania",
    "Algeria",
    "American Samoa",
    "Andorra",
    "Angola",
    "Anguilla",
    "Antarctica",
    "Antigua",
    "Argentina",
    "Armenia",
    "Aruba",
    "Ascension",
    "Australia",
    "Austria",
    "Azerbaijan",
    "Bahamas",
    "Bahrain",
    "Bangladesh",
    "Barbados",
    "Barbuda",
    "Belarus",
    "Belgium",
    "Belize",
    "Benin",
    "Bermuda",
    "Bhutan",
    "Bolivia",
    "Bosnia and Herzegovina",
    "Botswana",
    "Brazil",
    "British Virgin Islands",
    "Brunei Darussalam",
    "Bulgaria",
    "Burkina Faso",
    "Burundi",
    "Cambodia",
    "Cameroon",
    "Canada",
    "Cape Verde Islands",
    "Cayman Islands",
    "Central African Republic",
    "Chad",
    "Chile",
    "China",
    "Christmas Island",
    ]
    tlpn = random.choice(telpx)
    fn = fake.first_name()
    ln = fake.last_name()
    #print(dobb)
    data = {
        "name": f"{fn} {ln}",
        "dob": dobb,
        "country": tlpn,
        "gender": genxer,
        "accountType": pedsi
    }
    res = requests.post("http://api.sopay.ai/user/save-user-details", headers=headers, json=data)
    hhh = json.loads(res.text)
    #print(data)
    akxs = f"{email}|TeamYocky2023"
    print("Message: "+hhh["message"])
    if hhh['success']:
        with open('akunsopay.txt', 'a') as f:
                    f.write(akxs + '\n')
    else:
        jjxsh = " hai"
    print("====SUKSES====")
    time.sleep(2)
  except Exception as e:
    # handle any other exception
    print("An error occurred:", str(e))
    continue       
  