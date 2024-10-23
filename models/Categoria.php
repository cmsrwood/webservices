<?php

require_once '../config/conexion.php';

    class Categoria extends Database{
    public function get_Categoria($est){
        $conectar = parent::iniciar_conexion();
        parent::set_names();
        $sql="SELECT * FROM categorias where est= '$est'";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();
        return $resultado = $sql -> fetchAll((PDO::FETCH_ASSOC));      
    }
    public function get_All(){
        $conectar = parent::iniciar_conexion();
        parent::set_names();
        $sql="SELECT * FROM categorias";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();
        return $resultado = $sql -> fetchAll((PDO::FETCH_ASSOC));      
    }
    public function get_Categoria_By_Id($id){
        $conectar = parent::iniciar_conexion();
        parent::set_names();
        $sql= "SELECT * FROM categorias where cat_id= '$id'";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();
        return $resultado = $sql -> fetchAll((PDO::FETCH_ASSOC));  
    }
    public function delete_Categoria($id){
        $conectar = parent::iniciar_conexion();
        parent::set_names();
        $sql= "DELETE FROM categorias where cat_id = '$id'";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();
        return $resultado = $sql -> fetchAll((PDO::FETCH_ASSOC));      
    }
}
?>