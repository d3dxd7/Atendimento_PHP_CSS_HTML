document.addEventListener('DOMContentLoaded', function(){
    let buttom_envia = this.getElementById('submit');
    buttom_envia.addEventListener('click', function(){
        alert('Atendimento Feito e Salvo')
    })
})

document.addEventListener('DOMContentLoaded', function(){
    let nome = document.getElementsById('nome-user');
    let cidade = document.getElementsById('cidade');
    let buttom = document.getElementsByName('submit-btn');
    
    nome.addEventListener('input', habilitarbtn)
    sistema.addEventListener('input', habilitarbtn)

    function habilitarbtn(){
        if(nome.value && cidade.value){
            buttom.disable = false;
        }else{
            buttom.disable = true;
        }
    }
});