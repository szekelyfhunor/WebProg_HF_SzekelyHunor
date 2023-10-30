<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:40 PM
 */

/**
 * Class Student
 */
class Student
{
    private $grades = [];
    private string $name;
    private string $studentNumber;

    // TODO Generate constructor with both arguments.
    function __construct(string $name, string $studentNumber)
    {
        $this->setName($name);
        $this->setStudentNumber($studentNumber);
    }
    // TODO Generate getters and setters for both arguments

    public function addGrade($subjectCode, $grade)
    {
        $this->grades[$subjectCode] = $grade;
    }

    public function getGrades()
    {
        return $this->grades;
    }

    public function setGrade(Subject $subject, $grade) {
        $this->addGrade($subject->getCode(), $grade);
    }

    public function getAvgGrade() {
        if (count($this->grades) === 0) {
            return 0;
        }

        $sum = array_sum($this->grades);
        $count = count($this->grades);

        return $sum / $count;
    }

    public function printGrades() {
        foreach ($this->grades as $subjectCode => $grade) {
            echo Subject::getSubjectName($subjectCode) . " - " . $grade . "<br>";
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $studentNumber
     */
    public function setStudentNumber(string $studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }
}
