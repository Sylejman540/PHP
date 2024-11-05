<?php
// Multidimensional associative array
$departments = array(
    'IT' => array(
        array(
            'name' => 'Alice',
            'age' => 28,
            'position' => 'Developer'
        ),
        array(
            'name' => 'Bob',
            'age' => 34,
            'position' => 'System Analyst'
        )
    ),
    'HR' => array(
        array(
            'name' => 'Cathy',
            'age' => 29,
            'position' => 'HR Manager'
        ),
        array(
            'name' => 'David',
            'age' => 31,
            'position' => 'Recruiter'
        )
    ),
    'Sales' => array(
        array(
            'name' => 'Eve',
            'age' => 27,
            'position' => 'Sales Executive'
        ),
        array(
            'name' => 'Frank',
            'age' => 45,
            'position' => 'Sales Manager'
        )
    )
);

// Using nested loops to iterate through the array
foreach ($departments as $department => $employees) {
    echo "Department: $department<br>";
    foreach ($employees as $employee) {
        echo "Name: " . $employee['name'] . ", Age: " . $employee['age'] . ", Position: " . $employee['position'] . "<br>";
    }
    echo "<br>"; // Add a line break for readability between departments
}
?>
