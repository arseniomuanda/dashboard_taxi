/* const productScreem = 'product';
const categoryScreem = 'categories';
const subcategoryScreem = 'subcategory';
const brandScreem = 'brand';
const marketScreem = 'market';
const submitfileScreem = 'submitfile'; */

const endpoins = new Object({
    api: 'https://bazza-service.onrender.com',
    login: '/auth/login',
    unappprevedDrivers: '/admin/drivers/unapproved',
    allDrivers: '/drivers/',
    users: '/user/'
})


// Função para obter parâmetros da URL
function obterParametroDaUrl(nomeDoParametro) {
    nomeDoParametro = nomeDoParametro.replace(/[[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + nomeDoParametro + '=([^&#]*)');
    var resultados = regex.exec(location.search);
    return resultados === null ? '' : decodeURIComponent(resultados[1].replace(/\+/g, ' '));
}