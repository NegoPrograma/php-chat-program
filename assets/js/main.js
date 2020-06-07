function openChat(){
    //URL,Identificador,atributos da janela, abre uma nova guia do navegador utilizado!
    window.open("chat","chatWindow","width=450,height=450");
}

function checkForNewCalls(){
    setTimeout(getCalls,2000);
}

function getCalls(){
    $.ajax({
        'url':'index.php/ajax/getcalls',
        dataType:'json',
        success:(json) =>{
            resetCalls();
            if(json.calls.length > 0){
                $('table')
            }
            setTimeout(getCalls,2000);
        },
        error:()=>{
            setTimeout(getCalls,2000);
        }
    })
}

function  resetCalls(){
    for (let index = 1; index < $('table tr').length; index++) {
        const element = array[index];
        
    }
}