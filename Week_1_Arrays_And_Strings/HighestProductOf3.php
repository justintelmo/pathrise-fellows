<?php

function highestProductOf3($arrayOfInts)
{
    if (count($arrayOfInts) < 3) {
        throw new Exception("Array not long enough");
    }
    
    $highest = max($arrayOfInts[0], $arrayOfInts[1]);
    $lowest = min($arrayOfInts[0], $arrayOfInts[1]);

    $highestProductOf2 = $arrayOfInts[0] * $arrayOfInts[1];

    // Keeping track of negative numbers e.g. [-10, -10, 3, 5] should be 300 (-10 * -10 * 3)
    $lowestProductOf2 = $arrayOfInts[0] * $arrayOfInts[1]; 
    
    // Should be kept track of in a rolling fashion as we iterate over $arrayOfInts
    $highestProductOf3 = $arrayOfInts[0] * $arrayOfInts[1] * $arrayOfInts[2];
    
    for ($i = 2; $i < count($arrayOfInts); $i++) {
        $curr = $arrayOfInts[$i];
        
        $highestProductOf3 = max(
            $highestProductOf3,
            $curr * $highestProductOf2,
            $curr * $lowestProductOf2
        );
        
        $highestProductOf2 = max(
            $highestProductOf2,
            $curr * $highest,
            $curr * $lowest
        );
        
        $lowestProductOf2 = min(
            $lowestProductOf2,
            $curr * $lowest,
            $curr * $highest
        );
        
        $highest = max($curr, $highest);
        $lowest = min($curr, $lowest);
    }
    
    return $highestProductOf3;
}


?>