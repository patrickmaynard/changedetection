<?php

	$sources = [
		[
			'url' => 'https://www.buzzfeed.com/de/jasonaleopold',
			'must_contain_new' => 'Jason Leopold',
		    'check_this_many_chars_proximity' => 500
		],
		[
			'url' => 'https://travel.state.gov/content/travel/en/international-travel/International-Travel-Country-Information-Pages/Germany.html',
			'must_contain_new' => '*'
		],
	    [
	        'url' => 'http://example.com/',
	        'must_contain_new' => '*'
	    ],
	    [
	        'url' => 'http://www.wgberlin.net/tempelhof/',
	        'must_contain_new' => 'Miete',
	        'check_this_many_chars_proximity' => 300
	    ],
	];

?>
