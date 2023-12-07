<?php
//--- start session
session_start()	;
//---
if	(!isset($_SESSION["userid"]))
        header("location:./index.php")	;
else{
    unset($_SESSION)	;
    //---
    session_destroy()	;
    //---
    header("location:./index.php")	;
}
//---
return	;

?>