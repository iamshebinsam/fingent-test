<?php
namespace App\Repository\Eloquent;

use App\Models\Mark;
use App\Repository\Interfaces\MarkRepositoryInterface;

class MarkRepository extends BaseRepository implements MarkRepositoryInterface
{
    public function __construct(Mark $mark)
    {
        parent::__construct($mark);
    }
}
