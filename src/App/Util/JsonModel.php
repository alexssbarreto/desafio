<?php
/**
 * Created by PhpStorm.
 * User: alex.barreto
 * Date: 18/10/2019
 * Time: 15:28
 */

namespace App\Util;


class JsonModel
{

    protected $content;

    /**
     * JsonModel constructor.
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return JsonModel
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}