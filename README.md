<h1>HomeSchool</h1>

<p>Esse projeto foi pensado em ser feito com objetivos de aprendizagem. Durante um estágio supervisionado, fui direcionado a realizar o sistema básico que simula o EAD, mas com certa complexidade, foi com este primeiro projeto que tive as reais primeiras impressões com o FrameWork Laravel, na qual facilitou muitos processos importantes que levariam muito mais tempo se fosse feito com PHP puro. Para ter base das ações que eu iria realizar, foi feito um cenário fictício, em que uma pessoa, um professor, se viu na necessidade de um sistema para uma melhor performance e organizações de suas atividades postadas. </p>

<p>Nesta aplicação, há muitas funcionalidades e especificidades do FrameWork Laravel, é possível realizar a autenticação de três formas, como administrador, professor e aluno, utilizando de uma multipliautenticação. Armazenamento de arquivos locais, para envios de atividades, havendo portanto a função de download, para desta forma o professor conseguir avalizar e aderir a nota necessária para o aluno correspondente.</p>

Para melhor funcionalidade, foram utilizada algumas bibliotecas, sendo elas:
* Editor de Texto (CkEditor): <a href="https://ckeditor.com/ckeditor-5/download/">Acesse</a>
* DataTable: <a href="https://datatables.net/">Acesse</a>

## Cenário

Sou professor e dou aulas de preparo para concursos públicos, com o início da pandemia
precisei me adaptar com vídeo transferência para ministrar minhas aulas. 

Mas estou tendo problemas com a quantidade de atividades que tenho recebido pelo whatsapp,
gostaria de tirar essa responsabilidades da minha rede pessoal.

Gostaria de ter um sistema que eu pudesse lançar as atividades da semana e eles pudessem 
enviar as respostas para que eu desse o visto, para que ao final do mês eu pudesse saber
qual foi o desempenho de cada aluno nas minhas atividades.

E quero também que o sistema esteja apto para que um dia mais professores possam ser registrados nele.

Se possível gostaria que houvesse um editor de texto dentro do próprio sistema semelhante ao
word em que eu possa formatar o texto e depois salvar essas informações como um documento.

## Regras de negócio 

* O professor quem registra novos alunos no sistema;
* A conta dos aluno não pode ser excluída, ao invés disso ela será desativada;
* Depois que o professor da o visto na atividade o aluno não poderá mais editar sua resposta;
* Quando um professor remover uma atividade as respostas atreladas a ela também serão excluídas;

## Operações

#### ALUNO 

	> CRUD resposta da atividade;
	> Visualizar detalhes da conta;

#### PROFESSOR

	> Visualizar detalhes da conta;
	> Atualizar detalhes da conta;
	> CRUD disciplina;
	> CRUD atividade;
	> CRUD aluno;
    
## Diagrama 

![unnamed](https://user-images.githubusercontent.com/104682781/228869733-ae77ae46-57fd-406f-818b-8ef2ccc968d2.jpg)

<hr>

## Algumas telas prontas do sistema

> Telas padrões
![image](https://user-images.githubusercontent.com/104682781/228870887-32138095-66b4-4a8b-8401-849d769f0a72.png)
![image](https://user-images.githubusercontent.com/104682781/228871095-993fbac2-bc73-4e1e-8fb6-70d0ce757c6e.png)

> Logado como professor
![image](https://user-images.githubusercontent.com/104682781/228871364-9b5fa6f2-9a8a-4e36-ba19-455f63bc2a65.png)
![image](https://user-images.githubusercontent.com/104682781/228873144-424b3397-bc7e-4308-9879-9f0c860cc589.png)
![image](https://user-images.githubusercontent.com/104682781/228873258-6e8da2f8-9884-4cca-9789-ecd85421c402.png)
![image](https://user-images.githubusercontent.com/104682781/228873598-06b69500-a973-4591-9249-e10a1bc39944.png)
![Atividades - Google Chrome 2023-03-30 11-46-04](https://user-images.githubusercontent.com/104682781/228875917-291789fd-b5f0-4145-a56d-e97a6cfe8afc.gif)

> Logado como aluno
![image](https://user-images.githubusercontent.com/104682781/228876549-b70702a0-0826-481d-a9af-91874d06965e.png)
![Listagem de Atividades - Google Chrome 2023-03-30 11-51-02](https://user-images.githubusercontent.com/104682781/228876431-dace5fec-5a25-4038-8c46-829c5d7a3b5f.gif)
![Atividades - Google Chrome 2023-03-30 11-52-43](https://user-images.githubusercontent.com/104682781/228877145-9f60ef59-b367-4d2e-afc2-4140ba5fb1ec.gif)





    
