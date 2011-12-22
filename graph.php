<?php
require_once('jpgraph/jpgraph.php');

require_once('jpgraph/jpgraph_line.php');
//taken from this post; http://www.brighthub.com/hubfolio/matthew-casperson/articles/55417.aspx 

$data = array(1, 2, 5, 5, 1, 20);
$data2 = array(3, 2, 3, 3, 4, 3);

// Width and height of the graph

$width = 500; $height = 200;

// Create a graph instance

$graph = new Graph($width,$height);

// Specify what scale we want to use,

// int = integer scale for the X-axis

// int = integer scale for the Y-axis

$graph->SetScale('intint');

// Setup a title for the graph

$graph->title->Set('JPGraph demo');

// Setup titles and X-axis labels

$graph->xaxis->title->Set('some value');

// Setup Y-axis title

$graph->yaxis->title->Set('number of some unit');

// Create the linear plot

$lineplot=new LinePlot($data);
$lineplot->SetColor('red');
$lineplot->SetWeight(2);
$lineplot->mark->SetType(MARK_UTRIANGLE);
$lineplot->mark->SetColor('red');
$lineplot->mark->SetFillColor('red');



// create the second plot
$lineplot2= new LinePlot($data2);
$lineplot2->mark->SetType(MARK_SQUARE);
$lineplot2->mark->SetColor('blue');
$lineplot2->mark->SetFillColor('blue');

// Add the plot to the graph

$graph->Add($lineplot);
$graph->Add($lineplot2);

// Display the graph

$graph->Stroke();

?>