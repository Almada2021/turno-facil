<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $business_id
 * @property string $name
 * @property string|null $description
 * @property string $price
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $photo_url
 *
 * @property \App\Model\Entity\Busines $business
 */
class Product extends Entity
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
        'business_id' => true,
        'name' => true,
        'description' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
        'photo_url' => true,
        'business' => true,
    ];
}
