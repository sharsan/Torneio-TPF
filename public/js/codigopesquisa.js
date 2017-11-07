
//rotina Principal
btn_adicionar.addEventListener('click', adicionar_dados);
*/
function filtrar () {
 
  var nomeFiltro = document.getElementById('filtro-nome');
  var tabela = document.getElementsByTagName('tr');

  for (var linha=1; linha<tabela.length; linha++ ){
    var colunas = tabela[linha].cells[0].innerText;


    if(colunas === nomeFiltro.value){
      tabela[linha].style.display = 'table-row';
    }else
    tabela[linha].style.display = 'none';
  }
}


function mostrarLinhas(){
  var nomeFiltro = document.getElementById('filtro-nome');
  var tabela = document.getElementsByTagName('tr');

  if(nomeFiltro.value === ""){
    for(var linha=1; linha<tabela.length; linha++){
      tabela[linha].style.display = 'table-row';
    }
  }
}
