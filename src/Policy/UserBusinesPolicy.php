<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\UserBusines;
use Authorization\IdentityInterface;

/**
 * UserBusines policy
 */
class UserBusinesPolicy
{
    /**
     * Check if $user can add UserBusines
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserBusines $userBusines
     * @return bool
     */
    public function canAdd(IdentityInterface $user, UserBusines $userBusines)
    {
    }

    /**
     * Check if $user can edit UserBusines
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserBusines $userBusines
     * @return bool
     */
    public function canEdit(IdentityInterface $user, UserBusines $userBusines)
    {
    }

    /**
     * Check if $user can delete UserBusines
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserBusines $userBusines
     * @return bool
     */
    public function canDelete(IdentityInterface $user, UserBusines $userBusines)
    {
    }

    /**
     * Check if $user can view UserBusines
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\UserBusines $userBusines
     * @return bool
     */
    public function canView(IdentityInterface $user, UserBusines $userBusines)
    {
    }
}
