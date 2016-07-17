<?php
namespace App\Model\Table;

use App\Model\Entity\Faq;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Faqs Model
 *
 */
class FaqsTable extends Table
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

        $this->table('faqs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->allowEmpty('question_en');

        $validator
            ->allowEmpty('question_ara');

        $validator
            ->allowEmpty('answer_en');

        $validator
            ->allowEmpty('answer_ara');

        $validator
            ->allowEmpty('link');

        $validator
            ->integer('is_active')
            ->allowEmpty('is_active');

        return $validator;
    }
}
