<?php
/**
 * Created by PhpStorm.
 * User: alex.barreto
 * Date: 16/10/2019
 * Time: 17:55
 */

namespace App\Dao;

class Conexao
{

    public static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new \PDO('mysql:host=localhost;
            dbname=db-desafio', 'root', '',
                array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE,
                \PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(\PDO::ATTR_ORACLE_NULLS,
                \PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }
}