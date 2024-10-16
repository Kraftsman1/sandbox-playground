<?php

function areIsomorphic($a, $b) {
    // If the strings have different lengths, they cannot be isomorphic
    if (strlen($a) !== strlen($b)) {
        return false;
    }

    // Create two arrays to store character mappings from a to b and from b to a
    $mapAtoB = [];
    $mapBtoA = [];

    // Iterate through each character in the strings
    for ($i = 0; $i < strlen($a); $i++) {
        $charA = $a[$i];
        $charB = $b[$i];

        // Check if there's already a mapping from charA to charB
        if (isset($mapAtoB[$charA])) {
            // If the mapped character is not the same as charB, return false
            if ($mapAtoB[$charA] !== $charB) {
                return false;
            }
        } else {
            // Create the mapping from charA to charB
            $mapAtoB[$charA] = $charB;
        }

        // Similarly, check if there's a reverse mapping from charB to charA
        if (isset($mapBtoA[$charB])) {
            // If the mapped character is not the same as charA, return false
            if ($mapBtoA[$charB] !== $charA) {
                return false;
            }
        } else {
            // Create the mapping from charB to charA
            $mapBtoA[$charB] = $charA;
        }
    }

    // If we reach here, the strings are isomorphic
    return true;
}

// Example usage:
echo areIsomorphic('egg', 'add') ? 'True' : 'False'; // Output: True
echo "\n";
echo areIsomorphic('foo', 'bar') ? 'True' : 'False'; // Output: False
echo "\n";
echo areIsomorphic('paper', 'title') ? 'True' : 'False'; // Output: True


// split a given string into pairs of two characters. 
// If the string contains an odd number of characters then it should replace 
// the missing second character of the final pair with an underscore ('_').
function split_pairs($str) {
    // If the string length is odd, append an underscore
    if (strlen($str) % 2 != 0) {
        $str .= '_';
    }
    
    // Split the string into pairs of two characters
    return str_split($str, 2);
}

// Example usage:
print_r(split_pairs('abc'));  // Output: Array ( [0] => ab [1] => c_ )
print_r(split_pairs('abcd')); // Output: Array ( [0] => ab [1] => cd )



?>