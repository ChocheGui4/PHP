<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 08/04/2018
 * Time: 01:59 PM
 */

class UsersModel {

    private $connection;

    public function __construct () {
        $server = '127.0.0.1';
        $dataBase = 'latiem';
        try {
            $this->connection = new PDO(
                "mysql:host=$server;dbname=$dataBase",
                "root", "", array(
                PDO::ATTR_PERSISTENT         => false,
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ));
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getexistunidad($uni) {
        $response = [
            'success' => false,
            'error' => ''
        ];
        try {
            $query = "SELECT * FROM unidades where unidad = '{$uni}'";
            $response['user_data'] = $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
            if (count($response['user_data']) > 0) {//aquiiiiiiiiiii
                $response['success'] = true;
            }
        }  catch (Exception $e) {
            $response['error'] = $e->getMessage();
        }
        return $response;
    }
    public function getexistplacas($placas) {
        $response = [
            'success' => false,
            'error' => ''
        ];
        try {
            $query = "SELECT * FROM unidades where placas = '{$placas}'";
            $response['user_data'] = $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
            if (count($response['user_data']) > 0) {//aquiiiiiiiiiii
                $response['success'] = true;
            }
        }  catch (Exception $e) {
            $response['error'] = $e->getMessage();
        }
        return $response;
    }
    public function getexistCod($cod) {
        $response = [
            'success' => false,
            'error' => ''
        ];
        try {
            $query = "SELECT * FROM conductor where codigov = '{$cod}'";
            $response['user_data'] = $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
            if (count($response['user_data']) > 0) {//aquiiiiiiiiiii
                $response['success'] = true;
            }
        }  catch (Exception $e) {
            $response['error'] = $e->getMessage();
        }
        return $response;
    }

    public function getexistUs($user) {
        $response = [
            'success' => false,
            'error' => ''
        ];
        try {
            $query = "SELECT * FROM conductor where usuario = '{$user}'";
            $response['user_data'] = $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
            if (count($response['user_data']) > 0) {//aquiiiiiiiiiii
                $response['success'] = true;
            }
        }  catch (Exception $e) {
            $response['error'] = $e->getMessage();
        }
        return $response;
    }

    public function getUser($user, $password) {
        $response = [
            'success' => false,
            'error' => ''
        ];
        try {
            $query = "SELECT * FROM conductor where usuario = '{$user}' AND pass = '{$password}'";
            $response['user_data'] = $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
            if (count($response['user_data']) > 0) {//aquiiiiiiiiiii
                $response['success'] = true;
            }
        }  catch (Exception $e) {
            $response['error'] = $e->getMessage();
        }
        return $response;
    }
    public function getUnit($idcond) {
        $response = [
            'success' => false,
            'error' => ''
        ];
        try {
            $query = "SELECT * FROM unidades where idcond = '{$idcond}'";
            $response['user_data'] = $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
            if (count($response['user_data']) > 0) {//aquiiiiiiiiiii
                $response['success'] = true;
            }
        }  catch (Exception $e) {
            $response['error'] = $e->getMessage();
        }
        return $response;
    }
    public function getemail($user) {
        $response = [
            'success' => false,
            'error' => ''
        ];
        try {
            $query = "SELECT * FROM conductor where correo = '{$user}'";
            $response['user_data'] = $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
            if (count($response['user_data']) > 0) {
                $response['success'] = true;

            }
        }  catch (Exception $e) {
            $response['error'] = $e->getMessage();
        }
        return $response;
    }
    public function getRegisterusuarios($name,$app,$apm,$cell,$email,$user,$pass,$cod) {
        $response = [
            'success' => false,
            'error' => ''
        ];
        
        try {
            $query = "UPDATE conductor SET nombre='{$name}', apellidop='{$app}', apellidom='{$apm}', telefono='{$cell}',
            correo='{$email}',usuario='{$user}',pass='{$pass}' WHERE codigov='{$cod}' ";
             
            if ($this->connection->query($query) === true){
                
                //$query2 = "INSERT INTO  unidades(idcond,unidad,placas) values('{$name}','{$app}','{$apm}','{$cell}','{$email}','{$user}','{$pass}')";
                //if($this->connection->query($query2) === true){
                    echo "Conexión exitosa";
                //}
                
            }
        }  catch (Exception $e) {
            echo $e->getMessage();
        }
        return $response;
    }
    public function getRegisterusuariosid($name,$app,$apm,$cell,$email,$user,$pass,$id) {
        $response = [
            'success' => false,
            'error' => ''
        ];
        
        try {
            $query = "UPDATE conductor SET nombre='{$name}', apellidop='{$app}', apellidom='{$apm}', telefono='{$cell}',
            correo='{$email}',usuario='{$user}',pass='{$pass}' WHERE id='{$id}' ";
             
            if ($this->connection->query($query) === true){
                
                //$query2 = "INSERT INTO  unidades(idcond,unidad,placas) values('{$name}','{$app}','{$apm}','{$cell}','{$email}','{$user}','{$pass}')";
                //if($this->connection->query($query2) === true){
                    echo "Conexión exitosa";
                //}
                
            }
        }  catch (Exception $e) {
            echo $e->getMessage();
        }
        return $response;
    }
    public function getRegisterunidades($unidad,$placas,$iduni) {
        $response = [
            'success' => false,
            'error' => ''
        ];
        
        try {
            
             $query = "INSERT INTO unidades(idcond,unidad,placas) VALUES('{$iduni}','{$unidad}','{$placas}')";
            if ($this->connection->query($query) === true){
                
                //$query2 = "INSERT INTO  unidades(idcond,unidad,placas) values('{$name}','{$app}','{$apm}','{$cell}','{$email}','{$user}','{$pass}')";
                //if($this->connection->query($query2) === true){
                    echo "Conexión exitosa";
                //}
                
            }
        }  catch (Exception $e) {
            echo $e->getMessage();
        }
        return $response;
    }
    public function getRegisterunidadesActualizar($unidad,$placas,$iduni) {
        $response = [
            'success' => false,
            'error' => ''
        ];
        
        try {
            
        $query = "UPDATE unidades SET unidad='{$unidad}', placas='{$placas}' WHERE idcond='{$iduni}'";
            if ($this->connection->query($query) === true){
                
                //$query2 = "INSERT INTO  unidades(idcond,unidad,placas) values('{$name}','{$app}','{$apm}','{$cell}','{$email}','{$user}','{$pass}')";
                //if($this->connection->query($query2) === true){
                    echo "Conexión exitosa";
                //}
                
            }
        }  catch (Exception $e) {
            echo $e->getMessage();
        }
        return $response;
    }
    public function getActualizar($id,$name,$app,$apm,$cell,$email,$user,$pass) {
        $response = [
            'success' => false,
            'error' => ''
        ];
        
        try {
            $query = "UPDATE conductor SET nombre='{$name}', apellidop='{$app}', apellidom='{$apm}', telefono='{$cell}',
             correo='{$email}',usuario='{$user}',pass='{$pass}' WHERE id='{$id}' ";
            if ($this->connection->query($query) === true){
                echo "Connected successfully";
            }
        }  catch (Exception $e) {
            echo $e->getMessage();
        }
        return $response;
    }
}