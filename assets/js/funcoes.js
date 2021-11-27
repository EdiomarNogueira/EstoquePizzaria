function cadastrar() {


    document.getElementById('cadastro').style.display = 'flex';
    document.getElementById('alterar').style.display = 'none';
    document.getElementById('excluir').style.display = 'none';
    document.getElementById('listar').style.display = 'none';
    document.getElementById('lista_inicial_area').style.display = 'none';
}

function alterar() {

    document.getElementById('cadastro').style.display = 'none';
    document.getElementById('alterar').style.display = 'flex';
    document.getElementById('excluir').style.display = 'none';
    document.getElementById('listar').style.display = 'none';
    document.getElementById('lista_inicial_area').style.display = 'none';

}

function excluir() {
    document.getElementById('cadastro').style.display = 'none';
    document.getElementById('alterar').style.display = 'none';
    document.getElementById('excluir').style.display = 'flex';
    document.getElementById('listar').style.display = 'none';
    document.getElementById('lista_inicial_area').style.display = 'none';

}

function listar() {
    document.getElementById('cadastro').style.display = 'none';
    document.getElementById('alterar').style.display = 'none';
    document.getElementById('excluir').style.display = 'none';
    document.getElementById('listar').style.display = 'flex';
    document.getElementById('lista_inicial_area').style.display = 'none';

}