# MVC
Este projeto é uma espécie de framework MVC básico puro (total ausência de libs).
## Utilização
Para se utilizar ele, basta:
1. Baixar o projeto;
2. Alterar o .htaccess (modificando ou excluindo) das pastas public e app dependendo do ambiente (produção ou teste);
3. Definir no arquivo public/index.php, no parâmetro do método de inicialização, o tipo de conversão de url utilizado (true->htaccess ou false->request_uri):
3.1. htaccess: o tipo de conversão de url que usa como base o arquivo .htaccess interpretado pelo Apache (funciona apenas em ambientes em que há o Apache, como o localhost).
3.2. request_uri: o tipo de conversão de url que usa como base a variável global $_SERVER. Funciona em todos os ambientes.
## Recomendações
Em primeiro momento, ative as funcionalidades do arquivo .htaccess em qualquer ambiente de run (local ou produção), e a partir disso, utilize o tipo de conversão de url da sua escolha.