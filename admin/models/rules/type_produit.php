<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class JFormRuleType extends JFormRule
{
	/**
	 * The regular expression.
	 *
	 * @access	protected
	 * @var		string
	 * @since	1.6
	 */
	protected $regex = '^[^0-9]|[\s{0,1}]+[\w{0,3}]+$';
}

?>
