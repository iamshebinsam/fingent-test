<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMarkRequest;
use App\Http\Requests\UpdateMarkRequest;
use App\Models\Mark;
use App\Repository\Interfaces\MarkRepositoryInterface;
use App\Repository\Interfaces\StudentRepositoryInterface;
use App\Repository\Interfaces\TermRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class MarkController extends Controller
{
    private MarkRepositoryInterface $markRepository;

    private StudentRepositoryInterface $studentRepository;

    private TermRepositoryInterface $termRepository;

    public function __construct(
        MarkRepositoryInterface $markRepository,
        StudentRepositoryInterface $studentRepository,
        TermRepositoryInterface $termRepository
    ) {
        $this->markRepository = $markRepository;
        $this->studentRepository = $studentRepository;
        $this->termRepository = $termRepository;
    }

    public function index(): View
    {
        $marks = $this->markRepository->paginate(10);

        return view('mark.index', [
            'marks' => $marks,
        ]);
    }

    public function create(): View
    {
        $students = $this->studentRepository->all();
        $terms = $this->termRepository->all();

        return view('mark.create', [
            'students' => $students,
            'terms' =>$terms,
        ]);
    }

    public function store(CreateMarkRequest $createMarkRequest)
    {
        $this->markRepository->create($createMarkRequest->validated());
        Session::flash('message', 'Mark Record Created successfully');

        return redirect('mark');
    }

    public function edit(Mark $mark): View
    {
        $students = $this->studentRepository->all();
        $terms = $this->termRepository->all();

        return view('mark.edit', [
            'mark' => $mark,
            'students' => $students,
            'terms' =>$terms,
        ]);
    }

    public function update(
        UpdateMarkRequest $updateMarkRequest,
        Mark $mark
    ): Response {
        $this->markRepository->update($mark, $updateMarkRequest->validated());
        Session::flash('message', 'Mark Record Updated successfully');

        return redirect('mark');
    }

    public function destroy(Mark $mark): Response
    {
        try {
            $this->markRepository->delete($mark);
            Session::flash('message', 'Mark Deleted successfully');
        } catch (Throwable $exception) {
            Session::flash('message', 'Error!!'.$exception->getMessage());
        }

        return redirect('mark');
    }
}
