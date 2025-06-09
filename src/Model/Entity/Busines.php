<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Busines Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 */
class Busines extends Entity
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
        'name' => true,
        'description' => true,
        'address' => true,
        'phone' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
    ];
}
