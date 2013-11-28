Projeto BitCam
=======================================

Este projeto está sendo desenvolvido para mostrar os problemas relacionados a privacidade que as pessoas enfrentam ao liberar muita informação utilizando o local em que elas se encontram.

![Funcionamento](http://fesoft.net/bitcam/ex.png)

Como Funciona?
---------------------------------------

Inicialmente é necessário informar uma coordenada *(latitude/longitude)*,utilizando a API do [Instagram] (http://instagram.com/developer/) é possível capturar todos os locais que as pessoas já adicionaram utilizando o FourSquare,após a captura desses locais é possível listar as imagens e videos que foram postados no instagram a partir daquele local.

Como Instalar
-----------------------------------------

Antes de tudo é necessário que você tenha uma conta no instagram; depois é necessário que seja criado um Client,caso você não tenha a menor ideia da onde encontrar isso [clique Aqui e seja redirecionado.] (http://instagram.com/developer/clients/register/)

Com o Cliente criado é necessário configurar nosso projeto com as informações que você recebeu,estas informações serão editadas no arquivo Load.php

<pre>
$GLOBALS["config"] = array(
	'client_id' => '',
	'client_secret' => '',
	'redirect_uri' => '',
	'token' => ''
);
</pre>

<dl>
  <dt>Porque tem o parâmetro token?</dt>
  <dd>O token é o código recebido após a autenticação. Caso você já tenha esse token guardado e não queira ficar autenticando sempre,basta colocar e utilizar a aplicação sem problemas. Ou deixe sem valor que você terá que autenticar sempre que a Sessão da aplicação expirar. *(Caso você deixe com algum token armazenado, lembre-se que o token pode expirar depois de um tempo)* </dd>
</dl>

Próximas Atualizações
-----------------------------------------

* Efetuar algumas alterações na classe Core.
* Exibir todas as imagens e videos próximas do local sem a necessidade de clicar num ponto.
* Incluir a API do twitter e capturar todos os tweets próximos do local.
* Filtrar o conteúdo por um tempo determinado.
* Adicionar uma interface agradável utilizando BootStrap.

Licença
-----------------------------------------

Você pode copiar,utilizar e fazer o que bem desejar desde que tenha em mente que este é um projeto open source e assim deverá ser. ;D
