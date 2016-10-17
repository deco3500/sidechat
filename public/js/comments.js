function replyFieldShow(id){
    idReplyStr = "#reply" + id;
    idSubmitStr = "#submit" + id;
    $(idReplyStr).toggle();
    $(idSubmitStr).toggle();
}

function replyFieldShowDiscussion(id){
    idReplyStr = "#replydiscussion";
    idSubmitStr = "#submitdiscussion";
    $(idReplyStr).toggle();
    $(idSubmitStr).toggle();
}