<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 10/11/2019
 * Time: 12:05
 */

class CadastroTest extends \PHPUnit\Framework\TestCase
{

    protected $cadastroManager;

    /**
     * Testa se o arquivo utilizado é inválido
     */
    public function testImportaDadosFailure()
    {
        $this->cadastroManager = new \App\Service\CadastroManager();

        $file = __DIR__ . '/data/_Cartorios-CNJ.xml';

        $response = $this->cadastroManager->importarDados($file);

        $this->assertEquals(false, $response->result);
    }

    /**
     * Testa se um arquivo é válido
     */
    public function testImportaDadosSuccess()
    {
        $this->cadastroManager = new \App\Service\CadastroManager();

        $file = __DIR__ . '/data/Cartorios-CNJ.xml';

        $response = $this->cadastroManager->importarDados($file);

        $this->assertEquals(true, $response->result);
    }
}