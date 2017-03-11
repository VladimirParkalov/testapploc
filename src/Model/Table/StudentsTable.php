<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Database\Schema\Table as Schema;

/**
 * Students Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Courses
 *
 * @method \App\Model\Entity\Student get($primaryKey, $options = [])
 * @method \App\Model\Entity\Student newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Student[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student findOrCreate($search, callable $callback = null, $options = [])
 */
class StudentsTable extends Table
{

//    public $encryptedFields = array('first_name', 'last_name');
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('students');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Courses', [
            'foreignKey' => 'student_id',
            'targetForeignKey' => 'course_id',
            'joinTable' => 'students_courses'
        ]);
    }

    protected function _initializeSchema(Schema $table)
    {
        $table->columnType('first_name', 'cipher');
        $table->columnType('last_name', 'cipher');
        return $table;
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        return $validator;
    }

//    public function beforeSave($event, $entity, $options)
//    {
////        pr($this->students);
//        foreach($this->encryptedFields as $fieldName)
//        {
//            if(!empty($this->data[$entity->students][$fieldName]))
//            {
//                $this->data[$entity->students][$fieldName] = Security::rijndael(
//                    $this->data[$entity->students][$fieldName], Configure::read('Security.key'), 'encrypt'
//                );
//            }
//        }
//        return true;
//    }
//
//    public function afterFind($event, $entity, $options)
//    {
//        foreach($this->encryptedFields as $fieldName)
//        {
//            if(!empty($results[$this->students][$fieldName]))
//            {
//                $results[$this->students][$fieldName] = Security::rijndael(
//                    $results[$this->students][$fieldName], Configure::read('Security.key'), 'decrypt'
//                );
//            }
//        }
//        return $results;
//    }
}
