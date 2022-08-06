<?php
    if(isset($_POST["deleteProject"])) {
        deleteData();

    }
    if(isset($_POST["editProject"])) {
        editData();
    }

    if(isset($_POST["addNew"])) {
        createData(); 
    }
?>