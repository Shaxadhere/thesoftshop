<?php

class Message {
    function Add($FullName, $Email, $Phone, $Message){
        $FullName = mysqli_real_escape_string(connect(), $FullName);
        $Email = mysqli_real_escape_string(connect(), $Email);
        $Phone = mysqli_real_escape_string(connect(), $Phone);
        $Message = mysqli_real_escape_string(connect(), $Message);

        insertData(
            "tbl_message",
            array(
                "FullName",
                "Email",
                "Phone",
                "Message"
            ),
            array(
                $FullName,
                $Email,
                $Phone,
                $Message
            ),
            connect()
        );
    }
}

?>