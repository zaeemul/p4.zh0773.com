<?php
App::uses('AppModel', 'Model');
/**
 * Grade Model
 *
 * @property Student $Student
 * @property ClassesCourse $ClassesCourse
 */
class Grade extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'student_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'marks' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'total_marks' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ClassesCourse' => array(
			'className' => 'ClassesCourse',
			'foreignKey' => 'classes_course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
