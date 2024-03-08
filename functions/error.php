<?php
require_once __DIR__ ."/../classes/CategoryError.php";
function categoryErrorMessage(int $errorCode) : string 
{
    switch($errorCode) 
    { 
        case CategoryError::NAME_REQUIRED : 
            $errorMsg = "Le nom est obigatoire" ; break;
        default : 
            $errorMsg  = "une erreur est survenu" ; break;
    } 
    return $errorMsg;

    //return match($errorCode) {
    //    1 => "Le nom est obigatoire";
    //    default =>"une erreur est survenu";
    //}
}