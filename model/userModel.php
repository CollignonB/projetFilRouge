<?php 
class UserModel{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=banque_php','root');
    }
    // get user information based on is login
    public function get_user_by_login(User $data){
        $query = $db->prepare(
            "SELECT * FROM users
            WHERE login = :login"
        );
        $query->execute([
            "login"=>$data->getLogin();
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // get all users form database
    public function get_users():array {
        $query = $this->db->query("
        SELECT * FROM users");
        $user = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($suer as $key => $value){
            $suer[$key] = new User($value);
        }
        return $user;
    }

    //add a user in database based on a User object
    public function addUser(User $data){
        $query = $this->db->prepare("
        INSERT INTO users(name, date_creation, login, password)
        VALUES (:name, current_timestamp(), :login, :password)");
    }
    $result = $query->execute([
        "name" => $data->getName(),
        "login" =>$data->getLogin(),
        "password" => $data->getPassword()
    ]);
    return $result;
}
?>