<?php
/**
 * Created by PhpStorm.
 * User: alex.barreto
 * Date: 16/10/2019
 * Time: 18:02
 */

namespace App\Service;


use App\Dao\DaoCartorio;
use App\Dao\PojoCartorio;
use App\Model\Cartorio;
use App\Util\Transport;

class CadastroManager
{

    use Transport;

    protected $daoCartorio;

    public function __construct()
    {
        if (!isset($this->daoCartorio)) {
            $this->daoCartorio = DaoCartorio::getInstance();
        }

        return $this->daoCartorio;
    }

    public function listar()
    {
        return $this->daoCartorio->listarTodos();
    }

    /**
     * Recupera um registro
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $response = $this->daoCartorio->find($id);

        if ($response)
            return $this->transport(true, 'Registro encontrado.', $response);

        return $this->transport(false, 'Registro inválido.');
    }

    /**
     * Trata da inclusão de dados
     * @param \stdClass $data
     * @return \stdClass
     */
    public function add(\stdClass $data)
    {
        $validate = false;
        if (!property_exists($data, 'nome') || empty($data->nome)) {
            $validate .= 'Obrigatório informar o nome.';
        }

        if ($validate) {
            return $this->transport(false, $validate);
        }

        $cartorio = new PojoCartorio();
        $cartorio->setNome($data->nome)
            ->setRazao($data->razao)
            ->setEndereco($data->endereco)
            ->setCidade($data->cidade)
            ->setBairro($data->bairro)
            ->setUf($data->uf)
            ->setCep($data->cep)
            ->setTabeliao($data->tabeliao)
            ->setTelefone($data->telefone)
            ->setEmail($data->email);

        $response = $this->daoCartorio->inserir($cartorio);

        if ($response) {
            return $this->transport(true, 'Cartório incluído com sucesso!');
        }

        return $this->transport(false, 'Erro ao incluir cartório');
    }

    /**
     * Trata do updade de dados
     * @param $id
     * @param \stdClass $data
     * @return \stdClass
     */
    public function update($id, \stdClass $data)
    {
        if (!property_exists($data, 'nome') && empty($data->nome)) {
            return $this->transport(false, 'Obrigatório informar o nome');
        }

        $cartorio = new PojoCartorio();
        $cartorio->setId($id)
            ->setNome($data->nome)
            ->setRazao($data->razao)
            ->setEndereco($data->endereco)
            ->setCidade($data->cidade)
            ->setBairro($data->bairro)
            ->setUf($data->uf)
            ->setCep($data->cep)
            ->setTabeliao($data->tabeliao)
            ->setTelefone($data->telefone)
            ->setEmail($data->email);

        $response = $this->daoCartorio->editar($cartorio);

        if ($response) {
            return $this->transport(true, 'Cartório editado com sucesso!');
        }

        return $this->transport(false, 'Erro ao editar cartório');
    }

    /**
     * Exclui um registro
     * @param $id
     * @return bool
     */
    public function excluir($id)
    {
        $response = $this->daoCartorio->excluir($id);

        if ($response)
            return $this->transport(true, 'Registro excluído com sucesso.');

        return $this->transport(false, 'Erro ao excluir este registro.');
    }

    /**
     * Importa dados de XML
     * @param $file
     * @return \stdClass
     */
    public function importarDados($file)
    {
        if (!is_file($file)) {
            return $this->transport(false, 'Arquivo inexistente');
        }

        $xml = simplexml_load_file($file);

        foreach($xml as $cartorio){
            $pojoCartorio = new PojoCartorio();
            $pojoCartorio->setNome($cartorio->nome)
                ->setRazao($cartorio->razao)
                ->setEndereco($cartorio->endereco)
                ->setBairro($cartorio->bairro)
                ->setCidade($cartorio->cidade)
                ->setUf($cartorio->uf)
                ->setCep($cartorio->cep)
                ->setTabeliao($cartorio->tabeliao);

            $this->daoCartorio->inserir($pojoCartorio);
        }

        return $this->transport(true, 'Arquivo importado com sucesso.');
    }
}