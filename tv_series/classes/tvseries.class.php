<?php
require_once('DBHandler.php');

class TvSeries extends DBHandler
{

    protected function get_tvseries($title=null)
    {
        if(empty($title)) $title_cond = "";
        else $title_cond = "and title='".$title."'";

        $sql = 
        'SELECT * FROM tv_series
        JOIN tv_series_intervals ON tv_series.id = id_tv_series
        WHERE 1=1 '.$title_cond.'
        ORDER BY title, week_day, show_time' ;

        try
        {
            $result = $this->connect()->query($sql);
        }
        catch(Exception $e)
        {
            echo "Error:". $e->getMessage();
            return false;
        }

        if ($result->num_rows >= 0) return $result->fetch_all(MYSQLI_ASSOC);
        return false;

    }


    protected function get_next_tvserie($title=null)
    {

        if(empty($title)) $title_cond = "";
        else $title_cond = "and title='".$title."'";

        $sql = 
        'SELECT * FROM (
            SELECT week_day, show_time, id_tv_series,
            IF(week_day != WEEKDAY(CURRENT_DATE()), 
            CONCAT(DATE_ADD(CURRENT_DATE(), INTERVAL week_day+1 DAY), " ", show_time), 
            CONCAT(CURRENT_DATE(), " ", show_time)) AS aux_table 
            FROM tv_series_intervals 
        )a 
        JOIN tv_series ON tv_series.id = id_tv_series
        WHERE aux_table >= CURRENT_TIMESTAMP() '.$title_cond.' 
        ORDER BY aux_table LIMIT 1';

        try
        {
            $result = $this->connect()->query($sql);
        }
        catch(Exception $e)
        {
            echo "Error:". $e->getMessage();
            return false;
        }

        if ($result->num_rows >= 0) return $result->fetch_all(MYSQLI_ASSOC);
        return false;
    }

    
}

