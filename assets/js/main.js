function openChat(){
    
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
                        $('table').append("<tr class='calls' data-id='"+json.calls[i].id+json.calls[i].true_id+"'><td>"+json.calls[i].start_time+"</td><td>"+json.calls[i].name+"</td><td><Button onClick='openChatSupport(this)'>AtenderChamado</Button></td> </tr>");
                    if(json.calls[i].status == 1)
                        $('table').append("<tr class='calls' data-id='"+json.calls[i].id+json.calls[i].true_id+"'><td>"+json.calls[i].start_time+"</td><td>"+json.calls[i].name+"</td><td>Em Atendimento</td> </tr>");
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
    window.open("chat?id="+id,"chatWindow"+id,"width=450,height=450");
}


function resetCalls(){
    $('.calls').remove();
}


function keyUpChat(obj,event){
    if(event.keyCode == 13){// Tecla Enter
        let msg = obj.value;
        obj.value = '';
        if(window.location.toString().includes("=")){
            $.ajax({
                url:'index.php/ajax/sendmessage',
                type:'POST',
                data:{
                    msg:msg,
                    call_id:window.location.toString().split("=")[1].substring(32)
                }
            });
        }
        else{
            $.ajax({
                url:'index.php/ajax/sendmessage',
                type:'POST',
                data:{
                    msg:msg
                }
            });
        }
    }
}

    function checkForNewMessages(){
        let call_id;
        if(window.location.toString().includes("=")){
            call_id = window.location.toString().split("=")[1].substring(32);
        }
        $.ajax({
            url:'index.php/ajax/getmessages',
            type:'POST',
            dataType:'json',
            data:{
                call_id: call_id
            },
            success:function(res){
                if(res.length > 0)
                    for(let i in res){
                        let name = ''; 
                        let time = res[i].send_time.substring(11,16);
                        if(res[i].origin == 1)
                            name = $('.input').attr('data-name');
                        else   
                            name = "Suporte";                         
                        $('.message-box').append(" <div class='msg-ballon'>"+time+" <strong>"+name+"</strong> "+res[i].message+"</div>");
                    }
                //$('.message-box').scrollTop($('.message-box')[0].scrollHeight());
                setTimeout(checkForNewMessages,3000);
            },
            error:function(){
                setTimeout(checkForNewMessages,3000);
            }
        })
    }

