var qui="on ne sait pas" ;  
function ouvrir() { 
    document.getElementsByTagName("section").style.display("block") ;   
}
function change(x) { 
    if(document.getElementById('prof').clicked) { 
      document.getElementsByTagName("section").style.display ="inline" ; 
      document.getElementsByTagName("row no-gutters").style.display = "none" ; 
        return "professeur" ; 
     } 
     else if(document.getElementById('etud').clicked) { 
        window.close("principale.html") ; 
        window.open("index.html");
       return "etudiant" ; 
     }  
     if(document.getElementById('admin').clicked) { 
        window.close("principale.html") ; 
        window.open("index.html");
       return "directeur" ; 
     }  
} 
function profession(profession) { 
    // setTimeout(change(),1000) ;  
    // alert ( "vous etes un " +change()) ; 
    document.getElementById('profession').value = profession ;
    var x = document.body.children
    x[0].style.display = "none"
    x[1].style.display = "block"
  }


