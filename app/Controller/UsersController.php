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
class UsersController extends AppController
{

    public $helpers = array('Html', 'Form', 'Session');

    public function index()
    {
        if ($this->request->is('post')) {
            $username = $this->request->data['User']['username'];
            $password = $this->request->data['User']['password'];

            $data = $this->User->find('all', array(
                'conditions' => "User.username= '".$username."' and User.password='".$password."' LIMIT 1"
            ));
            if ($data) {
                $this->Session->write('User.id', $data[0]['User']['id']);
                return $this->redirect(array('controller' => 'student_classes',
                    'action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('Invalid username or password, try again'), 'flash_fail');
            }
        }
    }

    public function logout()
    {
        $this->Session->destroy();
        return $this->redirect(array('controller' => 'users',
                                      'action' => 'index'));
    }

    //user registration

    public function register()
    {
        $this->set('title_for_layout', 'Register');
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('You have been successfully registered.
                Please logged in to continue.'), 'flash_success');
                return $this->redirect(array('action' => 'register'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_fail');
            }
        }
    }
}