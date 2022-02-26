<?php 


include 'database-api.php';



// financialreporting API 
 
$catid = 26;

$mo= array_filter($json, function ($hot) use ($catid) {

    return ($hot["catid"] == $catid);

});

$fr = array ();
foreach($mo as $aadi) {

			array_push($fr, $aadi);

		
}

$frc = count($fr);


// sfm API 
 
$catid = 27;

$mo= array_filter($json, function ($hot) use ($catid) {

    return ($hot["catid"] == $catid);

});

$sfm = array ();
foreach($mo as $aadi) {

			array_push($sfm, $aadi);

		
}

$sfmc = count($sfm);

// 	law API 
 
$catid = 28;

$mo= array_filter($json, function ($hot) use ($catid) {

    return ($hot["catid"] == $catid);

});

$law = array ();
foreach($mo as $aadi) {

			array_push($law, $aadi);

		
}

$lawc = count($law);


// audit API 
 
$catid = 29;

$mo= array_filter($json, function ($hot) use ($catid) {

    return ($hot["catid"] == $catid);

});

$audit = array ();
foreach($mo as $aadi) {

			array_push($audit, $aadi);

		
}

$auditc = count($audit);

// scmandpe API 
 
$catid = 30;

$mo= array_filter($json, function ($hot) use ($catid) {

    return ($hot["catid"] == $catid);

});

$scmandpe = array ();
foreach($mo as $aadi) {

			array_push($scmandpe, $aadi);

		
}

$scmandpec = count($scmandpe);


// dtandinternationaltaxation API 
 
$catid = 30;

$mo= array_filter($json, function ($hot) use ($catid) {

    return ($hot["catid"] == $catid);

});

$dtit = array ();
foreach($mo as $aadi) {

			array_push($dtit, $aadi);

		
}

$dtitc = count($dtit);



?>
