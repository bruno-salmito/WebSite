# Website - Projeto Pessoal
> Website desenvolvido para estudo
[![NPM Version][npm-image]][npm-url]
[![Build Status][travis-image]][travis-url]
[![Downloads Stats][npm-downloads]][npm-url]

>Website pessoal, single page que foi desenvolvido para fins de estudo das linguagens `[JavaScript]`,`[PHP]`,`[HTML]` e `[CSS]`.
> Versão: 1.0

<p align="center">
<img width="70%" src="img/website.gif" alt="Website"/>
</p>


## Arquivos site principal
🚀 __*JS*__ -> Na pasta `js` estão localizados todos os scripts do site principal.
1. *js/animate.js* => Script que controla as animações da página.
2. *js/maps.js* => Script para adição do Google Maps.
3. *js/mask.js* => Script que adiciona uma mascará aos formulários
4. *js/menu.js* => Script que controla o menu mobile
5. *js/scrollMenu.js* => Script que adiciona um efeito ao header do site.

🚀 __*CSS*__ -> Na pasta `css` estão localizados todos os arquivos de css do site principal
1. *css/all.css* => Arquivo de estilo do fontawsome
2. *css/style.css* => Arquivo de estilização do site principal

🚀 __*PHP*__ -> Nas pastas class, e na raiz deste projeto encontra-se os arquivos necessários para controle do backend do site e 
dashboard
1. *config.php* => Contém as variáveis globais e configurações gerais
2. *class/Guest.php*


>Controle `CSS` das animações.
~~~javascript
/* --------------------------------------------------
*    Animações
*    Para usar as animações basta colocar na tag o
*    Atributo data-anime
*/
[data-anime] {
    opacity: 0;
    transition: all .8s ease;
}

[data-anime="left"] {
    transform: translate3d(-50px, 0, 0);
}

[data-anime="right"] {
    transform: translate3d(50px, 0, 0);
}

[data-anime="top"] {
    transform: translate3d(0, -50px, 0);
}

[data-anime="bottom"] {
    transform: translate3d(0, 50px, 0);
}

[data-anime].animate {
    opacity: 1;
    transform: translate3d(0, 0, 0);
}

~~~

>Controle `Javascript` das animações.
~~~javascript
/**
 * Função animeScroll 
 * Quando o usuário declarar o attributo data-anime ativa o scroll
 * quando fizer o scroll executa as animações com o atributo
 */
const target = document.querySelectorAll('[data-anime]');

function animeScroll() {
    const windowTop = window.pageYOffset + ((window.innerHeight * 3) / 4);
    const bannerTop = window.innerHeight;

    target.forEach(function (element) {
        if ((windowTop) > element.offsetTop) {
            //Adiciona a classe que controla a animação
            element.classList.add('animate');
        } else {
            //Remove a classe que controla a animação
            element.classList.remove('animate');
        }
    })

} // Fim da function animeScroll
~~~

~~~php

~~~

## Próximas implatações

#### Front-End
* [  ] Website.
* [ X ] Menu.
      * [ X ] Menu site.
      * [ X ] Menu mobile.
* [ X ] Section Call.
* [ X ] Section Services.
* [ X ] Section Team.
* [ X ] Section Testimony.
* [ X ] Section Contact and Map.
* [  ] Page Error.
* [ X ] Animate.
* [ X ] Mask Form.
* [ X ] Google Maps.

* [  ] Dashboard.
     * [ X ] Asside - Header - Content.
     * [  ] Menu and pages.
     * [  ] Page Error.

#### Back-End 
* [  ] Website.
* [  ] Friendly Url`s.
* [  ] Config.php.
* [  ] Load Page and 404 error.
* [  ] Send form E-mail.
     * [  ] PHPMayler.
     * [  ] Class E-mail.
     * [  ] Ajax form.
     * [  ] Error/Success box.
* [  ] Class Guest.
     * [  ] + onlineGuest().
     * [  ] + visits().


* [  ] Dashboard.
* [  ] Mysql class.
* [  ] Painel class.
     * [  ] + login().
     * [  ] + loadPage().
     * [  ] + permission().
     * [  ] + getGroup().
     * [  ] + warning().
     * [  ] + logFile().

* [  ] User class.
     * [  ] + addUser().
     * [  ] + updateUser().
     * [  ] + deleteUser().
* [  ] Sistema de permissões.

## Configuração para Desenvolvimento

Basta clonar ou fazer o *download* do repositório e mexer à vontade.

## Histórico de lançamentos
* 0.0.5
    * MUDANÇA: Correção do CSS (*dashboard*)
    * ADIÇÃO: Adicionadas as páginas de cadastro e edição de usuários
* 0.0.4
    * ADIÇÃO: Adicionado o *main* do *dashboard* (não finalizado)
* 0.0.3
    * MUDANÇA: Correção do arquivo `README.md`
    * ADIÇÃO: *Scripts* animate, maps, mask ao *site* principal
* 0.0.2
    * MUDANÇA: Correção do CSS.
* 0.0.1
    * Desenvolvimento *Front-End*

## Meta

Bruno Salmito – [@bruno.salmito.5](https://web.facebook.com/bruno.salmito.5) – brunosalmito@gmail.com

Distribuído sob a licença MIT. Veja `LICENSE` para mais informações.

[https://github.com/bruno-salmito/github-link](https://github.com/bruno-salmito/)


## Contributing

1. Faça o _fork_ do projeto (<https://github.com/bruno-salmito/WebSite/fork>)
2. Crie uma _branch_ para sua modificação (`git checkout -b feature/fooBar`)
3. Faça o _commit_ (`git commit -am 'Add some fooBar'`)
4. _Push_ (`git push origin feature/fooBar`)
5. Crie um novo _Pull Request_

[npm-image]: https://img.shields.io/npm/v/datadog-metrics.svg?style=flat-square
[npm-url]: https://npmjs.org/package/datadog-metrics
[npm-downloads]: https://img.shields.io/npm/dm/datadog-metrics.svg?style=flat-square
[travis-image]: https://img.shields.io/travis/dbader/node-datadog-metrics/master.svg?style=flat-square
[travis-url]: https://travis-ci.org/dbader/node-datadog-metrics
[wiki]: https://github.com/seunome/WebSite/wiki
