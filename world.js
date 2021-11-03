


window.addEventListener("load", (event)=> {

    var httpRequest= new XMLHttpRequest();
    var url= "http://localhost/info2180-lab5/world.php";
    var results= document.getElementById("result");
    var btn = document.getElementById("lookup");

    btn.addEventListener("click", (event)=>{

        event.preventDefault();
        var country = document.querySelector('input[name="country"]').value;
    
    
            if(country==""){
                url= url + "?query=default";
    
            }else{
                var name= country.split(" ");
                var output= "";
    
                for (i=0; i< name.length; i++){
                    output= output + name[i] + "%20";
                }
    
                country = output.slice(0, -3);
                url= url + "?country=" + country;
    
            }
    
            httpRequest.onreadystatechange = function(){
                if (httpRequest.readyState === XMLHttpRequest.DONE){
                    if (httpRequest.status === 200) {
                        var response = httpRequest.responseText;                    
                        results.innerHTML=response;                    
                    } else {
                        alert('There was a problem with the request.');
                    }
                } 
            }
    
            httpRequest.open('Get', url, true);
            httpRequest.send();
            url = "http://localhost/info2180-lab5/world.php";
    
    
    });

})
