nextbus = require 'nextbusjs'
request = require 'request'
rutgers = nextbus.client()

url = 'https://rumobile.rutgers.edu/0.1/rutgersrouteconfig.txt'

# Grab the agency information (list of routes and stops, etc)
request url, (err, response, body) ->
  agencyData = JSON.parse body
  rutgers.setAgencyCache agencyData, 'rutgers'

  # show the list of stops
  agencyData.sortedStops.forEach (val) ->
    console.log val.title

  # Try a query on Hill Center
  rutgers.stopPredict 'Hill Center', null, ((err, data) ->
    if err then return console.dir err
    console.log (JSON.stringify data, false, 4)
  ), 'both'
