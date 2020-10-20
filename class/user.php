<?php 
class User{
    protected int $id;
    protected string $name;
    protected string $date_crea;
    protected string $login;
    protected string $password;
    
    public function setId(int $id){
        $this->id = $id;
    }
    public function setName(string $name){
        $this->name = $name;
    }
    public function setDate_crea(string $date){
        $this->date_crea = $date;
    }
    public function setLogin(string $login){
        $this->login = $login;
    }
    public function setPassword(string $password){
        $this->password = $password;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDate_crea(){
        return $this->date_crea;
    }
    public function getLogin(){
        return $this->login;
    }
    public function getPassword(){
        return $this->password;
    }

    private function hydrate(array $data){
        foreach($data as $key => $value){
            $method  = "set" . ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
    
    public function __construct(array $data){
        $this->hydrate($data);
    }

    //function that allow user to connect to sthe site
    //return error messageif wrong login/password couple
    //maybe use a method of userModel to get login/password
    public function connection (string $login, string $password){
        if ($this->login === $login && $this->password === $password){
            $_SESSION["user"] = $this;
            header("location:index.php");
        }else{
            return "Identifiant ou mot de passe incorect";
        }
    }
}