<?php 

    function get_user_pseudo($db, $pseudo){
        $query = $db->prepare(
            "SELECT * FROM users
            WHERE login = :pseudo"
        );
        $query->execute([
            "pseudo"=>$pseudo
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    } 

?>