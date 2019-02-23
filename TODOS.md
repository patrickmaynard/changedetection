* x Create initial version of check.php script that includes all logic -- we need to get this thing running because our old change-detection service isn't working anymore!
* x Fix whitespace using an actual IDE (original was hackd together in a messed-up copy of Vim)
* x Fix	isAnyChangePresent method -- it's not doing its job right now
* x Fix line lengths -- some of them are getting pretty long
* x Set up a PSR-4-compliant autoloader
* x Move classes to their own files in keeping with PSR-1
* x Create a function or property that returns the project base path, subbing it in for all of those directory traversals I'm doing in Checker.php for now.
* Add unit tests (will require making some Checker.php methods public)
* Allow the user to set the number of nearby chars checked on a per-url basis
* Get the mailer working
* Improve the README file
* Link it on Twitter and Mastodon
* Talk to the ExoHack guys about putting this in a form that would work on Packagist