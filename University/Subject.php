<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:16 PM
 */

/**
 * Class Subject
 */
class Subject
{
    private string  $code;
    private string $name;
    /**
     * @var Student[]
     */
    private array $students = [] ;

    // TODO Generate getters and setters

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getStudents(): array
    {
        return $this->students;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    // TODO Generate constructor for all attributes. $students argument of the constructor can be empty
    function __construct(string $code, string $name, array $students=[]){
        $this->setCode($code);
        $this->setName($name);
        $this->students = $students;
    }

    //ToDo
    /**
     * Method accepts student name and number, creates instance of the Student class, adds inside $students array
     * and returns created instance
     *
     * @param string $name
     * @param string $studentNumber
     * @return \Student
     */
    public function addStudent(string $name, string $studentNumber): Student
    {
        if (!$this->isStudentExists($studentNumber)){
            $student = new Student($name, $studentNumber);
            $this->students[] = $student;
            return $student;
        } else {
            throw new Exception("Student not exists");
        }
    }

    // ToDo
    private function isStudentExists(string $studentNumber): bool
    {
        $trueorfalse = 0;
        foreach ($this->students as $student){
            if ($student->getStudentNumber() == $studentNumber){
                $trueorfalse = 1;
            }
        }
        return $trueorfalse;
    }

    function __toString(): string
    {
        return "$this->code : $this->name";
    }

    public function deleteStudent(Student $student): bool
    {
        $studentNumber = $student->getStudentNumber();
        foreach ($this->students as $key => $existingStudent) {
            if ($existingStudent->getStudentNumber() == $studentNumber) {
                unset($this->students[$key]);
                return true;
            }
        }
        return false;
    }


}
