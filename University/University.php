<?php
require_once "AbstractUniversity.php";

class University extends AbstractUniversity
{
    // TODO Implement all the methods declared in parent
    public function addSubject(string $code, string $name): Subject
    {
        if (!$this->isSubjectExists($code)){
            $subject = new Subject($code, $name);
            $this->subjects[] = $subject;
            return $subject;
        } else {
            throw new Exception("Subject not exists");
        }
    }

    function isSubjectExists(string $code):bool{
        $trueorfalse = 0;
        foreach ($this->subjects as $subject){
            if ($subject->getCode() == $code){
                $trueorfalse = 1;
            }
        }
        return $trueorfalse;
    }

    public function addStudentOnSubject(string $subjectCode, Student $student): void
    {
        if (isset($this->subjects[$subjectCode])) {
            $this->subjects[$subjectCode]->addStudent($student);
        }
    }

    public function getStudentsForSubject(string $subjectCode)
    {
        if (isset($this->subjects[$subjectCode])) {
            return $this->subjects[$subjectCode]->getStudents();
        }
        return [];
    }

    public function getNumberOfStudents(): int
    {
        $totalStudents = 0;
        foreach ($this->subjects as $subject) {
            $totalStudents += count($subject->getStudents());
        }
        return $totalStudents;
    }

    public function print()
    {
        foreach ($this->subjects as $subject) {
            echo str_repeat('-', 25) . '<br>';
            echo $subject->getName() . '<br>';
            echo str_repeat('-', 25) . '<br>';
            foreach ($subject->getStudents() as $student) {
                echo $student->getName() . ' - ' . $student->getStudentNumber() . '<br>';
            }
        }
    }


    public function deleteSubject(Subject $subject): void
    {
        $subjectCode = $subject->getCode();

        if ($this->isSubjectAssigned($subjectCode)) {
            throw new Exception("A tantárgyhoz még hallgató van rendelve, nem lehet törölni.");
        }

        foreach ($this->subjects as $key => $existingSubject) {
            if ($existingSubject->getCode() == $subjectCode) {
                unset($this->subjects[$key]);
                break;
            }
        }
    }

    private function isSubjectAssigned(string $subjectCode): bool
    {
        foreach ($this->subjects as $existingSubject) {
            if ($existingSubject->getCode() == $subjectCode && !empty($existingSubject->getStudents())) {
                return true;
            }
        }
        return false;
    }
}
