/**
 * Script que contrala as animações da página principal 
 * Para utilizar basta adicionar na tag html o attr 
 * data-anime.
 * Autor: Bruno Salmito Filizola
 * Versão: 0.1
 */

/**
 * Função para otimizar as animações
 * @param {*} func  (Passar a função para o debounce)
 * @param {*} wait  (O tempo que irá aguardar para executar novamente)
 * @param {*} immediate 
 */

function debounce(func, wait, immediate) {
    var timeout;
    return function () {
        var context = this,
            args = arguments;
        var later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
};

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

} //Fim da function animeScroll

animeScroll();
/**
 * Verifica se existem as targets e se existir
 * fica ouvindo o scrool otimizado com o debounce  
 */
if (target.length) {
    window.addEventListener('scroll', debounce(function () {
        animeScroll();
    }, 200));
}