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


// create a function to assign tasks based on who has the least amount of tasks
function assignTasksToPeople(&$people, &$tasks) {
    foreach ($tasks as &$task) {
        // Find the person with the least amount of tasks
        $person = array_reduce($people, function ($prev, $curr) {
            return $prev['tasks'] < $curr['tasks'] ? $prev : $curr;
        });

        // Assign the task to the person and increment their task count
        foreach ($people as &$p) {
            if ($p['name'] == $person['name']) {
                $p['tasks']++;
                break;
            }
        }
        
        // Assign the person's name to the task
        $task['person'] = $person['name'];
    }
}

// Sample data
$people = [
    ['name' => 'Asmawu', 'tasks' => 3],
    ['name' => 'Charles', 'tasks' => 5],
    ['name' => 'Readdah', 'tasks' => 4]
];

$tasks = [
    ['name' => 'task 1'],
    ['name' => 'task 2']
];

// Call the function
assignTasksToPeople($people, $tasks);

// Output the result
print_r($people);
print_r($tasks);



?>
