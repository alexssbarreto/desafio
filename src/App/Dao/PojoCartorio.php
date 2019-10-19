<?php
/**
 * Created by PhpStorm.
 * User: alex.barreto
 * Date: 18/10/2019
 * Time: 12:13
 */

namespace App\Dao;


class PojoCartorio
{

    public $id;
    public $nome;

    public $razao;
    public $tabeliao;
    public $endereco;
    public $bairro;
    public $cidade;
    public $uf;
    public $cep;
    public $telefone;
    public $email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return PojoCartorio
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return PojoCartorio
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
     * @return PojoCartorio
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
     * @return PojoCartorio
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRazao()
    {
        return $this->razao;
    }

    /**
     * @param mixed $razao
     * @return PojoCartorio
     */
    public function setRazao($razao)
    {
        $this->razao = $razao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTabeliao()
    {
        return $this->tabeliao;
    }

    /**
     * @param mixed $tabeliao
     * @return PojoCartorio
     */
    public function setTabeliao($tabeliao)
    {
        $this->tabeliao = $tabeliao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     * @return PojoCartorio
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     * @return PojoCartorio
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     * @return PojoCartorio
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     * @return PojoCartorio
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     * @return PojoCartorio
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }
}