<?php

class User{
    function FetchUser($UserID){
        $UserID = base64_decode($UserID);
        return fetchDataById(
            "tbl_user",
            "PK_ID",
            $UserID,
            connect()
        );
    }
}

?>