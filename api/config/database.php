<?php
class Database{



    public function getConnection() {
        $db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=dbkij3sfomg5mf user=lybhospqqudnuy password=9ab37317d12919bdfdd3c607c3f02d3ec7f6cf8875137033c447502f3316112c");

        if ($db_handle) {

            // echo 'Connection attempt succeeded.';
            
            } else {
            
            // echo 'Connection attempt failed.';
            
            }
        return $db_handle;
    }

}
