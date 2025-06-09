<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserBusiness Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\BusinessTable&\Cake\ORM\Association\BelongsTo $Businesses
 *
 * @method \App\Model\Entity\UserBusines newEmptyEntity()
 * @method \App\Model\Entity\UserBusines newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\UserBusines> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserBusines get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\UserBusines findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\UserBusines patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\UserBusines> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserBusines|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\UserBusines saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\UserBusines>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UserBusines>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UserBusines>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UserBusines> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UserBusines>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UserBusines>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UserBusines>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UserBusines> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserBusinessTable extends Table
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

        $this->setTable('user_business');
        $this->setDisplayField('role');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Businesses', [
            'foreignKey' => 'business_id',
            'className' => 'Business',
            'joinType' => 'INNER',
        ]);
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('business_id')
            ->notEmptyString('business_id');

        $validator
            ->scalar('role')
            ->notEmptyString('role');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['user_id', 'business_id']), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['business_id'], 'Businesses'), ['errorField' => 'business_id']);

        return $rules;
    }
}
