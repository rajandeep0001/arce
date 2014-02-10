<?php
//
// This file rcc1.php is used to print output.
//
$format = "%.3f" ;

// Create file for design calculations

include "../common/fileOperation.php";


// Call to function to calculate results.
moment_of_resistance($Es, $rccItem, $rccItemRes);

$i = 0;

include "../common/tableHead.php";

while ( $rccDescription[$i] )
{

if ( ($i % 2) == 0 ) $rowCol = $rowColour0;
else $rowCol = $rowColour1;
$insertCol = "STYLE =\"background: $rowCol \"";

$rccString[$i]=" $rccDescription[$i]: </p> </td><td $tableJustification > 
<p $insertCol> $rccItem[$i] </p>";

if ($rccItem[$i] != 0)
echo "<tr><td $tableJustification > <p $insertCol>  $rccString[$i]</td></tr> "; 

fwrite($fText, "$rccItem[$i]\n");

$i++;
}

$rccString[$i]="<hr></td><td><hr>";
echo "<tr><td $tableJustification > $rccString[$i] </td></tr> ";
$i = 0;
while ($rccDescriptionRes[$i])
{

if ( ($i % 2) == 0 ) $rowCol = $rowColour0;
else $rowCol = $rowColour1;
$insertCol = "STYLE =\"background: $rowCol \"";

$var1 = sprintf( $format, $rccItemRes[$i] );

$rccString[$i]=" $rccDescriptionRes[$i]: </p> </td><td $tableJustification > 
<p $insertCol>  $var1 </p> ";

echo "<tr><td $tableJustification > <p $insertCol> $rccString[$i] </td></tr> "; 


$i++;
}



fclose($fText);

$myCommand = "sh ../tmp/raiKK";
//shell_exec($myCommand); 

$result = array();
exec( $myCommand, &$result);


include "../common/tableFoot.php";

?>
