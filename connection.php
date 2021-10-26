<?php

        define('db_server','localhost');
        define('db_user','root');
        define('db_password','');
        define('db_name','wedding_planner');
        $conn=@mysqli_connect(db_server,db_user,db_password,db_name) or exit('could not connect to mysqli' . mysqli_connect_errno());

?>        