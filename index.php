<?php
define('BASE', __DIR__);

require_once 'controller/vendor/autoload.php';
require_once 'array.php';

/*
|--------------------------------------------------------------------------
| Classes necessárias para consulta.
|--------------------------------------------------------------------------
*/
use NFePHP\NFe\Tools;
use NFePHP\Common\Certificate;
use NFePHP\NFe\Common\Standardize;

/*
|--------------------------------------------------------------------------
| As constantes a seguir estão em controller/config.php
|--------------------------------------------------------------------------
|
| INFO['dir_certificado'] 	= caminho do certificado que será usado
| INFO['senha_certificado'] = senha do certificado
| CONF 						= parametros em json para configurações da API
|
*/
$certificate 	= Certificate::readPfx(INFO['dir_certificado'], INFO['senha_certificado']);
$tools 			= new Tools(CONF, $certificate);
$tools->model('55');
$tools->setEnvironment(1);

/*
|--------------------------------------------------------------------------
| buscarNotas
|--------------------------------------------------------------------------
|
| Consulta todas as chaves dentro do loop e envia para INFO['xml_recebido']
|
| $chave = recebe a chave do loop
| $tools = referente as configurações de controller/config.php
|
*/
function buscarNotas($chave, $tools){

	$response = $tools->sefazDownload($chave);

	$stz = new Standardize($response);
	$std = $stz->toStd();

	if ($std->cStat != 138) {
		echo "Documento não retornado. [$std->cStat] $std->xMotivo".'<br><br>';
	}else{
		$zip = $std->loteDistDFeInt->docZip;
		$xml = gzdecode(base64_decode($zip));
	}

	return empty($xml)?'':file_put_contents(INFO['xml_recebido'].SP.$chave.'-nf.xml', $xml);

}

/*
|--------------------------------------------------------------------------
| Percorre as chaves e efetua o download.
|--------------------------------------------------------------------------
*/
foreach ($array as $value) {
	if (!file_exists(INFO['xml_recebido'].'/'.$value.'-nfe.xml')) {
		buscarNotas($value, $tools);
		sleep(1);
	}else{
		continue;
	}
}