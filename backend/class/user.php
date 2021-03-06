<?php
class User
{
  private $usuario;
  private $nombre;
  private $email;
  private $password;
  private $activado;
  private $initialized = false;
  private $rol;
  private $administrador;
  private $fecha_creacion;

    public function initialize($user)
    {
      $ret_val = false;
      $stmt = DB::GetInstance()->prepare("SELECT * FROM Usuario where Usuario = :username;");
      $stmt->bindValue(':username', $name, PDO::PARAM_STR);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if($stmt->rowCount() == 1)
      {
        $this->usuario = $result[0]["Usuario"];
        $this->nombre = $result[0]["Nombre"];
        $this->email = $result[0]["Email"];
        $this->fecha_creacion = $result[0]["FechaCreado"];
        $this->password = $result[0]["Password"];
        $this->activado = $result[0]["Activado"];
        $this->rol = $result[0]["RolDescripcion"];
        $this->administrador = $result[0]["RolAdministrador"];
        $this->initialized = true;
        $ret_val = true;
      }
      return $ret_val;
    }

    function __construct()
    {

    }

    function isInitialized()
    {
      return $initialized;
    }
    function GetUser()
    {
      return $usuario;
    }
    function GetName()
    {
      return $nombre;
    }
    function GetEmail()
    {
      return $email;
    }

    function GetPassword()
    {
      return $password;
    }

    function IsActive()
    {
      return $activado;
    }

    function GetRolDescription()
    {
      return $rol;
    }
    function IsAdmin()
    {
      return $administrador;
    }

    function GetCreateDate()
    {
      return $fecha_creacion;
    }

}
