<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Business Model
 *
 * @method \App\Model\Entity\Busines newEmptyEntity()
 * @method \App\Model\Entity\Busines newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Busines> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Busines get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Busines findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Busines patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Busines> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Busines|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Busines saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Busines>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Busines>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Busines>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Busines> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Busines>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Busines>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Busines>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Busines> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BusinessTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('business');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->hasMany('UserBusiness', [
            'foreignKey' => 'business_id',
            'dependent' => true,
        ]);
        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 30)
            ->allowEmptyString('phone');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        return $validator;
    }
}
