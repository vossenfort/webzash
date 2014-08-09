<?php
/**
 * The MIT License (MIT)
 *
 * Webzash - Easy to use web based double entry accounting software
 *
 * Copyright (c) 2014 Prashant Shah <pshah.mumbai@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

App::uses('WebzashAppController', 'Webzash.Controller');
App::uses('ConnectionManager', 'Model');

/**
 * Webzash Plugin Wzsettings Controller
 *
 * @package Webzash
 * @subpackage Webzash.controllers
 */
class WzsettingsController extends WebzashAppController {

	var $layout = 'admin';

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->redirect(array('controller' => 'wzsettings', 'action' => 'edit'));
	}

/**
 * edit method
 *
 * @return void
 */
	public function edit() {

		$this->set('title_for_layout', __d('webzash', 'Edit General Settings'));

		$this->Wzsetting->useDbConfig = 'wz';

		$wzsetting = $this->Wzsetting->findById(1);

		/* on POST */
		if ($this->request->is('post') || $this->request->is('put')) {
			/* Set settings id */
			unset($this->request->data['Wzsetting']['id']);

			/* Save settings */
			$ds = $this->Wzsetting->getDataSource();
			$ds->begin();

			if (!$wzsetting) {
				$this->Wzsetting->create();
				$this->request->data['Wzsetting']['id'] = 1;
			} else {
				$this->Wzsetting->id = 1;
			}

			if ($this->Wzsetting->save($this->request->data)) {
				$ds->commit();
				$this->Session->setFlash(__d('webzash', 'Settings has been updated.'), 'success');
				return $this->redirect(array('controller' => 'admin', 'action' => 'index'));
			} else {
				$ds->rollback();
				$this->Session->setFlash(__d('webzash', 'Settings could not be updated. Please, try again.'), 'error');
				return;
			}
		} else {
			$this->request->data = $wzsetting;
			return;
		}
	}

}
