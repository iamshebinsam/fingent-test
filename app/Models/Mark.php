<?php

namespace App\Models;

use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'term_id',
        'maths',
        'science',
        'history',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class);
    }

    public function getTotal(): int
    {
        return ($this->science) + ($this->history) + ($this->maths);
    }

    public function getCreatedAtAttribute(string $value): string
    {
        $date = new DateTime($value, new DateTimeZone('UTC'));

        return $date->format('M d, Y H:i A');
    }
}
