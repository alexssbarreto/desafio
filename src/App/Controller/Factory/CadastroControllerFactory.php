<?php
/**
 * Created by PhpStorm.
 * User: alex.barreto
 * Date: 17/10/2019
 * Time: 17:24
 */

namespace App\Controller\Factory;

use App\Factory\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class CadastroControllerFactory implements FactoryInterface
{
    public function __invoke(Request $request, array $options = null)
    {

    }
}