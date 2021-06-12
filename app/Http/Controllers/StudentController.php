<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Repository\Interfaces\StudentRepositoryInterface;
use App\Repository\Interfaces\TeacherRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class StudentController extends Controller
{
    private StudentRepositoryInterface $studentRepository;

    private TeacherRepositoryInterface $teacherRepository;

    public function __construct(
        StudentRepositoryInterface $studentRepository,
        TeacherRepositoryInterface $teacherRepository
    ) {
        $this->studentRepository = $studentRepository;
        $this->teacherRepository = $teacherRepository;
    }

    public function index(): View
    {
        $students = $this->studentRepository->paginate(10);

        return view('student.index', [
            'students' => $students,
        ]);
    }

    public function create(): View
    {
        $teachers = $this->teacherRepository->all();

        return view('student.create', [
            'teachers' => $teachers,
        ]);
    }

    public function store(CreateStudentRequest $createStudentRequest): Response
    {
        $this->studentRepository->create($createStudentRequest->validated());
        Session::flash('message', 'Student Record Created successfully');

        return redirect('student');
    }

    public function edit(Student $student): View
    {
        $teachers = $this->teacherRepository->all();

        return view('student.edit', [
            'student' => $student,
            'teachers' => $teachers,
        ]);
    }

    public function update(
        UpdateStudentRequest $updateStudentRequest,
        Student $student
    ): Response {
        $this->studentRepository->update($student, $updateStudentRequest->validated());
        Session::flash('message', 'Student Record Updated successfully');

        return redirect('student');
    }

    public function destroy(Student $student): Response
    {
        try {
            $this->studentRepository->delete($student);
            Session::flash('message', 'Student Record Deleted successfully');
        } catch (Throwable $exception) {
            Session::flash('message', 'Error!! '.$exception->getMessage());
        }

        return redirect('student');
    }
}
