<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 7.11.2017 г.
 * Time: 15:29
 */

namespace Core;


interface DataBinderInterface {
	 public function bind(array $from, $className);
}