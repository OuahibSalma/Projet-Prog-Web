var qui="on ne sait pas" ;  
function ouvrir() { 
    document.getElementsByTagName("section").style.display("block") ;   
}
function change() { 
    if(document.getElementById('prof').checked) { 
      document.getElementsByTagName("section").style.display ="inline" ; 
      document.getElementsByTagName("row no-gutters").style.display = "none" ; 
        return "professeur" ; 
     } 
     else if(document.getElementById('etud').checked) { 
        window.close("principale.html") ; 
        window.open("index.html");
       return "etudiant" ; 
     }  
     if(document.getElementById('admin').checked) { 
        window.close("principale.html") ; 
        window.open("index.html");
       return "directeur" ; 
     }  
} 
function profession() { 
    setTimeout(change(),1000) ; 
    qui = change() ; 
    alert ( "vous etes un " +qui) ; 
} 


