import os

# Django settings for mapbook project.

DEBUG = True
TEMPLATE_DEBUG = DEBUG

# This is useful for deploying across multiple machines.
PROJECT_PATH = os.path.abspath(os.path.dirname(__file__))

# Things you probably don't care about
TIME_ZONE = 'America/New_York'
LANGUAGE_CODE = 'en-us'
SITE_ID = 1
USE_I18N = True
USE_L10N = True

# Make this unique, and don't share it with anybody.
SECRET_KEY = '7_u%qfwzn+w1ii!g4ulac9w9q@f=s6hy%#6=58b43g^w#3^3s7'

# List of callables that know how to import templates from various sources.
TEMPLATE_LOADERS = (
    'django.template.loaders.filesystem.Loader',
    'django.template.loaders.app_directories.Loader',
)

MIDDLEWARE_CLASSES = (
)

# Where Django will read URL Patterns from.
ROOT_URLCONF = 'howfarareyou.urls'

TEMPLATE_DIRS = (
		os.path.join(PROJECT_PATH, 'templates'),
)

INSTALLED_APPS = (
)
