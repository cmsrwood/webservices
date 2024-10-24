<?php

require_once '../config/conexion.php';

    class Categoria extends Database{

    public function create_Categoria($body) {
        $conectar = parent::iniciar_conexion();
        parent::set_names();
            
        $sql = "INSERT INTO `categorias` (`cat_nom`, `cat_obs`, `est`) VALUES (:cat_nom, :cat_obs, :est)";
        $sql = $conectar->prepare($sql);
            
        $sql->bindParam(':cat_nom', $body['cat_nom']);
        $sql->bindParam(':cat_obs', $body['cat_obs']);
        $sql->bindParam(':est', $body['est']);
            
        try {
            $resultado = $sql->execute();
            return 'Categoria insertada correctamente';
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function update_Categoria($body) {
        $conectar = parent::iniciar_conexion();
        parent::set_names();
            
        $sql = "UPDATE `categorias` SET `cat_nom` = :cat_nom, `cat_obs` = :cat_obs, `est` = :est WHERE `cat_id` = :cat_id";
        $sql = $conectar->prepare($sql);
            
        $sql->bindParam(':cat_nom', $body['cat_nom']);
        $sql->bindParam(':cat_obs', $body['cat_obs']);
        $sql->bindParam(':est', $body['est']);
        $sql->bindParam(':cat_id', $body['cat_id']);
            
        try {
            $resultado = $sql->execute();
            return 'Categoria actualizada correctamente';
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }
        
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
    public function get_All_By_Order(){
        $conectar = parent::iniciar_conexion();
        parent::set_names();
        $sql="SELECT * FROM `categorias` ORDER BY `categorias`.`cat_nom` ASC";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();
        return $resultado = $sql -> fetchAll((PDO::FETCH_ASSOC));      
    }
    public function count(){
        $conectar = parent::iniciar_conexion();
        parent::set_names();
        $sql="SELECT COUNT(*) FROM categorias;";
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