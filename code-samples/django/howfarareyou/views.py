import requests, json
from django.shortcuts import render_to_response

def home(request):
	distance = None
	address = None
	if request.GET.has_key('address'):
		address = request.GET['address']

		data = { 
			'origin': address + ' near New Brunswick, NJ',
			'destination': '110 Frelinghuysen Road, Piscataway, NJ 08854',
			'sensor': 'false', #Don't forget this.
			'mode': 'walking',
		}

		

		response = requests.get('http://maps.googleapis.com/maps/api/directions/json', params=data)


		if response.status_code == 200:
			directions = json.loads(response.text)

			distance = directions['routes'][0]['legs'][0]['distance']['text']

	return render_to_response('home.html', {'distance': distance, 'address': address})
