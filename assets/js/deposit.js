let password;

let cardChecker = function (){

    let divi = document.querySelector("#ccn-text");
    divi.addEventListener("change",function(text){
        password = text.target.value;
        if(text.target.value.length<16){
            document.querySelector("#password-comment1").innerHTML="";
            document.querySelector("#password-comment2").innerHTML="";
            const comment = document.createElement('p');
            comment.textContent="Incorrect Credit Card Number";
            document.querySelector("#password-comment1").appendChild(comment);
            
        }
        else{
            if(password.startsWith('4')){
                document.querySelector("#password-comment1").innerHTML="";
                document.querySelector("#password-comment2").innerHTML="";
                const comment = document.createElement('p');
                comment.textContent="VISA";
                document.querySelector("#password-comment2").appendChild(comment);
            }

            if(password.startsWith('5')){
                document.querySelector("#password-comment1").innerHTML="";
                document.querySelector("#password-comment2").innerHTML="";
                const comment = document.createElement('p');
                comment.textContent="Mastercard";
                document.querySelector("#password-comment2").appendChild(comment);
            }
            
        }
        
    })
}


cardChecker();