<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmissionReview extends Model
{
    protected $fillable = [
        'submission_request_id',
        'user_id',
        'comments',
        'document_path',
        'status'
    ];

    /**
     * Obtiene la solicitud a la que pertenece esta revisión
     */
    public function submission(): BelongsTo
    {
        return $this->belongsTo(SubmissionRequest::class, 'submission_request_id');
    }

    /**
     * Obtiene el árbitro que realizó esta revisión
     */
    public function arbitrator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
