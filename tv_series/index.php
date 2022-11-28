<?php
require_once('classes/tvseriesview.class.php');

$tvs = new TvSeriesView();
// show all tv series and air times
echo "Show all:\n";
$tvs->show_all_tvseries();

// get next tv show
echo "Next show:\n";
$tvs->show_next_tvserie();

// get next air time of existing serie
echo "Next Atypical show:\n";
$tvs->show_next_tvserie("Atypical");

echo "Non existing show:\n";
// get next air time of non-existing serie
$tvs->show_next_tvserie("Madeup");





