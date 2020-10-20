<?php 
class UserModel{
    private

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=banque_php','root');
    }

    public function get_user_pseudo($db, $pseudo){
        $query = $db->prepare(
            "SELECT * FROM users
            WHERE login = :pseudo"
        );
        $query->execute([
            "pseudo"=>$pseudo
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function get_users():array {
        $query = $this->db->query("
        SELECT * FROM users");
        $user = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($suer as $key => $value){
            $suer[$key] = new User($value);
        }
        return $user;
    }

    public function addUser(User $data){
        $query = $this->db->prepare("
        INSERT INTO users(name, date_creation, login, password)
        VALUES (:name, CURRENT_TIMESTAMP(), :login, :password)");
    }
    $result = $query->execute([
        "name" => $data->getName(),
        "login" =>$data->getLogin(),
        "password" => $data->getPassword()
    ]);
    return $result;
}
?>