<?php
require_once('tvseries.class.php');


class TvSeriesView extends TvSeries
{
    private $weekday_key = array(0 => 'monday', 1 => 'tuesday', 2 => 'wednesday', 3 => 'thursday', 4 => 'friday', 5 => 'saturday', 6 => 'sunday');
         
    public function show_all_tvseries($title=null)
    {
        $tv_series = $this->get_tvseries($title);
        if($tv_series===false) {return false;}
        $this->print_tvseries($tv_series);
    }
    
    public function show_next_tvserie($title=null)
    {
        $tv_series = $this->get_next_tvserie($title);
        if($tv_series===false) {return false;}
        $this->print_tvseries($tv_series);
    }

    public function print_tvseries($tv_series)
    {
        if(empty($tv_series)) {echo "Empty set.\n"; return;}

        if(!is_array($tv_series)) $tv_series = [$tv_series];

        foreach($tv_series as $tv_serie)
        {
            if(!isset($tv_serie['title']) or !isset($tv_serie['gender']) or !isset($tv_serie['week_day']) or !isset($tv_serie['show_time']) or !isset($tv_serie['channel'])) {echo "something wrong\n"; return false;}

            echo $tv_serie['title']."|".$tv_serie['gender']."|".$this->weekday_key[$tv_serie['week_day']]."-".$tv_serie['show_time']."\n";
        }
    }

    

}