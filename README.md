# DOWNLOAD NF DE ENTRADA
Efetue download das notas emitidas contra seu CNPJ direto da **SEFAZ** usando a chave dela com a api [**NFePHP**](https://github.com/nfephp-org "NFePHP").

***ATENÇÃO!***
> Para usar esse script é necessário que você possua o ***CERTIFICADO DIGITAL*** da empresa na qual você irá efetuar a consulta.
**O download das notas apenas é permitido para o DESTINATÁRIO**

#### CONFIGURAÇÕES
Na pasta controller use
```bash
composer update
```

1. - No arquivo [ *controller/config.php* ] você irá preencher os dados solicitados.
1. - Coloque o **CERTIFICADO** dentro da pasta [ *certificado* ]
1. - No arquivo [ *array.php* ] você irá colocar as chaves das notas que deseja efetuar o download.
