<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmissionRequest extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'manuscript_path',
        'notes'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Alias para la relación user, para acceder como "author"
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Obtiene los árbitros asignados a esta solicitud
     */
    public function arbitrators()
    {
        return $this->belongsToMany(User::class, 'submission_arbitrator', 'submission_request_id', 'user_id');
    }
}
