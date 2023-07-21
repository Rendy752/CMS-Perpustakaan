var number=0;
function set(){
    number+=1;
    if(number%2!=0){
        document.body.style.backgroundColor="#505050";
        document.body.style.color="#FFFFFF";
        document.getElementById("mode").setAttribute("class","fa fa-toggle-on");
    }
    else{
        document.body.style.backgroundColor="#FFFFFF";
        document.body.style.color="#000000";
        document.getElementById("mode").setAttribute("class","fa fa-toggle-off");
    }
    number
}