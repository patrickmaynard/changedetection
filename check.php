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
		    if ($source['must_contain_new'] === '*') {
				    return $this->isAnyChangePresent($source);
				} else {
				    return $this->isSubstringChangePresent($source);
				}
		}

		/**
		 * Look for a specific substring in new text.
		 */
    private function isSubstringChangePresent($source)
		{  
				$fileName = md5($source['url']);
				$oldHtml  = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'old-snapshots' . DIRECTORY_SEPARATOR . $fileName);
				$newHtml  = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'new-snapshots' . DIRECTORY_SEPARATOR . $fileName);
				
				preg_match_all('/.{500}'. $source['must_contain_new'] . '.{500}/sU',$newHtml,$matches);
				foreach($matches as $match){
			      foreach($match as $submatch){
						    if (!is_numeric($submatch)) {
								    if (strpos($oldHtml,$submatch)  === false) {
										    return true;
										}
								}
						}
				}

				return false;
		}

    /**
		 * Checks to see if any change is present at all.
		 */
    private function isAnyChangePresent($source)
		{
				$fileName = md5($source['url']);
				$oldHtml  = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'old-snapshots' . DIRECTORY_SEPARATOR . $fileName);
				$newHtml  = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'old-snapshots' . DIRECTORY_SEPARATOR . $fileName);
				return ! ($oldHtml === $newHtml);
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
			echo "\n(Stub) Alerts would be generated for these urls: \n";
			var_dump($alerts);
	  }
}

$checker = new Checker;
$mailer = new Mailer;
$alerts = $checker->checkAll();
if (count($alerts) > 0) {
    $mailer->send($alerts);
} else {
    echo "\nNo alerts generated.\n";
}

?>
