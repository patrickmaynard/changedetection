<?php

/**
 * Yes, this is all increadibly messy for now. 
 * The TODOS.md contains fixes for all of the gross code smells below.
 */

class Checker 
{
    private $sources;

		/**
		 * Chek all urls for new stuff
		 */
    public function checkAll()
		{
				$this->sources = $this->loadSources();

        $alerts = [];

				foreach ($this->sources as $source) {
            $this->populateFiles($source);
						if ($this->isRelevantChangePresent($source)) {
						    $alerts[] = $sourcep['url'];
						}
				}

		}

		/**
		 * Compare files and return true or false
		 */
		private function isRelevantChangePresent($source)
		{
		    return 'stub';
		}

		/**
		 * Dump html into files
		 */ 
    private function populateFiles($source)
		{ 
		    $fileName = md5($source['url']);
		    $html = file_get_contents($source['url']);	

		    if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'new-snapshots' . DIRECTORY_SEPARATOR . $fileName, $html)){
				    rename(__DIR__ . DIRECTORY_SEPARATOR . 'new-snapshots' . DIRECTORY_SEPARATOR . $fileName,
								__DIR__ . DIRECTORY_SEPARATOR . 'old-snapshots' . DIRECTORY_SEPARATOR . $fileName
							);
						file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'new-snapshots' . DIRECTORY_SEPARATOR . $fileName, $html);	
				} else {
						file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'new-snapshots' . DIRECTORY_SEPARATOR . $fileName, $html);	
						file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'old-snapshots' . DIRECTORY_SEPARATOR . $fileName, $html);	
				}
		}

		/**
		 * Load the config values
		 */
    private function loadSources()
		{
			  include(__DIR__ . DIRECTORY_SEPARATOR . 'config.php');
        return $sources;
	  }
}

class Mailer
{
  	public function send($alerts)
	  { 
	      return 'stub.';
	  }
}

$checker = new Checker;
$mailer = new Mailer;
$alerts = $checker->checkAll();
if (count($alerts) > 0) {
    $mailer->send($alerts);
}

?>
