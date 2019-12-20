==========================================
Ace Stream Engine for Android TV changelog
==========================================

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


3.1.55.1 (2019-12-03)
---------------------

Fix LibVLC options:

* change "enable_time_stretching_audio" default value to "true"
* set default values for "deblocking" and "resampler" in runtime based on machine specs


3.1.55.0
--------
* Allow adding custom channel sources

3.1.54.0
--------
* Fixed several bugs

3.1.53.0
--------
* Initial release of app with TV UI

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
* Fixed crash after selecting player from the list

3.1.42.6
--------
* Fix crash when starting playback in Ace Player from notification

3.1.42.4
--------
* Optimizations in engine
* Added PollFish OfferWall mode
* Fix to prevent "Context.startForegroundService() did not then call Service.startForeground()" on some devices
* Some other top crashes are fixed

3.1.41.1
--------
* Fix some issues with authorization
* Optimizations in broadcast stability

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

3.1.37.4
--------
* Minor bug fixes

3.1.37.3
--------

* Fix issue with changing locale
* Update translations

3.1.37.2
--------

* Add bonuses for rewarded video in player
* Fixed some crashes
* Minor bug fixes

