<?php

class UsuarioDAO {
    
    // Contendor de la conexión
    var $db;
    
    function __construct(&$db){

        $this->db = $db;

    }

    
    function __destruct() {
        
        
    }
    
    function Validar(&$vo) {       

        $query  = "SELECT * FROM usuarios
                    WHERE login='{$vo->login}'
                    AND clave='".md5($vo->clave)."'";

        $rs     = $this->db->query($query);

        if ($rs->rowCount() == 0) 
            throw new Exception('Usuario / Contraseña incorrectos<br>');
        else
        {

            $row = $rs->fetch();
            $vo->nombre = $row['nombre'];

        }    
    }
    
    function Insertar(&$vo) {               

        $query  = "INSERT INTO 
                      usuarios(nombre,login,clave)
                   VALUES
                    ('{$vo->nombre}','{$vo->login}',
                     '".md5($vo->clave)."')";

        if (!$this->db->query($query))
            throw new Exception('Fallo al insertar!' . $query);
            
    }
    
    function Modificar(&$vo) {       

        $query  = "UPDATE 
                    usuarios 
                   SET nombre = '{$vo->nombre}',
                       login = '{$vo->login}',
                       clave = '".md5($vo->clave)."'
                   WHERE cod_usuario = ".$vo->cod_usuario;

        if (!$this->db->query($query))
            throw new Exception('Fallo al actualizar!');
            
    }
    
    function Eliminar(&$vo){

        $query = "DELETE FROM usuarios 
                    WHERE cod_usuario={$vo->cod_usuario}";

        if (!$this->db->query($query))
            throw new Exception('Fallo al eliminar!');

    }
    
    function Mostrar()
    {
        $query = "SELECT cod_usuario, nombre, login FROM usuarios";               
        $data = $this->db->query($query);

        if(!$data){
            throw new Exception('Falla al mostrar los usuarios');
        }        
        else{
            return $data;
        }            
    }    
    
    function mostrarUsuario(&$vo)
    {        
        $query = "SELECT * FROM usuarios WHERE cod_usuario={$vo->cod_usuario}";
        $data = $this->db->query($query);
        
        if(!$query){
            throw new Exception('Falla al mostrar el usuario');
        }
        else{
            return $data;
        }
    }
    
    function existeLogin(&$vo)
    {
        
        $query = "SELECT * FROM usuarios WHERE login='$vo->login'";
        $result = $this->db->query($query);
        
        if($result->fetchColumn() == 0){
            return false;
        }
        else
        {
            return true;
        }        
    }
    
}
?>