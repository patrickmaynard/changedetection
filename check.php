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
				$this->sources = $this->loadSources();
				
				foreach ($this->sources as $source) {
            $this->manageFiles($source);
				}

		}

    private function manageFiles($source)
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
