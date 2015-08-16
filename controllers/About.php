<?php

class About
{
	public function __construct()
	{
		echo 'this is the about page';
	}

	public function index(){
		echo '<br> oi, sou chamado quando nao existe metodo classe na url<br>';
	}

	public function cadastro()
	{
		echo '<br>this is the cadastro function';
	}
}