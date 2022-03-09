<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [

        'student_classes_id',
        'subjects_id',
        'teachers_id',
        'users_id',
        'topic',
        'stream',
        'scheme',
        'course_outline',
        'learning_objectives',
        'knowledge',
        'relevant',
        'dressing',
        'assignments',
        'notes',
        'class_control',
        'evaluation',
        'feedback',
        'praised',
        'poor_behaviour',
        'learner_engagement',
        'time_utilisation',
        'caie_demands',
        'comment',

    ];

    /**
     * Get the user that owns the Lesson
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    /**
     * Get the teacher that owns the Lesson
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teachers_id', 'id');
    }

    /**
     * Get the studentClass that owns the Lesson
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class, 'student_classes_id', 'id');
    }

    /**
     * Get the subject that owns the Lesson
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjects_id', 'id');
    }

    static function weight($value)
    {
        if ($value == 1) {
            return "Below Average";
        }elseif ($value == 2) {
            return "Satisfactory";
        }elseif ($value == 3) {
            return "Good";
        }elseif ($value == 4) {
            return "Very Good";
        }elseif ($value == 5) {
            return "Excellent";
        }else {
            return "Value not correct";
        }
    }
}
