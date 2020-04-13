/**
 * Script para adicionar mascará nos formulários
 * Para utilizar basta adicionar na tag html o attr 
 * data-input="NOME do Controle".
 * Autor: Bruno Salmito Filizola
 * Versão: 0.1
 */

//Objeto mask para adicionar maskara aos campos do formulário
const mask = {
    cpf(value) {
        return value
            .replace(/\D/g, '')
            //D somente números
            //d somente letras
            //g global
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{1,2})/, '$1-$2')
            .replace(/(-\d{2})\d+?$/, '$1')
    },
    cnpj(value) {
        return value
            //nao aceita nada além de número
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1/$2')
            .replace(/(\d{3})(\d{1,2})/, '$1-$2')
            .replace(/(-\d{2})\d+?$/, '$1')
    },
    telefone(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '($1) $2')
            .replace(/(\d{4})(\d)/, '$1-$2')
            .replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')
            .replace(/(-\d{4,5})\d+?$/, '$1')

    },
    cep(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{5})(\d)/, '$1-$2')
            .replace(/(-\d{3})\d+?$/, '$1')
    }
}

// Pega todos os inputs com data-input e chama o objeto
document.querySelectorAll('input').forEach(($input) => {
    const field = $input.dataset.input;

    $input.addEventListener('input', (e) => {
        e.target.value = mask[field](e.target.value);
    }, false)
})