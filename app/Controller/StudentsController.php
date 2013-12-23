<?php

App::uses('AppController', 'Controller');

class StudentsController extends AppController
{

    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array("StudentClass", 'Student','Grade');

    public function index()
    {
        $this->Student->recursive = 1;
        $this->set("students", $this->Student->find('all'));
    }

    public function view($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid student'));
        }
        $this->Student->recursive = 2;
        $student = $this->Student->findById($id);
        //fetch grades
        $this->Grade->recursive = 2;
        $grades = $this->Grade->find('all',
                    array('conditions'=> 'Grade.student_id = '.$student['Student']['id']));

        if (!$student) {
            throw new NotFoundException(__('Invalid class'));
        }
        $this->set(array('student'=> $student, 'grades'=> $grades));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->Student->create();
            if ($this->Student->save($this->request->data)) {
                $this->Session->setFlash(__('Student details have been successfully added.'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The student could not be saved. Please, try again.'), 'flash_fail');
            }
        }
        $this->set('classes', $this->StudentClass->find('list'));
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid student'));
        }

        $student = $this->Student->findById($id);
        if (!$student) {
            throw new NotFoundException(__('Invalid student'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Student->id = $id;
            if ($this->Student->save($this->request->data)) {
                $this->Session->setFlash(__('Student data has been successfully updated.'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The student could not be updated. Please, try again.'), 'flash_fail');
        }

        if (!$this->request->data) {
            $this->request->data = $student;
        }
        $this->set('classes', $this->StudentClass->find('list'));
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Student->delete($id)) {
            $this->Session->setFlash(__('Student has been deleted successfully.'), 'flash_success');
            return $this->redirect(array('action' => 'index'));
        }
    }
}