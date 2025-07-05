<?php
date_default_timezone_set("asia/kolkata");
define("FILENAME",$_SERVER['DOCUMENT_ROOT']."/jay_solanki_php/PHP/register_session/error.log");
define("ISDEBUG",true);
define("SERVER","localhost:3308");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","software");
function LogError($error)
{
    $ErrorDateTime=date("D d-m-Y h:i:s A");
    $code=$error->getCode();
    $message=$error->getMessage();
    $line=$error->getLine();
    $file=$error->getFile();
    $ErrorMessage="\n Error Code $code ErrorDetail $message on $ErrorDateTime in file at lineno. $line";
    file_put_contents(FILENAME,$ErrorMessage,FILE_APPEND|LOCK_EX);
    if(ISDEBUG==true)
        echo $ErrorMessage;
    else
        echo "opps, somthing went wrong, we are tring to findout problem please come after sometime";
    exit();
}
$db=null;
try{
    $db=new PDO("mysql:host=".SERVER.";dbname=".DATABASE,USERNAME,PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $error){
    LogError($error);
}
?>