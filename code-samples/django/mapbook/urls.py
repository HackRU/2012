""" This file configures the URL routes on your server. Currently it tells you that
whenever someone visits our site, they should be taken to the home() function in 
mapbooks.views """
from django.conf.urls.defaults import patterns, include, url

urlpatterns = patterns('',
	url(r'^$', 'mapbook.views.home'), # Call the mapbook.views.home function when someone visits /
)
