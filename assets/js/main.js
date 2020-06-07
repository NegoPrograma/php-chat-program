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
                for(let i in json.calls){
                    if(json.calls[i].status == 0)
                        $('table').append("<tr class='calls' data-id='"+json.calls[i].id+json.calls[i][i]+"'><td>"+json.calls[i].start_time+"</td><td>"+json.calls[i].name+"</td><td><Button onClick='openChatSupport(this)'>AtenderChamado</Button></td> </tr>");
                    if(json.calls[i].status == 1)
                        $('table').append("<tr class='calls' data-id='"+json.calls[i].id+json.calls[i][i]+"'><td>"+json.calls[i].start_time+"</td><td>"+json.calls[i].name+"</td><td>Em Atendimento</td> </tr>");
            }
            setTimeout(getCalls,2000);
        }},
        error:()=>{
            setTimeout(getCalls,2000);
        }
    })
}

function openChatSupport(object){
    let id = $(object).closest('.calls').attr("data-id");
    window.open("chat?id="+id,"chatWindow","width=450,height=450");
}


function resetCalls(){
    $('.calls').remove();
}


function keyUpChat(obj,event){
    if(event.keyCode == 13){// Tecla Enter
        let msg = obj.value;
        obj.value = '';
        let time = new Date();
        let hour = time.getHours()+":"+time.getMinutes();
        let name = $('.input').attr('data-name');
        $('.message-box').append(" <div class='msg-ballon'>"+hour+" <strong>"+name+"</strong> "+msg+"</div>");
    }
}