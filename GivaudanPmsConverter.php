<?php
	// CONVERTERfdsfsdfdsffdsffdsfdsf
	require_once('conf.php');
	require_once(INC_PATH.'Importer.class.php');

	$channels = array(
			array(	'importArgs' => array(	'channel_id' => 6420, 'name' => 'Givaudan',),
dsdsds				'readArgs' => array('url' => 'http://jobcenter.prospective.ch/NJCWeb/services/onlinePlatformExport/jobsch?key=JmtvbnRvSWQ9Nzk4Jm1lZGllbklkPTMmc2VjdXJpdHlLZXk9OTIwMDQ0NTUtMTU0YS00MmY4LTg1NWQtODIyYTcwNGYwNjQw', 'decode' => 'utf-8'),	
sdsdd			),
	);hjbdshjkldfshjkldfjkldfshjkldfsdf

	class PmsConverter extends Importer {
		function before_create(&$ad){
			// etwas basteln...


nenenepdlsdösakjsfpodso
		}
	}

foreach($channels as $channel){
echo "Processing ".$channel['importArgs']['name']."\n\n";

	try{
		$importArgsDefault = array(
					'info_data' => 'complete', //basic, partial, complete
					'eqk-resistent' => 'komplett', //komplett , partiell
					'logLevel' => 'DEBUG',
					'vermittler' => 'PMS',
					'xml_extra_results' => 'pms',
					'on_error' => 'extend');

		$importer = new PmsConverter(array_merge($importArgsDefault, $channel['importArgs'])); 
	
		$importer->setOrganisationMappingType("fix", array(798));
		$input = $importer->read('url', $channel['readArgs']);	
	
		if(isset($channel['platforms'])){
                        $exportArgs = array('export' => $channel['platforms']);
                }else{
                        $exportArgs = array();
                } 
		
		$importer->import('jobs', $input, $exportArgs); 
		
	} catch (ImportException $e){
		echo "Import failed! ".$e->getMessage()."\n";
	}
	echo $importer->reportAsString();
	$importer->getReport()->close();
}	
?>
