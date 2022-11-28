<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exads\ABTestData;

class ABTestController extends Controller
{
    public function get_testDesign()
    {
        $abTest = new ABTestData(1);
        $designs = $abTest->getAllDesigns();

        $rand = rand(1, 100);
        $curr_offset = 1;

        if(empty($designs)) return response("Something went wrong! Empty designs.", 500);

        foreach($designs as $curr_design)
        {
            if($rand < $curr_offset+$curr_design['splitPercent'] && $rand >= $curr_offset) {return view('show_design', ['design'=>$curr_design]);}
            $curr_offset += $curr_design['splitPercent'];
        }

        return response("Something went wrong! Couldn't decide design.", 500);
    }
}
