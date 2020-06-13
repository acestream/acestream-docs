==========
Search API
==========

This API describes data exchange format between the Ace Stream LiveTV app and external services called "channel sources", which are configured here: :doc:`search_settings`

Currently, to add new source user must enter its URL.
It's then used to exchange data between the Ace Stream LiveTV app and the source.

Interaction schema:

* when user searches for content an HTTP request is sent to the source's URL
* the source generates response in the format described in this doc
* app parses the response and shows search results to the user

.. note:: The default protocol for accessing source URL is ``http``. This means that when user adds
          "\example.com/search" it's converted to "\http://example.com/search".

          Services that implement channel sources API must always support ``http`` protocol.
          If the service wants to exchange data over ``https`` it must redirect from ``http`` to ``https`` URL.


--------------
Request params
--------------

* ``api_version`` (integer, optional) - API version which should be used to generate response (default is 4)
* ``query`` (string, optional) - search query
* ``category`` (string, optional) - filter by category (list of categories_)
* ``page`` (integer, optional) - page number (starting from 0, default is 0)
* ``page_size`` (integer, optional) - page size (default is 10)

.. note:: When ``query`` param is empty service must return all available channels (pagination still applies).

---------------
Response format
---------------

Response must be JSON with such fields:

**Top level**:

* ``result`` (``Root`` object, required) - root object

**Root**:

* ``total`` (integer, required) - total number of found items
* ``time`` (float, required) - query execution time
* ``api_version`` (integer, optional) - API version used to generate output
* ``results`` (array of ``Channel`` objects, required) - list of found channels

**Channel**:

* ``name`` (string, required) - channel title
* ``items`` (array of objects, required) - list of streams for this channel (there can be more than one stream for each channel)
* ``icons`` (array of ``Icon`` objects, optional) - channel icons
* ``epg`` (array of ``EPG`` objects, optional) - channel EPG

**Stream**:

* ``url`` (string, optional) - stream URL (for regular streams, without P2P support)
* ``infohash`` (string, optional) - infohash

**Icon**:

* ``type`` (integer, required) - type of icon:

  * 0: just logo
  * 1: light logo (for dark themes)
  * 2: dark logo (for light themes)
  * 3: picon (220x132 image)

* ``url`` (string, required) - icon URL

**EPG**:

* ``start`` (integer, required) - program start (seconds since epoch)
* ``stop`` (integer, required) - program start (seconds since epoch)
* ``name`` (string, required) - program title
* ``description`` (string, optional) - program description
* ``poster_uri`` (string, optional) - program poster URI


--------------
API versioning
--------------

Current API version is 4. It's used as default when no API version is specified in either request of response.


----------
Categories
----------

* informational
* entertaining
* educational
* movies
* documentaries
* sport
* fashion
* music
* regional
* ethnic
* religion
* teleshop
* erotic_18_plus
* other_18_plus
* cyber_games
* amateur
* webcam
* kids
* series


--------
Examples
--------

Assume that the source URL is `http://example.com/search`

Empty response
--------------

.. code-block:: http

   GET /search?query=test HTTP/1.1
   Host: example.com
   Accept: application/json

.. code-block:: json

   {
     "result": {
       "time": 0.34,
       "total": 0,
       "results": []
     }
   }

Response with one channel
-------------------------------

.. code-block:: http

   GET /search?query=brodilo HTTP/1.1
   Host: example.com
   Accept: application/json

.. code-block:: json

   {
     "result": {
       "time": 0.015,
       "total": 1,
       "results": [
         {
           "name": "Brodilo TV",
           "items": [
             {"url": "http:\/\/brodilo.tv\/channel.php"}
           ]
         }
       ]
     }
   }

Test channel source
-------------------

You can play live with test channel source:
http://acestream.org/demo/channel_source/search


----------
Pagination
----------

Pagination is controlled by ``page`` and ``page_size`` request params and ``total`` response field.

For example, if the source has 15 channels then data can be retrieved with two requests.

1. Get first 10 channels:

.. code-block:: http

   GET /search?page=0&page_size=10 HTTP/1.1
   Host: example.com
   Accept: application/json

.. code-block:: json

   {
     "result": {
       "time": 0.05,
       "total": 15,
       "results": [
         "// channels 1-10 here"
       ]
     }
   }

2. Get remaining 5 channels:

.. code-block:: http

   GET /search?page=1&page_size=10 HTTP/1.1
   Host: example.com
   Accept: application/json

.. code-block:: json

   {
     "result": {
       "time": 0.05,
       "total": 15,
       "results": [
         "// channels 11-15 here"
       ]
     }
   }