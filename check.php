<?php

/**
 * Yes, this is all increadibly messy for now. 
 * The TODOS.md contains fixes for all of the gross code smells below.
 */

class Checker 
{
    private $sources;

    public function checkAll()
		{
        echo "\n Checking ... \n";
				$this->sources = $this->loadSources();
				
				echo "\n Length of sources array: " . count($this->sources)  . "\n";
				foreach ($this->sources as $source) {
				echo "\n In the loop ... \n";

					$fileName = md5($source['url']);
				    $html = file_get_contents($source['url']);	

						file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'new-snapshots' . DIRECTORY_SEPARATOR . $fileName, $html);
				}

		}

    private function loadSources()
		{
			  echo "\n Fetching config ... \n";
			  include(__DIR__ . DIRECTORY_SEPARATOR . 'config.php');
			  echo "\n Done fetching config. \n";
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
//if (count($alerts) > 0) {
//    $mailer->send($alerts);
//}

?>
