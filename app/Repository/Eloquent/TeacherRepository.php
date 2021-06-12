<?php

namespace App\Repository\Eloquent;

use App\Models\Teacher;
use App\Repository\Interfaces\TeacherRepositoryInterface;

class TeacherRepository extends BaseRepository implements TeacherRepositoryInterface
{
    public function __construct(Teacher $teacher)
    {
        parent::__construct($teacher);
    }
}
