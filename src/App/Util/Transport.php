<?php
/**
 * Created by PhpStorm.
 * User: alex.barreto
 * Date: 18/10/2019
 * Time: 10:48
 */

namespace App\Util;

trait Transport
{
    public function transport($result = false, $message = null, $data = false, $params = null) {
        $object = new \stdClass();

        $object->result = $result;
        $object->message = $message;
        $object->data = $data;
        $object->params = $params;

        return $object;
    }
}