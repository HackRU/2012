""" This file configures the URL routes on your server. Currently it tells you that
whenever someone visits our site, they should be taken to the home() function in 
mapbooks.views """
from django.conf.urls.defaults import patterns, include, url
import os, settings

urlpatterns = patterns('',
	url(r'^$', 'howfarareyou.views.home'), # Call the mapbook.views.home function when someone visits /
	# This will serve files in the static directory as static files. Useful to serve CSS/Javascript through the django webserver.
	url(r'^static/(?P<path>.*)$', 'django.views.static.serve', {'document_root': os.path.join(settings.PROJECT_PATH, 'static'), 'show_indexes': True}),

)
