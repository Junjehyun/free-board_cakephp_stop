<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TeamRecords Model
 *
 * @property \App\Model\Table\YearsTable&\Cake\ORM\Association\BelongsTo $Years
 *
 * @method \App\Model\Entity\TeamRecord newEmptyEntity()
 * @method \App\Model\Entity\TeamRecord newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TeamRecord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TeamRecord get($primaryKey, $options = [])
 * @method \App\Model\Entity\TeamRecord findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TeamRecord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TeamRecord[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TeamRecord|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TeamRecord saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TeamRecord[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TeamRecord[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TeamRecord[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TeamRecord[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TeamRecordsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('team_records');
        $this->setDisplayField('team_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Years', [
            'foreignKey' => 'year_id',
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
            ->integer('year_id')
            ->notEmptyString('year_id');

        $validator
            ->integer('ranking')
            ->requirePresence('ranking', 'create')
            ->notEmptyString('ranking');

        $validator
            ->scalar('team_name')
            ->maxLength('team_name', 255)
            ->requirePresence('team_name', 'create')
            ->notEmptyString('team_name');

        $validator
            ->integer('games_played')
            ->requirePresence('games_played', 'create')
            ->notEmptyString('games_played');

        $validator
            ->integer('wins')
            ->requirePresence('wins', 'create')
            ->notEmptyString('wins');

        $validator
            ->integer('losses')
            ->requirePresence('losses', 'create')
            ->notEmptyString('losses');

        $validator
            ->integer('draws')
            ->notEmptyString('draws');

        $validator
            ->decimal('win_rate')
            ->requirePresence('win_rate', 'create')
            ->notEmptyString('win_rate');

        $validator
            ->decimal('game_diff')
            ->requirePresence('game_diff', 'create')
            ->notEmptyString('game_diff');

        $validator
            ->scalar('last_10_games')
            ->maxLength('last_10_games', 20)
            ->requirePresence('last_10_games', 'create')
            ->notEmptyString('last_10_games');

        $validator
            ->scalar('streak')
            ->maxLength('streak', 10)
            ->requirePresence('streak', 'create')
            ->notEmptyString('streak');

        $validator
            ->scalar('home_record')
            ->maxLength('home_record', 20)
            ->requirePresence('home_record', 'create')
            ->notEmptyString('home_record');

        $validator
            ->scalar('away_record')
            ->maxLength('away_record', 20)
            ->requirePresence('away_record', 'create')
            ->notEmptyString('away_record');

        $validator
            ->scalar('league')
            ->maxLength('league', 10)
            ->allowEmptyString('league'); // 필수값을 허용하지 않도록 변경

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    // public function buildRules(RulesChecker $rules): RulesChecker
    // {
    //     $rules->add($rules->existsIn('year_id', 'Years'), ['errorField' => 'year_id']);

    //     return $rules;
    // }
}
