<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 02/08/11
 * Time: 10:10
 * Flightplan Version 2, use jpgraph for speed and based ont he NW Kent college model
 **/

require_once("moodle_connection_mysqli.php");
//$var1 = '10082335';
$query = "SELECT * FROM flightplan where student_id='" . $_GET['var1'] . "' LIMIT 12";
//$query = "SELECT * FROM flightplan where student_id='" . $var1 . "'";
//echo $query;

$result = $mysqli->query($query);

$ydata = array();
$date = array();
// pad the data with a leading 3 for the start score
array_push($ydata, '3');
// pad the date with a leading 0 for the start score
array_push($date, '0');
while ($row = $result->fetch_object()) {
    array_push($ydata, $row->score);
    $date2 = strtotime($row->date);
    array_push($date, date("d-m-Y", $date2));
}

// Find array size to allow the correct number of scores to be added for the min target and aspirational lines
$count = count($ydata);
$ydata2 = array();
$ydata3 = array();
// Fill out the other arrays
for ($i = 0; $i < $count; $i++) {
    array_push($ydata2, '3');
    array_push($ydata3, '5');
}

require_once('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');

// Size of the overall graph
$width = 440;
$height = 270;

// Create the graph and set a scale.
// These two calls are always required
$graph = new graph($width, $height);
$graph->SetScale('intlin');

// Setup margin and titles
$graph->SetMargin(40, 20, 20, 40);
$graph->title->Set('Student Flightplan - last 12 reviews');
$graph->title->SetFont(FF_ARIAL, FS_NORMAL, 13);
$graph->SetScale('intlin', 0, 6);
$graph->xaxis->title->Set('');
$graph->yaxis->title->Set('Score');
$graph->yaxis->HideZeroLabel();
$graph->xaxis->HideZeroLabel();

$graph->yscale->ticks->Set(1);

// set and rotate the axis text
$graph->xaxis->SetFont(FF_ARIAL, FS_NORMAL, 8);
$graph->xaxis->SetLabelAngle(35);
$graph->yaxis->SetFont(FF_ARIAL, FS_NORMAL, 8);

// Create the linear plot
$lineplot = new LinePlot($ydata);
$lineplot2 = new LinePlot($ydata2);
$lineplot3 = new LinePlot($ydata3);

// Set the line colours,styles and widths
$lineplot->SetColor('#2BD52B');
$lineplot->SetWeight('4');
$lineplot2->SetColor('teal');
$lineplot2->SetWeight('2s');
$lineplot3->SetColor('#FF7F2A');
$lineplot3->SetStyle('dashed');
$lineplot3->SetWeight('3');

// Put markers in the main line
$lineplot->mark->SetType(MARK_UTRIANGLE);
$lineplot->mark->SetColor('blue');
$lineplot->mark->SetFillColor('red');

$graph->xaxis->SetTickLabels($date);

// Add the plot to the graph
$graph->Add($lineplot);
$graph->Add($lineplot2);
$graph->Add($lineplot3);
$graph->img->SetMargin(40, 40, 20, 100);
// Set the Legend
$lineplot->SetLegend("Flightplan");
$lineplot2->SetLegend("Minimum Target");
$lineplot3->SetLegend("Personal Best");

// set up the graph
$graph->legend->SetLayout(LEGEND_HOR);
$graph->legend->SetFont(FF_ARIAL, FS_NORMAL, 10);
$graph->legend->Pos(0.5, 0.95, "center", "bottom");
$graph->SetMarginColor('white');

$graph->SetFrame(false);
//$graph->img->SetAntiAliasing();
// Display the graph
$graph->SetShadow();
$graph->Stroke();

?>

