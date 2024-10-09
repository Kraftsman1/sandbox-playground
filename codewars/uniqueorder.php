<!-- Implement the function unique_in_order which takes as argument a sequence and returns a 
list of items without any elements with the same value next to each other and preserving 
the original order of elements in php 

For example:

uniqueInOrder('AAAABBBCCDAABBB') == ['A', 'B', 'C', 'D', 'A', 'B']
uniqueInOrder('ABBCcAD')         == ['A', 'B', 'C', 'c', 'A', 'D']
uniqueInOrder([1,2,2,3,3])       == [1,2,3] -->

<?php
function uniqueInOrder($sequence) {
    // Initialize an empty array to store the result
    $result = [];

    // Convert the sequence into an array if it's a string
    if (is_string($sequence)) {
        $sequence = str_split($sequence);
    }

    // Iterate over the sequence
    foreach ($sequence as $key => $item) {
        // If it's the first item or the item is different from the previous one, add it to the result
        if ($key == 0 || $item !== $sequence[$key - 1]) {
            $result[] = $item;
        }
    }

    return $result;
}

// Test cases
print_r(uniqueInOrder('AAAABBBCCDAABBB'));  // ['A', 'B', 'C', 'D', 'A', 'B']
print_r(uniqueInOrder('ABBCcAD'));          // ['A', 'B', 'C', 'c', 'A', 'D']
print_r(uniqueInOrder([1, 2, 2, 3, 3]));    // [1, 2, 3]


// Problem: `most_occurrence` is a program that takes a word and returns the character (also known as letter) 
// that appears the most in the word.
function most_occurence($word) {
    $word = str_split($word);
    $count = array_count_values($word);
    $max = max($count);

    $result = [];
    foreach ($count as $char => $freq) {
        if ($freq === $max) {
            $result[] = [$char, $freq];
        }
    }

    return $result;
}
?>
