<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserBusines Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $business_id
 * @property string $role
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Busines $business
 */
class UserBusines extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'user_id' => true,
        'business_id' => true,
        'role' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'business' => true,
    ];
}
