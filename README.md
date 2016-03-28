Sentry plugin for Craft CMS
=================

Plugin that allows you to log Craft Errors/Exceptions to Sentry, based on [https://github.com/boboldehampsink/rollbar](https://github.com/boboldehampsink/rollbar)

![Craft Sentry plugin admin settings screen screenshot](http://monosnap.com/image/nvFCfnMenK6DhMDd669klEDlxn7Tks.png)
 
Features
=================
 - Log Craft Errors/Exceptions to Sentry
 - Logs the environment you're working on
 - Integrates seamlessly, one click install
 - You can limit what pages get JS Raven loaded on them by applying a page filter.
 - You can limit which HTTP error codes get reported to sentry in the settings (for example, if you don't want to report 400 or 404 errors).

Setup
=================
Two ways to configure the plugin:

* Enter Sentry DSN or public DSN (for JS reporting) via Plugin settings \
**or** 
* Via your server's environment (loaded `$_ENV['sentryDsn']` and `$_ENV['sentryPublicDsn']`)
 
Important:
=================
The plugin's folder should be named "sentry"

Changelog
=================
### 1.1.1
- Added ability to load DSN/publicDSN from .env
### 1.1
- Added ability to ignore HTTP error codes, JS error reporting, JS error page filters, etc.
### 1.0
 - Initial push to GitHub after changes from https://github.com/boboldehampsink/rollbar