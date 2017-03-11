<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Teachers Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Courses
 *
 * @method \App\Model\Entity\Teacher get($primaryKey, $options = [])
 * @method \App\Model\Entity\Teacher newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Teacher[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Teacher|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Teacher patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Teacher[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Teacher findOrCreate($search, callable $callback = null, $options = [])
 */
class TeachersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('teachers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Courses', [
            'foreignKey' => 'teacher_id',
            'targetForeignKey' => 'course_id',
            'joinTable' => 'teachers_courses'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('teacher_name')
            ->add('teacher_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['teacher_name']));

        return $rules;
    }
}
