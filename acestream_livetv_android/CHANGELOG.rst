=========
Changelog
=========

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
