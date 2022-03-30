function disableInputs(){
        $('input, select').attr('disabled',true);
}

function enableInputs(){
        const paymentDate = document.querySelector('#paymentDate');
        paymentDate.disabled = false;
        const cardNo=document.querySelector('#cardNo');
        cardNo.disabled=false;
        const bank=document.querySelector('#bank');
        bank.disabled=false;
        const pmtMode=document.querySelector('#pmtMode');
        pmtMode.disabled=false;
}