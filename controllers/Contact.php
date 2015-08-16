
<?php

class Contact
{
	public function __construct()
	{
		echo 'this is the contact page';
		$this->_other();
	}

	protected function _other()
	{
		echo 'this is the other function';
	}
}