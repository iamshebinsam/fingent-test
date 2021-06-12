<?php
namespace App\Repository\Eloquent;

use App\Models\Student;
use App\Repository\Interfaces\StudentRepositoryInterface;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    public function __construct(Student $student)
    {
        parent::__construct($student);
    }
}
