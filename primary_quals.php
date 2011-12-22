<?php

/*
 * Work out and show the users MTG based on their QCA and Primary quals
 */


$resultStudent = $client->__soapCall("getPrimaryQualById", array($student_number));


$year = date("Y", $academicYearStamp);
$averagescore = $qca;


//echo 'year is' . $year;
$mtg_grade = '';

if (!empty($qca)) {

    foreach ($resultStudent as $item) {

        $ladNum = $item['LAD_Aim'];
        $qualTitle = trim($item['Qual_Title']);
        $level = trim($item['Notional_Level']);
        $qualType = trim($item['Qual_type']);
        //    echo 'a hit ' . $ladNum;

        $mtg_grade = checkMtg($ladNum, $averagescore, $mtg_grade, $qualTitle, $level, $qualType);
        //    echo'mtg is', $mtg_grade;
    }

} else {
    $mtg_grade = 'NN/A';
}


// BTECS
function checkMtg($ladNum, $averagescore, $mtg_grade, $qualTitle, $level, $qualType)
{

    if ($ladNum == '5007801X') {
        if ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 44) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 38) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore >= 30) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        } elseif ($averagescore < 30) {
            $mtg_grade = $mtg_grade . '-' . 'MPP';
        }
    } elseif ($ladNum == '50091499') {
        if ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 46) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 41) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 33) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore >= 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'MPP';
        }
    } elseif ($ladNum == '50075664') {
        if ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 44) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 38) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 30) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore < 29) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        }
    } elseif ($ladNum == '50078781') {
        if ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 45) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 39) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 34) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore >= 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'MPP';
        }
    } elseif ($ladNum == '50068726') {
        if ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 39) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 29) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        }
    } elseif ($ladNum == '50068726') {
        if ($averagescore >= 47) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 40) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 34) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 29) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        }
    } elseif ($ladNum == '50068726') {
        if ($averagescore >= 47) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 39) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 32) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 27) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore < 26) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        }
    } elseif ($ladNum == '50073813') {
        if ($averagescore >= 47) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 39) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 32) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 27) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore < 26) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        }
    } elseif ($ladNum == '5007717X') {
        if ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 28) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        }
    } elseif ($ladNum == '50077168') {
        if ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 45) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 40) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 35) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore >= 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'MPP';
        }
    } elseif ($ladNum == '50067643') {
        if ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 45) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 40) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 35) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore >= 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'MPP';
        }
    } elseif ($ladNum == '50068015') {
        if ($averagescore >= 49) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 44) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 41) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 36) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore >= 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'MPP';
        }
    } elseif ($ladNum == '50098615') {
        if ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 47) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 43) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 36) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore >= 30) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        } elseif ($averagescore < 30) {
            $mtg_grade = $mtg_grade . '-' . 'MPP';
        }
    } elseif ($ladNum == '50095018') {
        if ($averagescore >= 45) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 41) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 35) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 30) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore < 30) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        }
    } elseif ($ladNum == '50067205') {
        if ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 45) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 39) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 35) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore >= 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'MPP';
        }
    } elseif ($ladNum == '50082656') {
        if ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 45) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 39) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 35) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore >= 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'MPP';
        }
    } elseif ($ladNum == '50071397') {
        if ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 46) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 34) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore >= 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'MPP';
        }
    } elseif ($ladNum == '50081652') {
        if ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 46) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 43) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 36) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore >= 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'MPP';
        }
    } elseif ($ladNum == '50023214') {
        if ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'DDD';
        } elseif ($averagescore >= 46) {
            $mtg_grade = $mtg_grade . '-' . 'DDM';
        } elseif ($averagescore >= 43) {
            $mtg_grade = $mtg_grade . '-' . 'DMM';
        } elseif ($averagescore >= 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMM';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'MMP';
        }
    } elseif ($ladNum == '00285507') {
        //        echo 'function hit';
        if ($averagescore >= 58) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 55) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 47) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 42) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
        //        echo  'function mtg' . $mtg_grade;
    } elseif ($ladNum == '00255953') {
        if ($averagescore >= 58) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 55) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 47) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 42) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00260072') {
        if ($averagescore >= 58) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 55) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 47) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 42) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00285518') {
        if ($averagescore >= 57) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 54) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 44) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 37) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 37) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00285029') {
        if ($averagescore >= 58) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 54) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 44) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 38) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 38) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00255951') {
        if ($averagescore >= 56) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 45) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 39) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 34) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 34) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '10001542') {
        if ($averagescore >= 58) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 54) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 44) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 34) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 34) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00260032') {
        if ($averagescore >= 59) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 54) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 49) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 35) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 35) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00260031') {
        if ($averagescore >= 59) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 54) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 49) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 35) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 35) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00260079') {
        if ($averagescore >= 57) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 53) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 43) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 34) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 34) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00260081') {
        if ($averagescore >= 57) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 53) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 43) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 34) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 34) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00260093') {
        if ($averagescore >= 56) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 45) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 39) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 34) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 34) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00255990') {
        if ($averagescore >= 58) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 54) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 32) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 32) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00255993') {
        if ($averagescore >= 58) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 54) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 32) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 32) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00260000') {
        if ($averagescore >= 59) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 54) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 49) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 32) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 32) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00285508') {
        if ($averagescore >= 54) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 44) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 36) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 32) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 32) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '00260388') {
        if ($averagescore >= 59) {
            $mtg_grade = $mtg_grade . '-' . 'A*';
        } elseif ($averagescore >= 57) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 54) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 38) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 38) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '50023524') {
        if ($averagescore >= 55) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 43) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 43) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '50026574') {
        if ($averagescore >= 55) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 43) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 43) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '50025545') {
        if ($averagescore >= 55) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 43) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 43) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '10034110') {
        if ($averagescore >= 56) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 47) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 42) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '50022751') {
        if ($averagescore >= 55) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 49) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 45) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 39) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 39) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '50023263') {
        if ($averagescore >= 56) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 49) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 44) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 32) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 32) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '5002324X') {
        if ($averagescore >= 55) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 47) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 43) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 43) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '50026677') {
        if ($averagescore >= 53) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 47) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 42) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '50022672') {
        if ($averagescore >= 53) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 44) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 39) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 39) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '50026653') {
        if ($averagescore >= 54) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 48) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 42) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 32) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 32) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '50025764') {
        if ($averagescore >= 55) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 44) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 38) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 38) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '5002243X') {
        if ($averagescore >= 52) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 47) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 38) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 28) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 28) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '50023056') {
        if ($averagescore >= 55) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 50) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 44) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 37) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 37) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } elseif ($ladNum == '50019016') {
        if ($averagescore >= 51) {
            $mtg_grade = $mtg_grade . '-' . 'A';
        } elseif ($averagescore >= 44) {
            $mtg_grade = $mtg_grade . '-' . 'B';
        } elseif ($averagescore >= 37) {
            $mtg_grade = $mtg_grade . '-' . 'C';
        } elseif ($averagescore >= 26) {
            $mtg_grade = $mtg_grade . '-' . 'D';
        } elseif ($averagescore < 26) {
            $mtg_grade = $mtg_grade . '-' . 'E';
        }
    } else {
        //        echo ' no lad match we need to look elsewhere ';

        //        echo $qualType . $level;
        if (($qualType == 'Other') && (($level == 'X') or ($level == '4'))) {
            //            echo 'mrg match';
            //            $mtg_grade = 'N/A';
        } elseif (($qualType == 'NVQ') && ($level == '4')) {
            //            echo 'NVQ 4 match';
            $mtg_grade = 'N/A';
        } elseif ($qualType == 'Non Council funded studies') {
            //            echo 'Non council';
            //            $mtg_grade = 'N/A';
        } elseif ($qualType == 'NVQ/GNVQ Key Skills Unit') {
            //            echo 'NVQ Key Skills';
            //            $mtg_grade = 'N/A';
        } elseif (($qualType == 'Award') && ($level == '1')) {
            //            echo 'award level 1';
            if ($averagescore >= 21) {
                $mtg_grade = $mtg_grade . '-' . 'P++';
            } elseif ($averagescore >= 16) {
                $mtg_grade = $mtg_grade . '-' . 'P+';
            } elseif ($averagescore < 15) {
                $mtg_grade = $mtg_grade . '-' . 'P';
            }

        } elseif (($qualType == 'Award') && ($level == '2')) {
            //            echo 'award level 2';
            if ($averagescore >= 38) {
                $mtg_grade = $mtg_grade . '-' . 'P++';
            } elseif ($averagescore >= 28) {
                $mtg_grade = $mtg_grade . '-' . 'P+';
            } elseif ($averagescore < 28) {
                $mtg_grade = $mtg_grade . '-' . 'P';
            }
        } elseif (($qualType == 'NVQ') && ($level == '3')) {
            //            echo 'NVQ level 3';
            if ($averagescore >= 40) {
                $mtg_grade = $mtg_grade . '-' . 'D';
            } elseif ($averagescore >= 30) {
                $mtg_grade = $mtg_grade . '-' . 'M';
            } elseif ($averagescore < 30) {
                $mtg_grade = $mtg_grade . '-' . 'P';
            }
        } elseif (($qualType == 'Diploma') && ($level == '1')) {
            //            echo 'Diploma level 1';
            if ($averagescore >= 21) {
                $mtg_grade = $mtg_grade . '-' . 'P++';
            } elseif ($averagescore >= 16) {
                $mtg_grade = $mtg_grade . '-' . 'P+';
            } elseif ($averagescore < 15) {
                $mtg_grade = $mtg_grade . '-' . 'P';
            }

        } elseif (($qualType == 'Diploma') && ($level == '2')) {
            //                        echo 'award level 2';
            if ($averagescore >= 38) {
                $mtg_grade = $mtg_grade . '-' . 'P++';
            } elseif ($averagescore >= 28) {
                $mtg_grade = $mtg_grade . '-' . 'P+';
            } elseif ($averagescore < 28) {
                $mtg_grade = $mtg_grade . '-' . 'P';
            }

        } elseif (($qualType == 'Diploma') && ($level == '3')) {
            //                        echo 'award level 2';
            if ($averagescore >= 45) {
                $mtg_grade = $mtg_grade . '-' . 'DD';
            } elseif ($averagescore >= 41) {
                $mtg_grade = $mtg_grade . '-' . 'DM';
            } elseif ($averagescore >= 33) {
                $mtg_grade = $mtg_grade . '-' . 'MM';
            } elseif ($averagescore >= 28) {
                $mtg_grade = $mtg_grade . '-' . 'PM';
            } elseif ($averagescore < 28) {
                $mtg_grade = $mtg_grade . '-' . 'PP';
            }


        } elseif (($qualType == 'Other') && ($level == 'E')) {
            if ($averagescore >= 2) {
                $mtg_grade = $mtg_grade . '-' . 'High';
            } elseif ($averagescore >= 1) {
                $mtg_grade = $mtg_grade . '-' . 'Medium';
            } elseif ($averagescore < 0) {
                $mtg_grade = $mtg_grade . '-' . 'Low';
            }
        } elseif ($qualType == 'HNC') {
            if ($averagescore >= 100) {
                $mtg_grade = $mtg_grade . '-' . 'D';
            } elseif ($averagescore >= 90) {
                $mtg_grade = $mtg_grade . '-' . 'M';
            } elseif ($averagescore < 90) {
                $mtg_grade = $mtg_grade . '-' . 'P';
            }
        } elseif ($qualType == 'HND') {
            if ($averagescore >= 100) {
                $mtg_grade = $mtg_grade . '-' . 'D';
            } elseif ($averagescore >= 90) {
                $mtg_grade = $mtg_grade . '-' . 'M';
            } elseif ($averagescore < 90) {
                $mtg_grade = $mtg_grade . '-' . 'P';
            }
        }

    }
    //    echo 'function end: ' . $mtg_grade;
    return $mtg_grade;
}

?>
