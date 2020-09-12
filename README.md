### Projeto Final Módulo Laravel

- projeto acompanha docker para execução;
- executar a primeira vez o arquivo ./build;
- depois para startar o projeto executar ./start
- o projeto encontra-se na pasta src/
- renomear .env.example para .env e ajustar as variáveis se necessário
- depois que o docker estiver executando acessar a pasta src/
- executar docker exec -i hotel npm install;
- executar docker exec -i hotel npm run dev;
- executar docker exec -i php artisan migrate --seed
- acessar http://localhost:8000
- logar usando o acesso de gerente, criado pelo seeds: gerente@mail.com e senha 123 ou 
então se registrar na home como hósdepe

- como gerente vc terá acesso aos menus:
    - hoteis
    - quartos
    - categorias
    - reservas
    - hospedes
    
 
- como hóspede vc terá acesso somente ao menu:
    - reservas
    
    
Alimentar o sistema criando categorias, quartos e hoteis.
Dentro de hoteis é feito as configurações dos quartos
