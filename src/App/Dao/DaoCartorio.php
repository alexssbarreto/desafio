<?php
/**
 * Created by PhpStorm.
 * User: alex.barreto
 * Date: 16/10/2019
 * Time: 17:57
 */

namespace App\Dao;

use App\Model\Cartorio;
use App\Dao\Conexao;

class DaoCartorio
{

    public static $instance;

    private function __construct()
    {
        //
    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new DaoCartorio();

        return self::$instance;
    }

    /**
     * Trata a inserção de um novo registro
     * @param PojoCartorio $cartorio
     * @return bool
     * @throws \Exception
     */
    public function inserir(PojoCartorio $cartorio)
    {
        try {
            $sql = "INSERT INTO tbcartorio (       
                clcartorio_nome,
                clcartorio_razao,
                clcartorio_tabeliao,
                clcartorio_endereco,
                clcartorio_bairro,
                clcartorio_cidade,
                clcartorio_uf,
                clcartorio_cep,
                clcartorio_telefone,
                clcartorio_email) 
                VALUES (
                :nome,
                :razao,
                :tabeliao,
                :endereco,
                :bairro,
                :cidade,
                :uf,
                :cep,
                :telefone,
                :email
                )";

            $prepare = Conexao::getInstance()->prepare($sql);

            $prepare->bindValue(":nome", $cartorio->getNome());
            $prepare->bindValue(":razao", $cartorio->getRazao());
            $prepare->bindValue(":tabeliao", $cartorio->getTabeliao());
            $prepare->bindValue(":endereco", $cartorio->getEndereco());
            $prepare->bindValue(":bairro", $cartorio->getBairro());
            $prepare->bindValue(":cidade", $cartorio->getCidade());
            $prepare->bindValue(":uf", $cartorio->getUf());
            $prepare->bindValue(":cep", $cartorio->getCep());
            $prepare->bindValue(":telefone", $cartorio->getTelefone());
            $prepare->bindValue(":email", $cartorio->getEmail());

            return $prepare->execute();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Edita um registro
     * @param PojoCartorio $cartorio
     * @return bool
     * @throws \Exception
     */
    public function editar(PojoCartorio $cartorio)
    {
        try {
            $sql = "UPDATE tbcartorio set
                  clcartorio_nome = :nome,
                  clcartorio_razao = :razao,
                  clcartorio_tabeliao = :tabeliao,
                  clcartorio_endereco = :endereco,
                  clcartorio_bairro = :bairro,
                  clcartorio_cidade = :cidade,
                  clcartorio_uf = :uf,
                  clcartorio_cep = :cep,
                  clcartorio_telefone = :telefone,
                  clcartorio_email = :email
                WHERE pkcartorio_id = :id";

            $prepare = Conexao::getInstance()->prepare($sql);

            $prepare->bindValue(":nome", $cartorio->getNome());
            $prepare->bindValue(":razao", $cartorio->getRazao());
            $prepare->bindValue(":tabeliao", $cartorio->getTabeliao());
            $prepare->bindValue(":endereco", $cartorio->getEndereco());
            $prepare->bindValue(":bairro", $cartorio->getBairro());
            $prepare->bindValue(":cidade", $cartorio->getCidade());
            $prepare->bindValue(":uf", $cartorio->getUf());
            $prepare->bindValue(":cep", $cartorio->getCep());
            $prepare->bindValue(":telefone", $cartorio->getTelefone());
            $prepare->bindValue(":email", $cartorio->getEmail());
            $prepare->bindValue(":id", $cartorio->getId());

            return $prepare->execute();
        } catch (\Exception $e) {
            throw new \Exception('Erro ao editar registro.');
        }
    }

    /**
     * Exclui um registro
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM tbcartorio WHERE pkcartorio_id = :id";
            $prepare = Conexao::getInstance()->prepare($sql);
            $prepare->bindValue(":id", $id);

            return $prepare->execute();
        } catch (Exception $e) {
            throw new \Exception('Erro ao excluir o registro.');
        }
    }


    /**
     * Realiza a busca de todos os registros
     * @return mixed
     */
    public function listarTodos()
    {
        try {
            $sql = "SELECT * FROM tbcartorio";
            $prepare = Conexao::getInstance()->prepare($sql);

            $prepare->execute();

            return $this->populaCartorio($prepare->fetchAll(\PDO::FETCH_ASSOC));
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Recupera um determinado registro
     * @param $id
     * @return PojoCartorio
     * @throws \Exception
     */
    public function find($id)
    {
        try {
            $sql = "SELECT * FROM tbcartorio WHERE pkcartorio_id = :id";

            $prepare = Conexao::getInstance()->prepare($sql);
            $prepare->bindValue(":id", $id);
            $prepare->execute();

            return $this->populaCartorio($prepare->fetch(\PDO::FETCH_ASSOC), true);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Trata da apresentação do resultado de dados
     * @param $row
     * @return PojoCartorio
     */
    private function populaCartorio($row, $find = false)
    {
        if ($find) {
            $pojo = new PojoCartorio();
            $pojo->setId($row['pkcartorio_id'])
                ->setNome($row['clcartorio_nome'])
                ->setRazao($row['clcartorio_razao'])
                ->setTelefone($row['clcartorio_telefone'])
                ->setEmail($row['clcartorio_email'])
                ->setTabeliao($row['clcartorio_tabeliao'])
                ->setEndereco($row['clcartorio_endereco'])
                ->setBairro($row['clcartorio_bairro'])
                ->setCidade($row['clcartorio_cidade'])
                ->setUf($row['clcartorio_uf'])
                ->setCep($row['clcartorio_cep']);

            return $pojo;
        }

        $aResult = [];
        if (is_array($row)) {
            foreach ($row as $cartorio) {
                $pojo = new PojoCartorio();
                $pojo->setId($cartorio['pkcartorio_id'])
                    ->setNome($cartorio['clcartorio_nome'])
                    ->setTelefone($cartorio['clcartorio_telefone'])
                    ->setEmail($cartorio['clcartorio_email'])
                    ->setTabeliao($cartorio['clcartorio_tabeliao']);

                $aResult[] = $pojo;
            }

            return $aResult;
        }

        $pojo = new PojoCartorio();
        $pojo->setId($row->pkcartorio_id)
            ->setNome($row->clcartorio_nome)
            ->setTelefone($row->clcartorio_telefone)
            ->setEmail($row->clcartorio_email)
            ->setTabeliao($row->clcartorio_tabeliao);

        return $pojo;
    }
}