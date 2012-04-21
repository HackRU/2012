### Developing Web Applications in Python quickly with Django and MongoDB.

## Installation 

You will want to [install the latest version](https://docs.djangoproject.com/en/1.4/intro/install) of Django before you proceed.

You should be able to fire up a Python interpreter and run "import django", once you've installed Django successfully.
<pre>
	[vverna@debian:hackru]$ python
	Python 2.6.6 (r266:84292, Dec 26 2010, 22:31:48) 
	[GCC 4.4.5] on linux2
	Type "help", "copyright", "credits" or "license" for more information.
	>>> 
</pre>

## Create your Django Project

<tt> django-admin.py startproject <project_name> </tt>

## Understanding the Django Framework.

Here are the files that the command generated:
<pre>
	__init__.py  
	manage.py  
	settings.py
	urls.py
</pre>

urls.py is where everything in the Django web framework begins. 

Django will attempt to match the urlpatterns in urls.py with the url that the user hits.

Here is an example urls.py
--python
<pre>
	""" This file configures the URL routes on your server. Currently it tells you that
	whenever someone visits our site, they should be taken to the home() function in 
	wherethefuckru.views """
	from django.conf.urls.defaults import patterns, include, url

	urlpatterns = patterns('',
			url(r'^$', 'wherethefuckru.views.home'), # Call the mapbook.views.home() function when someone visits /
	)
</pre>

Now let's create a views.py and a home() function inside to handle this request.

<pre>
	--views.py--

	""" Look up further documentation on Django's request object: https://docs.djangoproject.com/en/dev/ref/request-response/ """
	def home(request):
		if request.GET['hi']:
			return HttpResponse('Wow, you know how to read parameters from the URL')
		return HttpResponse("hello world")

</pre>
