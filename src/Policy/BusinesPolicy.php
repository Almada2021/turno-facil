<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Busines;
use Authorization\IdentityInterface;

/**
 * Busines policy
 */
class BusinesPolicy
{
    /**
     * Check if $user can add Busines
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Busines $busines
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Busines $busines) {}

    /**
     * Check if $user can edit Busines
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Busines $busines
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Busines $busines) {}

    /**
     * Check if $user can delete Busines
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Busines $busines
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Busines $busines)
    {
        // Verificar si el usuario tiene el rol de 'owner' para este negocio
        foreach ($busines->user_business as $relation) {
            if ($relation->user_id === $user->id && $relation->role === 'owner') {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if $user can view Busines
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Busines $busines
     * @return bool
     */
    public function canView(IdentityInterface $user, Busines $busines)
    {
        return true;
    }
}
