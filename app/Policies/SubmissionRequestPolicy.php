<?php

namespace App\Policies;

use App\Models\SubmissionRequest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubmissionRequestPolicy
{
    use HandlesAuthorization;

    public function view(User $user, SubmissionRequest $submission)
    {
        return $user->id === $submission->user_id;
    }

    public function delete(User $user, SubmissionRequest $submission)
    {
        return $user->id === $submission->user_id && $submission->status === 'pendiente';
    }
}
