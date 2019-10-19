<?php
/**
 * Created by PhpStorm.
 * User: alex.barreto
 * Date: 16/10/2019
 * Time: 17:59
 */

namespace App\Model;


class Cartorio
{

    private $id;
    private $nome;
    private $telefone;
    private $email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Cartorio
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     * @return Cartorio
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Cartorio
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}