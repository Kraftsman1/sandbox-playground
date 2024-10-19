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

// identify duplicate objects from an array based on specific
// properties (defined in the keys array).
// The function should return an array of duplicate objects.
function find_duplicates($objs, $keys) {
    $seen = [];
    $duplicates = [];

    foreach ($objs as $obj) {
        // Build a composite key based on the properties defined in $keys
        $composite_key = '';
        foreach ($keys as $key) {
            if (isset($obj[$key])) {
                $composite_key .= $obj[$key] . '-';
            }
        }

        // If the composite key has been seen before, it is a duplicate
        if (isset($seen[$composite_key])) {
            $duplicates[] = $obj;
        } else {
            $seen[$composite_key] = true;
        }
    }

    return $duplicates;
}

// Example usage:
$objs = [
    ['name' => 'John', 'age' => 25, 'city' => 'New York'],
    ['name' => 'Jane', 'age' => 30, 'city' => 'Los Angeles'],
    ['name' => 'John', 'age' => 25, 'city' => 'New York'],
    ['name' => 'Doe', 'age' => 25, 'city' => 'New York']
];

$keys = ['name', 'age'];

print_r(find_duplicates($objs, $keys));

// Given an array of integers, return the indices of the two numbers that add up to a specific target.
// Input: [2, 7, 11, 15], target = 9
// Output: [0, 1]
function twoSum($nums, $target) {
    $map = [];
    
    for ($i = 0; $i < count($nums); $i++) {
        $complement = $target - $nums[$i];
        if (isset($map[$complement])) {
            return [$map[$complement], $i];
        }
        $map[$nums[$i]] = $i;
    }
    
    return [];
}

// Example usage:
$nums = [2, 7, 11, 15];
$target = 9;
print_r(twoSum($nums, $target));

// Write a function that checks if a given string is a palindrome.
// Input: "racecar"
// Output: true
function isPalindrome($str) {
    $str = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $str));  // Remove non-alphanumeric characters and make lowercase
    return $str === strrev($str);
}

// Example usage:
$str = "Racecar";
echo isPalindrome($str) ? "true" : "false";  // Output: true

// Write a function to return the nth Fibonacci number.
// Input: 6
// Output: 8
function fibonacci($n) {
    if ($n <= 1) {
        return $n;
    }
    
    $a = 0;
    $b = 1;
    
    for ($i = 2; $i <= $n; $i++) {
        $temp = $a + $b;
        $a = $b;
        $b = $temp;
    }
    
    return $b;
}

// Example usage:
$n = 6;
echo fibonacci($n);  // Output: 8

// Write a function that merges two sorted arrays into one sorted array.
// Input: [1, 3, 5], [2, 4, 6]
// Output: [1, 2, 3, 4, 5, 6]
function mergeSortedArrays($arr1, $arr2) {
    $i = 0;
    $j = 0;
    $result = [];
    
    while ($i < count($arr1) && $j < count($arr2)) {
        if ($arr1[$i] < $arr2[$j]) {
            $result[] = $arr1[$i];
            $i++;
        } else {
            $result[] = $arr2[$j];
            $j++;
        }
    }
    
    while ($i < count($arr1)) {
        $result[] = $arr1[$i];
        $i++;
    }
    
    while ($j < count($arr2)) {
        $result[] = $arr2[$j];
        $j++;
    }
    
    return $result;
}

// Example usage:
$arr1 = [1, 3, 5];
$arr2 = [2, 4, 6];
print_r(mergeSortedArrays($arr1, $arr2));

// Given a string containing just the characters (, ), {, }, [, and ], determine if the input string is valid.
// A valid string must follow these rules:
// Open brackets must be closed by the same type of brackets.
// Open brackets must be closed in the correct order.
// Input: "()[]{}"
// Output: true
function isValid($s) {
    $stack = [];
    $map = ['(' => ')', '{' => '}', '[' => ']'];
    
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if (isset($map[$char])) {
            array_push($stack, $char);
        } else {
            if (empty($stack) || $map[array_pop($stack)] !== $char) {
                return false;
            }
        }
    }
    
    return empty($stack);
}

// Example usage:
$s = "()[]{}";
echo isValid($s) ? "true" : "false";  // Output: true



?>