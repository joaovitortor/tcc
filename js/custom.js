async function carregarAutores(valor){

    if(valor.length >= 2){
        //console.log(valor);
        const dados = await fetch('listarAutores.php?nome=' + valor);
        const resposta = await dados.json();

        console.log(resposta);
    }
}