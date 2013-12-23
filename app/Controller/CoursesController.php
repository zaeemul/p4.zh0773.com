<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class CoursesController extends AppController
{

    public $helpers = array('Html', 'Form', 'Session');

    public function index()
    {
        $this->Course->recursive = 0;
        $this->set("courses", $this->Course->find('all'));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->Course->create();
            if ($this->Course->save($this->request->data)) {
                $this->Session->setFlash(__('Course has been successfully added.'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The course could not be saved. Please, try again.'), 'flash_fail');
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid course'));
        }

        $student = $this->Course->findById($id);
        if (!$student) {
            throw new NotFoundException(__('Invalid course'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Course->id = $id;
            if ($this->Course->save($this->request->data)) {
                $this->Session->setFlash(__('Course has been successfully updated.'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The course could not be updated. Please, try again.'), 'flash_fail');
        }

        if (!$this->request->data) {
            $this->request->data = $student;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Course->delete($id)) {
            $this->Session->setFlash(__('Course has been deleted successfully.'), 'flash_success');
            return $this->redirect(array('action' => 'index'));
        }
    }
}