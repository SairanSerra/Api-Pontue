# Tutorial para utilizar aplicação

# Primeiro Passo

1 - Primeiramente, o Docker só tem plena compatibilidade com o Windows 10. <br/>
2 - Baixe o Docker neste link: https://www.docker.com/products/docker-desktop <br/>
3 - Instale o Docker. A instalação é simples. O Docker Compose já será instalado juntamente. <br/>
4 - Apos instalar o Docker, é necessário instalar o WSL (Windows Subsystem for Linux). Para tanto, abra um terminal de linha de comando em modo administrativo e digite o comando abaixo: <br/>

dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart <br/>

5 - Após o comando finalizar, reinicie o seu computador. <br/>
6 - Após o computador reiniciar, abra novamente um terminal de linha de comando em modo administrativo e digite o comando abaixo: <br/>

dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all /norestart <br/>

7 - Reinicie o seu computador novamente. <br/>
8 - Após o computador reiniciar, provavelmente a mensagem abaixo irá aparecer para você: <br/>

WSL 2 requires an update to its kernel component. For information please visit https://aka.ms/wsl2kernel <br/>

9 - Para sanar este problema, faça o download do Kernel atualizado neste link: https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_x64.msi <br/>
10 - Instale o Kernel e então reinicie o seu computador. <br/>
11 - Após o computador reiniciar, abra novamente um terminal de linha de comando em modo administrativo e digite o comando abaixo: <br/>

Após o computador reiniciar, abra novamente um terminal de linha de comando em modo administrativo e digite o comando abaixo: <br/>

wsl --set-default-version 2 <br/>

12 - E pronto! Agora, teste o Docker e o Docker Compose para verificar se tudo está ok. <br/>

# Segundo passo

1 - Clone o respositório <br/>
2 - Faça um checkout para a branch master ( <i> git checkout master </i> <br/>
3 - Rode o comando ( <i>docker-compose up</i> ) no diretório raíz do projeto <br/>
4 - Entre no docker desktop no container do projeto (api-pontue), vá até o terminal e rode o seguinte comando <i>php artisan migrate --force</i> <br/>
5 - Projeto está pronto basta seguir a documentação do <b>Postman</b> e testar a API <br/>

# Informações Extra

1 - Documentação Postman https://documenter.getpostman.com/view/21994723/2s93K1pzK6 </br>
2- Acesso do Banco local ( Host = 127.0.0.1 , User = root, Password = password, port = 3305 )
