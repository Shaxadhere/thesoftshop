<?php

class Withdrawl{

    function WithdrawlCount($id){
        $id = base64_decode($id);
        $id = mysqli_real_escape_string(connect(), $id);
        return mysqli_query(
            connect(),
            "SELECT Sum(Amount) as Amount from tbl_withdrawls where UserID = $id"
        );
    }

    function List(){
        return fetchData(
            "tbl_withdrawls",
            connect()
        );
    }

    function Add($Amount, $UserID){
        $Amount = mysqli_real_escape_string(connect(), $Amount);
        $UserID = mysqli_real_escape_string(connect(), $UserID);
        insertData(
            "tbl_withdrawls",
            array(
                "Amount",
                "UserID"
            ),
            array(
                $Amount,
                $UserID
            ),
            connect()
        );
    }

    function View($id){
        $id = base64_decode($id);
        $id = mysqli_real_escape_string(connect(), $id);
        return fetchDataById(
            "tbl_withdrawls",
            "PK_ID",
            $id,
            connect()
        );
    }

    function Edit($id, $Amount, $UserID){
        $id = base64_decode($id);
        $id = mysqli_real_escape_string(connect(), $id);
        $Amount = mysqli_real_escape_string(connect(), $Amount);
        $UserID = mysqli_real_escape_string(connect(), $UserID);
        editData(
            "tbl_withdrawls",
            array(
                "Amount",
                $Amount,
                "UserID",
                $UserID
            ),
            "PK_ID",
            $id,
            connect()
        );
    }

    function Delete($id){
        $id = base64_decode($id);
        $id = mysqli_real_escape_string(connect(), $id);
        deleteDataById(
            "tbl_withdrawls",
            "PK_ID",
            $id,
            connect()
        );
    }
}

?>
