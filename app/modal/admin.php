<?php

function admin_signIn($phoneNumber, $password){
    //Now static not db
    $admin_phoneNumber = "5532170919";
    $admin_password    = "e10adc3949ba59abbe56e057f20f883e";

    if(($phoneNumber==$admin_phoneNumber) and (md5($password)==$admin_password))
        return 1;
    
    return -1;
}