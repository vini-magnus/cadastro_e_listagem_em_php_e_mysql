<?php



class User extends Conn
{
    public object $conn;
    public array $formData;

    public function list() :array
    {
        $this->conn = $this->connectDb();
        $query_usarios = "SELECT id, name, email FROM users ORDER BY id DESC LIMIT 40";        
        //prepara a query e atribui para uma variavel $result_usuarios
        $result_usuarios = $this->conn->prepare($query_usarios);

        //depois da query preparada podemos executá-la 
        $result_usuarios->execute();

        //após executar podemos ler o valor com o fetchAll() e depois de ler atribuir para uma variável e ler ela com um var_dump()
        $retorno = $result_usuarios->fetchAll();
         
         return $retorno;
    
    }

    public function create(): bool
    {
        //var_dump($this->formData);
        $this->conn = $this->connectDb();
        $query_user = "INSERT INTO users (name, email, created) VALUES (:name, :email, NOW())";
        $add_user = $this->conn->prepare($query_user);

        $add_user->bindParam(':name', $this->formData['name']);
        $add_user->bindParam(':email', $this->formData['email']);
        
        $add_user->execute();

        if ($add_user->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
}
