<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 7.11.2017 г.
 * Time: 15:31
 */

namespace Core;


class DataBinder implements DataBinderInterface {

	public function bind( array $from, $className ) {
		$classInfo = new \ReflectionClass($className);
		$res = $classInfo->getProperties();
		$object = new $className();
		foreach ($res as $property){
			if(isset($from[$property->getName()])){
				$property->setAccessible(true);
				$property->setValue($object,$from[$property->getName()]);
			}
		}
		return $object;
	}
}