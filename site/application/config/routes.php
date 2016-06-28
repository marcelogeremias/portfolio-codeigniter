<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'usuario';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['trabalhos'] = 'trabalho/index';

$route['formacoes'] = 'formacao/index';

$route['contato'] = 'contato/index';
$route['enviarContato'] = 'contato/enviarContato';

// Painel

$route['painel'] = 'painel/index';
$route['acessar'] = 'painel/login';
$route['sair'] = 'painel/logout';

// Painel - Trabalhos
$route['painel/trabalhos'] = 'trabalho/listaTrabalhos';
$route['painel/trabalhos/form/(:num)'] = 'trabalho/atualizaTrabalho/$1';
$route['painel/trabalhos/cadastrar'] = 'trabalho/confirmarCadastroTrabalho';
$route['painel/trabalhos/atualizar'] = 'trabalho/confirmarAtualizacaoTrabalho';
$route['painel/trabalhos/remover/(:num)'] = 'trabalho/removeTrabalho/$1';

// Painel - Formações
$route['painel/formacoes'] = 'formacao/listaFormacoes';
$route['painel/formacoes/form/(:num)'] = 'formacao/atualizaFormacao/$1';
$route['painel/formacoes/cadastrar'] = 'formacao/confirmarCadastroFormacao';
$route['painel/formacoes/atualizar'] = 'formacao/confirmarAtualizacaoFormacao';
$route['painel/formacoes/remover/(:num)'] = 'formacao/removeFormacao/$1';

// Painel - Contatos
$route['painel/contatos'] = 'contato/listaContatos';
$route['painel/contatos/(:num)'] = 'contato/detalheContato/$1';

$route['test/(:any)'] = 'test/$1';