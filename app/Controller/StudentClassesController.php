<?php
App::uses('AppController', 'Controller');

class StudentClassesController extends AppController
{

    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('StudentClass', 'ClassesCourse', 'Course', 'Attendance','Grade');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->set('title_for_layout', "Classes");
    }

    public function index()
    {
        if (!$this->Session->check('User.id')) {
            return $this->redirect(array('controller' => 'users',
                'action' => 'index'));
        }
        $this->StudentClass->recursive = 0;
        $this->set("classes", $this->StudentClass->find('all'));
    }

    public function view($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid class'));
        }
        $this->StudentClass->recursive = 1;
        $class = $this->StudentClass->findById($id);
        if (!$class) {
            throw new NotFoundException(__('Invalid class'));
        }
        //var_dump($class);
        //exit;
        $this->set('class', $class);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->StudentClass->create();
            if ($this->StudentClass->save($this->request->data)) {
                $this->Session->setFlash(__('Class has been successfully added.'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The class could not be saved. Please, try again.'), 'flash_fail');
            }
        }
    }

    public function edit($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid class'));
        }

        $student = $this->StudentClass->findById($id);
        if (!$student) {
            throw new NotFoundException(__('Invalid class'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->StudentClass->id = $id;
            if ($this->StudentClass->save($this->request->data)) {
                $this->Session->setFlash(__('Class has been successfully updated.'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The class could not be updated. Please, try again.'), 'flash_fail');
        }

        if (!$this->request->data) {
            $this->request->data = $student;
        }
    }

    public function delete($id)
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->StudentClass->delete($id)) {
            $this->Session->setFlash(__('Class has been deleted successfully.'), 'flash_success');
            return $this->redirect(array('action' => 'index'));
        }
    }

    /*=========================================
    Mange Class courses , grades and attendance
    =========================================*/

    public function add_course($id = null)
    {
        if (!$id) {
            throw new MethodNotAllowedException();
        }

        if ($this->request->is('post')) {
            $data = $this->ClassesCourse->find('first',
                array("conditions" => "ClassesCourse.class_id = " . $this->request->data['ClassesCourse']['class_id'] . "
                                                                 and ClassesCourse.course_id = " . $this->request->data['ClassesCourse']['course_id']));
            if (!$data) {
                $this->ClassesCourse->create();
                if ($this->ClassesCourse->save($this->request->data)) {
                    $this->Session->setFlash(__('New course has been successfully added.'), 'flash_success');
                    return $this->redirect(array('action' => 'view', $id));
                } else {
                    $this->Session->setFlash(__('The course could not be added. Please, try again.'), 'flash_fail');
                }
            }
            else {
                $this->Session->setFlash(__('Oops! Selected course is already added to this class.'), 'flash_fail');
            }
        }
        $this->set(array('courses' => $this->Course->find('list'),
            'class' => $this->StudentClass->findById($id)));
    }

    public function delete_course($id, $class_id = null)
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->ClassesCourse->delete($id)) {
            $this->Session->setFlash(__('Course has been deleted successfully.'), 'flash_success');
            return $this->redirect(array('action' => 'view', $class_id));
        }
    }

    public function attendance($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid class'));
        }
        $this->StudentClass->recursive = 1;
        $class = $this->StudentClass->findById($id);
        if (!$class) {
            throw new NotFoundException(__('Invalid class'));
        }
        //save all records
        if($this->request->is('post'))
        {
            if ($this->Attendance->saveAll($this->request->data['Attendance'])) {
                $this->Session->setFlash(__('Attendance has been successfully marked.'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The attendance could not be added. Please, try again.'), 'flash_fail');
            }
        }
        $this->set('class', $class);
    }

    public function add_grades($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid class'));
        }
        $this->ClassesCourse->recursive = 2;
        $class = $this->ClassesCourse->findById($id);
        if (!$class) {
            throw new NotFoundException(__('Invalid class'));
        }
        //save all records
        if($this->request->is('post'))
        {
            unset($this->request->data['Grade']['total_marks']);
            if ($this->Grade->saveAll($this->request->data['Grade'])) {
                $this->Session->setFlash(__('Marks has been successfully added.'), 'flash_success');
                return $this->redirect(array('action' => 'view', $class['Class']['id']));
            } else {
                $this->Session->setFlash(__('The marks could not be added. Please, try again.'), 'flash_fail');
            }
        }
        $this->set('class', $class);
    }
}