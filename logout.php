<?php
   session_start();
clearsessionscookies(0) ;
   //if(session_destroy()) {
      header("Location: index.html");
  // }
function clearsessionscookies($destroyCookie) 
{ 
    unset($_SESSION['username']); 
    unset($_SESSION['password']); 
     
    session_unset();     
    session_destroy();  

    if($destroyCookie){
    setcookie ("username", "",time()-60*60*24*100, "/"); 
    setcookie ("password", "",time()-60*60*24*100, "/"); 
    }
} 
?>