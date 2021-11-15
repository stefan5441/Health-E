import googlemaps
import json
import os

from dotenv import load_dotenv

load_dotenv()

API_KEY = os.getenv("API_KEY")

gmaps = googlemaps.Client(key = API_KEY)

doctors_result = gmaps.places_nearby(location='41.9981,21.4254', radius = 40000, open_now = False, type= 'doctor', language='mk')
pharmacies_result = gmaps.places_nearby(location='41.9981,21.4254', radius = 40000, open_now = False, type= 'pharmacy', language='mk')
hospitals_result = gmaps.places_nearby(location='41.9981,21.4254', radius = 40000, open_now = False, type= 'hospital', language='mk')
dentists_result = gmaps.places_nearby(location='41.9981,21.4254', radius = 40000, open_now = False, type= 'dentist', language='mk')

data = {
    'doctors': [
    ],
    'pharmacies': [
    ],
    'hospitals': [
    ],
    'dentists': [
    ]
}

for doctors in doctors_result['results']:
    doctor = {
        'name': doctors['name'],
        'location': doctors['geometry']['location']
    }
    data['doctors'].append(doctor)

for pharmacies in pharmacies_result['results']:
    pharmacy = {
        'name': pharmacies['name'],
        'location': pharmacies['geometry']['location']
    }
    data['pharmacies'].append(pharmacy)

for hospitals in hospitals_result['results']:
    hospital = {
        'name': hospitals['name'],
        'location': hospitals['geometry']['location']
    }
    data['hospitals'].append(hospital)

for dentists in dentists_result['results']:
    dentist = {
        'name': dentists['name'],
        'location': dentists['geometry']['location']
    }
    data['dentists'].append(dentist)

with open('filteredData.json', 'w', encoding='utf8') as f:
    json.dump(data, f, indent=4, ensure_ascii=False)