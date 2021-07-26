<?php

class Investment{

    function InvCount($id){
        return mysqli_query(
            connect(),
            "SELECT Sum(Amount) from tbl_investment where FK_User = $id"
        );
    }

    function List(){
        return fetchData(
            "tbl_investment",
            connect()
        );
    }

    function Add($Amount, $Reason, $FK_User){
        insertData(
            "tbl_investment",
            array(
                "Amount",
                "Reason",
                "FK_User"
            ),
            array(
                $Amount,
                $Reason,
                $FK_User
            ),
            connect()
        );
    }

    function View($id){
        return fetchDataById(
            "tbl_investment",
            "PK_ID",
            $id,
            connect()
        );
    }

    function Edit($id, $Amount, $Reason, $FK_User){
        editData(
            "tbl_investment",
            array(
                "Amount",
                $Amount,
                "Reason",
                $Reason,
                "FK_User",
                $FK_User
            ),
            "PK_ID",
            $id,
            connect()
        );
    }

    function Delete($id){
        deleteDataById(
            "tbl_investment",
            "PK_ID",
            $id,
            connect()
        );
    }
}

?>
