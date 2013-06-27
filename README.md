# TinyTinyRSS Fever API plugin

## Description

This plugin is an open source module for TinyTinyRSS which simulates the Fever API for reading the RSS Feeds with your Fever clients.

- - -

* <a href="#features">Features</a>
* <a href="#download">Downloads</a>
* <a href="#supported">Supported/Tested Clients</a>
* <a href="#installation">Installation</a>
* <a href="#license">License</a>
* <a href="#changelog">Changelog</a>
* <a href="#copyright">Copyright</a>

## <a name="features">Features</a>

Following Features are implemented:

* getting new RSS items
* getting starred RSS items
* setting read marker for item(s)
* setting starred marker for item(s)
* hot is **not** supported

## <a name="downloads">Downloads</a>

Please click the ```ZIP``` Button to download current version. ;)

## <a name="supported">Supported/Tested Clients</a>

Full Support

* Reeder - iPhone

Limited support

* Mr.Reader - iPad - can currently only load and show items, can **not** read/star items

## <a name="installation">Installation</a>

Upload the ```fever``` folder in the ```plugins``` folder of your TinyTinyRSS installation. Enable the plugin in the preferences and set your password for the Fever API.

See [here](http://tt-rss.org/forum/viewtopic.php?f=22&t=1981) for more detailed informations.

## <a name="license">License</a>

Licensed under GNU GPL version 2 (<- I think this is okay for this plugin…)

## <a name="changelog">Changelog</a>

v1.0-v1.2 - 2013/5/27 - DigitalDJ version

* see this [thread](http://tt-rss.org/forum/viewtopic.php?f=22&t=1981) in the TinyTinyRSS Forum

v1.3 - 2013/6/27

* fixed several bugs in json output from the plugin
* added a small fix for Mr.Reader 2.0 so it can complete loading of all items
* added first Mr.Reader compatiblity without marking items read/starred
