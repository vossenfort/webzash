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
?>
<div class="wzuser add form">
	<?php
		if ($registration) {
			echo $this->Form->create('Wzuser', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'wrapInput' => false,
					'class' => 'form-control',
				),
			));

			echo $this->Form->input('username', array('label' => __d('webzash', 'Username')));
			echo $this->Form->input('password', array('label' => __d('webzash', 'Password')));
			echo $this->Form->input('fullname', array('label' => __d('webzash', 'Fullname')));
			echo $this->Form->input('email', array('type' => 'email', 'label' => __d('webzash', 'Email')));

			echo '<div class="form-group">';
			echo $this->Form->submit(__d('webzash', 'Register'), array(
				'div' => false,
				'class' => 'btn btn-primary'
			));
			echo $this->Html->tag('span', '', array('class' => 'link-pad'));
			echo $this->Html->link(__d('webzash', 'Login'), array('plugin' => 'webzash', 'controller' => 'wzusers', 'action' => 'login'), array('class' => 'btn btn-default'));
			echo '</div>';

			echo $this->Form->end();
		} else {
			echo '<h4>' . __d('webzash', 'Sorry, user registration is disabled.') . '</h4><br />';

			echo '<div class="form-group">';
			echo $this->Html->link(__d('webzash', 'Login'), array('plugin' => 'webzash', 'controller' => 'wzusers', 'action' => 'login'), array('class' => 'btn btn-primary'));
			echo '</div>';
		}
	?>
</div>
