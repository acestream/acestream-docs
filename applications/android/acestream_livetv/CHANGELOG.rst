=========
Changelog
=========

3.1.61.0 (2020-06-17)
---------------------

* Fix bug with playback in external players
* Don't reset selected category in EPG after starting channel
* Fix bug with "frozen" timeline in EPG
* Preserve current position when EPG is updated while the user is browsing it
* Add preferred languages and countries to settings
* Add ability to find additional channel sources
* Show categories from playlist in EPG left menu
* Allow grouping by countries/languages in channel editor


3.1.60.0 (2020-05-20)
---------------------

* Fix the order of last watched channels on the main Android TV screen
* Add support for "x-tvg-url" tag (link to the EPG source in the playlist)
* Fix the issue with possible disappearing of playlist after engine stopping
* Fix bug with endless "Initialization..." message
* Disable autoplay in channel editors (can be enabled in settings)
* Speed up EPG sources processing
* Changes in parental controls:
  * fix bug: blocked channel was visible for a few seconds while tuning
  * don't show blocked channels on the main Android TV screen
  * entered PIN is remembered for one minute


3.1.59.4 (2020-04-30)
---------------------

* Fix running on old Android versions


3.1.59.2 (2020-04-25)
---------------------

* New feature: group channels by name
* New feature: automatically search for working sources
* Fix bug which could cause HLS brodcast freeze
* Speed up engine start
* Speed up playback start
* Speed up XMLTV processing
* Detect and notify missing network connection
* Sync changes from channel editor


3.1.58.0 (2020-03-02)
---------------------

* Decrease playback start time for HLS broadcasts
* Improve peer discovery for HLS broadcasts
* Fix crashes on Android 4
* Add EPG source from "url-tvg" tag when importing playlist from uploaded file
* Fix processing large gzipped XMLTV files


3.1.57.1 (2020-02-19)
---------------------

* Fix bug: some channels didn't start and app can crash when switching channels
  after previous app update


3.1.57.0 (2020-02-17)
---------------------

* Improve playlist import
* Hide unknown bitrate from channel info instead of showing "?"
* Don't show error screen when GDPR notification failed to load
* Add link to GDPR consent in "About" screen
* Fixed "Edit search sources" screen (in previous versions list of sources may
  be empty)


3.1.56.3 (2019-12-30)
---------------------

* Use system notifications for urgent alerts on Android 10


3.1.56.2 (2019-12-24)
---------------------

* Fixed some translation issues
* Fixed bug: sometimes main content sound was heard during ads playback
* Fixed crash when media button was used on some devices
* Fixed crash when engine was accessed without storage permission
* Fixed crash on pressing RIGHT in empty channels editor
* Fixed several bugs causing crashes on app startup or when app is in background


3.1.56.1 (2019-12-19)
---------------------

* Close app when "Cancel" is pressed in a notification about required remote control
* Minor bugfixes


3.1.56.0 (2019-12-18)
---------------------

* Added custom EPG sources
* Added translations
* Fixed app crash when changing language
* Notify user that remote control is required for this app
* Fixed bug: on some devices main menu was not shown after pressing "OK"
* Fixed bug: sign in with Ace Stream account didn't work sometimes


3.1.55.4 (2019-12-10)
---------------------

* Fixed engine starting on ARMv8-64 devices
* Battery optimization: discover devices only on user's request (don't do it in background)
* Fixed crashes caused by using WebView in multiple processes on Android 9+
* Fixed AceCast device discovery issue (device was not visible for several minutes after it restarted on another port)
* Don't stop playback on AceCast device when it's disconnected by user


3.1.55.1 (2019-12-03)
---------------------

Fix LibVLC options:

* change "enable_time_stretching_audio" default value to "true"
* set default values for "deblocking" and "resampler" in runtime based on machine specs


3.1.55.0 (2019-11-28)
---------------------

Allow adding custom channel sources. Read more here: :doc:`search_settings`


3.1.54.0 (2019-11-18)
---------------------

Fixed several minor bugs


3.1.53.0 (2019-11-14)
---------------------

Initial release
