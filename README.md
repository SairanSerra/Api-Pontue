# Tutorial para utilizar aplicação

#Primeiro Passo

1 - Primeiramente, o Docker só tem plena compatibilidade com o Windows 10.
2 - Baixe o Docker neste link: https://www.docker.com/products/docker-desktop
3 - Instale o Docker. A instalação é simples. O Docker Compose já será instalado juntamente.
4 - Apos instalar o Docker, é necessário instalar o WSL (Windows Subsystem for Linux). Para tanto, abra um terminal de linha de comando em modo administrativo e digite o comando abaixo:

dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart

5 - Após o comando finalizar, reinicie o seu computador.
6 - Após o computador reiniciar, abra novamente um terminal de linha de comando em modo administrativo e digite o comando abaixo:

dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all /norestart

7 - Reinicie o seu computador novamente.
8 - Após o computador reiniciar, provavelmente a mensagem abaixo irá aparecer para você:

WSL 2 requires an update to its kernel component. For information please visit https://aka.ms/wsl2kernel

9 - Para sanar este problema, faça o download do Kernel atualizado neste link: https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_x64.msi
10 - Instale o Kernel e então reinicie o seu computador.
11 - Após o computador reiniciar, abra novamente um terminal de linha de comando em modo administrativo e digite o comando abaixo:

Após o computador reiniciar, abra novamente um terminal de linha de comando em modo administrativo e digite o comando abaixo:

wsl --set-default-version 2

12 - E pronto! Agora, teste o Docker e o Docker Compose para verificar se tudo está ok.

#Segundo passo
