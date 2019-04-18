<?php

$router->get('/', function () use ($router) {
    return response()->json(['status' => 'OK']);
});

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('produto', 'ProdutoController@index');

    $router->get('vendedor', 'VendedorController@index');

    $router->get('cliente', 'ClienteController@index');
    $router->post('cliente', 'ClienteController@salvar');

    $router->get('orcamento', 'OrcamentoController@index');
    $router->post('orcamento', 'OrcamentoController@salvar');

});