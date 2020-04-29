=========================================
Ace Stream Media for Android TV changelog
=========================================

3.1.59.2 (2020-04-25)
---------------------

* Fix bug which could cause HLS brodcast freeze
* Speed up engine start
* Speed up playback start
* Speed up XMLTV processing


3.1.58.0 (2020-03-04)
---------------------

* Decrease playback start time for HLS broadcasts
* Improve peer discovery for HLS broadcasts


3.1.57.0 (unreleased)
---------------------

* Don't show error screen when GDPR notification failed to load


3.1.56.4 (unreleased)
---------------------

* Fixed crash on app start when preferences file contains unsupported values


3.1.56.3 (2019-12-30)
---------------------

* Use system notifications for urgent alerts on Android 10


3.1.56.2 (2019-12-24)
---------------------

* Fixed bug: sometimes main content sound was heard during ads playback
* Fixed crash when media button was used on some devices
* Fixed crash after device reboot
* Fixed crash when engine was accessed without storage permission
* Fixed several bugs causing crashes on app startup or when app is in background


3.1.56.1 (2019-12-19)
---------------------

* Minor bugfixes


3.1.56.0 (2019-12-18)
---------------------

* Fixed bug: sign in with Ace Stream account didn't work sometimes
* Added translations


3.1.55.4 (2019-12-10)
---------------------

* Fixed engine starting on ARMv8-64 devices
* Fixed crashes caused by using WebView in multiple processes on Android 9+


3.1.55.1 (2019-12-03)
---------------------

Changes in TV UI:

* fix translations on main screen
* add button to launch or install "Ace Stream LiveTV" app


3.1.52.0
--------
* Use FFMPEG for HLS processing by default (can be disabled in preferences)
* Fix compatibility issues for old devices with 64-bit architecture

3.1.51.5
--------
* Fixed bug with frozen video ads

3.1.51.4
--------
* Fixed bug with external player detection while playing playlist

3.1.51.3
--------
* Support for 64-bit architecture

3.1.51.1
--------
* Fix crash in login screen
* Fixed several issues with playing HLS streams
* Fixed multicast peer exchange

3.1.50.1
--------
* Fix playlist sorting issue over AceCast
* Update current playlist item style

3.1.50.0
--------
* Fix bug in disk storage module for HLS
* Fix handling multi-file torrent from third-party apps

3.1.48.0
--------
* Removed debug logging from engine
* Fixed issues in HLS downloader module

3.1.47.3
--------
* A major optimization of connections handling module is done, which is aimed at improving the stability of the stream during playback
* Fixed bug in engine which caused speed drop and stopping of playback after some time of watching broadcast
* Fixed problem in LibVLC HLS module, which caused unexpected player closing during playback
* Fixed bug: engine failed to start when main port was busy
* Fixed bug (possible crash in player since 3.1.46.0)

3.1.46.0
--------
* Added "lock" button
* "Info" button moved to bottom panel
* Fixed AceCast bug (playback was stopped when remote control is reconnected while player is paused)

3.1.45.3
--------
* Added ability to remember player from notification
* Added "info" button to player (show P2P info)

3.1.45.2
--------
* Use latest stable LibVLC

3.1.45.1
--------
* Fixed playback of HLS broadcasts in "HLS" or "Original" output format in Ace Player
* Try to restore audio volume if it was reset by mistake

3.1.45.0
--------
* Fixed crashes of rewarded ads
* Fixed integration bugs
* Reduced background memory usage

3.1.44.1
--------
* Fixed several bugs leading to crashes

3.1.44.0
--------
* Fixed more issues with third-party app integration

3.1.43.0
--------
* Fixed issues with third-party app integration

3.1.42.8
--------
* Fix issue with subscriptions

3.1.42.7
--------
* Fixed crash after clicking "Load last playlist"
* Fixed crash after selecting player from the list

3.1.42.6
--------
* Fix crash when starting playback in Ace Player from notification

3.1.42.4
--------
* Added PollFish OfferWall mode
* Fix to prevent "Context.startForegroundService() did not then call Service.startForeground()" on some devices
* Some other top crashes are fixed

3.1.42.2
--------
* Optimizations in engine
* Bug fixes

3.1.41.1
--------
* Fix some issues with authorization
* Fixed bug: engine session was not stopped after clicking "stop" button when casting to Chromecast
* Fixed crashes on some Samsung devices
* Optimizations in broadcast stability

3.1.40.0
--------
* Fixed one more bug in Engine API (stream was locked after STOP)

3.1.39.0
--------
* Fixed bug in Engine API

3.1.38.0
--------
* Added "Quit" button to notification (stops app)
* Fixed one more issue with unexpected app start on some devices
* Use latest jmDNS library (3.5.5)
* Added ability to select file from multi-file torrent when starting in Ace Player
* Fixed some bugs

3.1.37.10
---------
* Fixed issue with unexpected app start on some devices
* Fixed resolver (all installed players should be available now)
* Fixed some bugs

3.1.37.9
--------
* Fixed screen orientation preference
* Bug fixes

3.1.37.8
--------
* Changed app shutdown procedure: "quit" menu should now work on all devices
* Fixed crashes on devices with missing WebView

3.1.37.7
--------
* Fixed crash caused by seekbar inflate error (on old Android devices)
* Fixed crash when starting P2P content in external player (on some devices)
* Fixed crash when closing "Open link" dialog
* Added ability to share content with Ace Stream ("Open in Ace Stream" menu item when sharing)
* Fixed OutOfMemoryError when opening some big files

3.1.37.6
--------
* Fix crash when starting content in third-party player
* Fix crash when starting content when both Ace Stream Media and Ace Stream Engine apps are installed
* Fix crash during channels setup on Android TV
* Fix crash when opening player settings on Android TV

3.1.37.5
--------
* Fixed some crashes
* App now doesn't start after reboot by default
* Fixed some issues with stopping engine
* Fixed "Open link" dialog on Android TV versions

3.1.37.4
--------
* Minor bug fixes

3.1.37.3
--------

* Fix issue with changing locale
* Update translations

3.1.37.2
--------

* Fix LUA scripts (allow watching YouTube etc from "Open link" menu)
* Add bonuses for rewarded video in player
* Fixed some crashes
* Minor bug fixes