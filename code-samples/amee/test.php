<?php
// Install the AMEEconnect PHP SDK with 'pear install pearhub/Services_AMEE'
// See https://github.com/AMEE/amee-lib-php

// Include required files
require_once 'Services/AMEE/DataItem.php';
require_once 'Services/AMEE/Profile.php';
require_once 'Services/AMEE/ProfileItem.php';

// Server connection details
define('AMEE_API_URL',              'stage.amee.com');
define('AMEE_API_PROJECT_KEY',      'rubytest');
define('AMEE_API_PROJECT_PASSWORD', '7u4rshrg');

// The path and drill to identify the correct calculation
/*
$sProfileCategory = "transport/train/specific/electric";
$aProfileCategory = array(
    "region" => "Scandanavia",
    "type" => "Arlanda Express"
);
 */
$sProfileCategory = "transport/car/generic";
$aProfileCategory = array(
    "fuel" => "average",
    "size" => "average"
);

try {

    // Create a new profile
    $oProfile = new Services_AMEE_Profile();

    // Get the data item
    $oDataItem = new Services_AMEE_DataItem($sProfileCategory, $aProfileCategory);

    // Prepare the values for the calculation
    // The following values MUST be provided for this usage
    $aRequiredProfileItemValues = array(
      'distance' => '24'
    );
    // The following values MAY be provided for this usage
    $aOptionalProfileItemValues = array(
#      'country' => 'SOME_VALUE',
#      'occupancy' => 'SOME_VALUE',
#      'passengers' => 'SOME_VALUE'
    );

    // Store profile item and perform calculation
    $oProfileItem = new Services_AMEE_ProfileItem(array(
        $oProfile,
        $oDataItem,
        array_merge($aRequiredProfileItemValues, $aOptionalProfileItemValues)
    ));

    // Display that the profile item was stored successfully
    #echo "Created profile item OK\n";

    // Display the result
    $aInfo = $oProfileItem->getInfo();
    echo " - CO2 ({$aInfo['unit']}/{$aInfo['perUnit']}): {$aInfo['amount']}\n";

} catch (Exception $oException) {

    // An error occured
    echo "Error: " . $oException->getMessage() . "\n";

}
?>
