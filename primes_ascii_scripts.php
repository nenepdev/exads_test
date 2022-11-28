<?php


switch($argv[1])
{
    case 'multiples':
        echo "Im a mutiple of...\n";
        factors_list();
        break;

    case 'ascii':
        echo "Random ascii deletion...\n";
        missing_ascii();
        break;
}


function factors_list()
{
    $multiples = array();
    $multiples[1] = 1;

    for($i=2; $i<=100; $i++)
    {
        $tmp_multiples = array();

        for($j=intdiv($i,2); $j>1; $j--)
        {
            if($i%$j == 0) 
            {
                array_push($tmp_multiples,$j);
            }

        }

        if(count($tmp_multiples) == 0) {$multiples[$i] = 'PRIME'; continue;}
       
        array_push($tmp_multiples,$i,1);
        $multiples[$i] = implode(',', $tmp_multiples);
    }
    print_r($multiples);
}

function missing_ascii()
{

    // build ascii array and shuffle positions
    $ascii = range(',', '|');
    shuffle($ascii);

    // del random elem
    $rand_del = rand(0,count($ascii)-1);
    unset($ascii[$rand_del]);

    echo get_missing_chr($ascii);
    
}

function get_missing_chr($ascii)
{
    // populate boolean ascii array
    $bool_ascii = range(',', '|');
    foreach($ascii as $curr_ascii)
    {
        $bool_ascii[ord($curr_ascii)-44] = 1;
    }

    // char diff than one, its the missing one
    foreach ($bool_ascii as $curr_ascii)
    {
        if($curr_ascii!=1) return $curr_ascii;
    }

    return false;
}


?>