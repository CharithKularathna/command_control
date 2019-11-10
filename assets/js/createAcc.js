let password;

let passwordCommenter = function (){

    let divi = document.querySelector("#password-text");
    divi.addEventListener("input",function(text){
        password = text.target.value;
        if(text.target.value.length<8){
            document.querySelector("#password-comment1").innerHTML="";
            document.querySelector("#password-comment2").innerHTML="";
            const comment = document.createElement('p');
            comment.textContent="Weak Password";
            document.querySelector("#password-comment1").appendChild(comment);
            
        }
        else{
            document.querySelector("#password-comment1").innerHTML="";
            document.querySelector("#password-comment2").innerHTML="";
            const comment = document.createElement('p');
            comment.textContent="Strong Password";
            document.querySelector("#password-comment2").appendChild(comment);
            
        }
        
    })
}

let passwordConfirmChecker = function (){

    let condivi = document.querySelector("#conpassword-text");
    condivi.addEventListener("change",function(text){
        let conpassword = text.target.value;
        if(conpassword != password){
            document.querySelector("#conpassword-comment").innerHTML="";
            const comment = document.createElement('p');
            comment.textContent="Passwords do not match";
            document.querySelector("#conpassword-comment").appendChild(comment);
            
        }
        else{
            document.querySelector("#conpassword-comment").innerHTML="";

        }
        
    })
}

let cnChecker = function (){

    let condivi = document.querySelector("#cn-text");
    condivi.addEventListener("change",function(text){
        let cn = text.target.value;
        if(text.target.value.length<9 || text.target.value.length>10){
            document.querySelector("#cn-comment").innerHTML="";
            const comment = document.createElement('p');
            comment.textContent="Invalid Contact Number";
            document.querySelector("#cn-comment").appendChild(comment);
            
        }
        else{
            document.querySelector("#cn-comment").innerHTML="";

        }
        
    })
}

let nicChecker = function (){

    let condivi = document.querySelector("#nic-text");
    condivi.addEventListener("change",function(text){
        let cn = text.target.value;
        if(text.target.value.length != 10 || !(text.target.value.endsWith("V"))){
            document.querySelector("#nic-comment").innerHTML="";
            const comment = document.createElement('p');
            comment.textContent="Invalid NIC Number";
            document.querySelector("#nic-comment").appendChild(comment);
            
        }
        else{
            document.querySelector("#nic-comment").innerHTML="";

        }
        
    })
}

passwordCommenter();
passwordConfirmChecker();
cnChecker();
nicChecker();

