* x Create initial version of check.php script that includes all logic -- we need to get this thing running because our old change-detection service isn't working anymore!
* x Fix whitespace using an actual IDE (original was hackd together in a messed-up copy of Vim)
* Fix	isAnyChangePresent method -- it's not doing its job right now
* Fix line lengths -- some of them are getting pretty long
* Move classes to their own files in keeping with PSR-1
* Set up a PSR-4-compliant autoloader
* Move config into an XML or CSV file
* Get the mailer working (maybe using Swift Mailer?)
* Improve the README file
* Allow the user to set the number of nearby chars checked on a per-url basis
* Put this up on packagist
