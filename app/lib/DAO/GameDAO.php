<?php

class GameDAO {
    
    // Contendor de la conexión
    var $db;
    
    function __construct(&$db){
        $this->db = $db;
    }

    function __destruct() {}
    
    function Insert(&$vo) {        
        $query  = "INSERT INTO 
                      game(action, response, user, game_id)
                   VALUES
                    ('{$vo->action}','{$vo->response}', '{$vo->user}', '{$vo->game_id}')";

        if (!$this->db->query($query))
            throw new Exception('Row save fail!' . $query);
            
    }
    
}
?>