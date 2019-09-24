<?php

 /*
 |
 |  Informe aqui os dados para a consulta
 |
 | 	CNPJ_AQUI
 | 	SIGLA_AQUI
 | 	RAZAO_SOCIAL_AQUI
 | 	CERTIFICADO_AQUI
 | 	SENHA_AQUI
 |
 */

 define('SP', DIRECTORY_SEPARATOR);

 define('INFO', array(

	//cnpj do certificado digital que será usado
 	'cnpj' 				=> 'CNPJ_AQUI',

	//SP, RJ ...
 	'sigla_uf' 			=> 'SIGLA_AQUI',

	//razão social
 	'razao_social' 		=> 'RAZAO_SOCIAL_AQUI',

	//diretório que irá receber as notas
 	'xml_recebido'		=> realpath(BASE.SP.'xmls'),

	//diretório do certificado
 	'dir_certificado' 	=> file_get_contents(BASE.SP.'certificado'.SP.'CERTIFICADO_AQUI.pfx'),

	//senha do certificado
 	'senha_certificado' => 'SENHA_AQUI'

 ));

 /*
 |
 |  Configurações necessárias para o funcionamento da api, não é necessário alterar aqui
 | a menos que você saiba oque está fazendo.
 |
 */

 define('CONF',
 	json_encode(
 		array(
 			"atualizacao" 	=> date('Y-m-d h:i:s'),
 			"tpAmb" 		=> 1,
 			"razaosocial" 	=> INFO['razao_social'],
 			"siglaUF" 		=> INFO['sigla_uf'],
 			"cnpj" 			=> INFO['cnpj'],
 			"schemes" 		=> "PL_009_V4",
 			"versao" 		=> "4.00",
 			"tokenIBPT" 	=> "",
 			"CSC"			=>"",
 			"CSCid" 		=> "",
 			"aProxyConf" => array(
 				"proxyIp" 	=> "",
 				"proxyPort" => "",
 				"proxyUser" => "",
 				"proxyPass" => ""
 			)
 		))
 );