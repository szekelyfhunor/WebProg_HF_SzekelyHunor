<?php

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";



// University példány létrehozása
$university = new University();

// Tantárgyak hozzáadása
$subject1 = $university->addSubject("MAT101", "Mathematics");
$subject2 = $university->addSubject("ENG101", "English");

// Diákok hozzáadása a tantárgyakhoz
$subject1->addStudent("John Doe", "S12345");
$subject1->addStudent("Jane Doe", "S12346");
$subject2->addStudent("James Smith", "S12347");



// Tantárgyak és hozzájuk tartozó hallgatók kiírása
$university->print();

// Hallgató törlése a tantárgyból
$studentToDelete = new Student("Jane Doe", "S12346");
$success = $subject1->deleteStudent($studentToDelete);

if ($success) {
    echo "A hallgató sikeresen törölve a tantárgyból.";
} else {
    echo "A hallgató nem található a tantárgyon belül.";
}

echo ""."<br>";

try {
    // Tantárgy törlése
    $university->deleteSubject($subject1);
    echo "A tantárgy sikeresen törölve.";
} catch (Exception $e) {
    echo "Hiba történt: " . $e->getMessage().'<br>';
}

// Újra kiírjuk a tantárgyakat a módosítások után
$university->print();


// Diákok hozzáadása a tantárgyakhoz
$student1 = $subject1->addStudent("John Doe", "S12345");
$student2 = $subject1->addStudent("Jane Doe", "S12346");
$student3 = $subject2->addStudent("James Smith", "S12347");

// Jegyek hozzáadása a diákokhoz
$student1->addGrade("MAT101", 6);
$student1->addGrade("ENG101", 8.5);
$student2->addGrade("MAT101", 7.3);
$student2->addGrade("ENG101", 9);

// Tantárgyak és hozzájuk tartozó hallgatók kiírása
$university->print();

foreach ($university->subjects as $subject) {
    foreach ($subject->getStudents() as $student) {
        echo $student->getName() . "'s grades: " . implode(", ", $student->getGrades()) . "<br>";
        echo "Average grade: " . $student->getAvgGrade() . "<br>";
        echo "Individual grades:<br>";
        $student->printGrades();
        echo "<br>";
    }
}


