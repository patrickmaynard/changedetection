* x Create initial version of check.php script that includes all logic -- we need to get this thing running because our old change-detection service isn't working anymore!
* x Fix whitespace using an actual IDE (original was hackd together in a messed-up copy of Vim)
* x Fix	isAnyChangePresent method -- it's not doing its job right now
* x Fix line lengths -- some of them are getting pretty long
* x Set up a PSR-4-compliant autoloader
* x Move classes to their own files in keeping with PSR-1
* x Create a function or property that returns the project base path, subbing it in for all of those directory traversals I'm doing in Checker.php for now.
* x Add unit tests (will require making some Checker.php methods public)
* Allow the user to set the number of nearby chars checked on a per-url basis
* Get the mailer working (probably using Laradock and Mailu)
* Show in the README file how to set up mailu and the cron job to run a check every hour
* Improve the README file in general
* Ask on Stack Overflow whether there are any ways to simplify the README by pre-configuring things
* Rename the repository to change-detection -- with a dash
* Link to the script on Twitter and Mastodon
* Talk to the ExoHack guys about improving on this base -- with a browser UI, for example