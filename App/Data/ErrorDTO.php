<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.11.2017 г.
 * Time: 14:41
 */

namespace App\Data;


class ErrorDTO {
	private $errorInfo;

	public function __construct($errorInfo) {
		$this->setErrorInfo($errorInfo);
	}

	/**
	 * @return mixed
	 */
	public function getErrorInfo() {
		return $this->errorInfo;
	}

	/**
	 * @param mixed $errorInfo
	 */
	public function setErrorInfo( $errorInfo ) {
		$this->errorInfo = $errorInfo;
	}
}