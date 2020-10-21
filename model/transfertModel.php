<?php 
class TransfertModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=banque_php','root');
    }

    // create a new transfert in database
    public function add_new_transfert(Transfert $data, $accountId){
        $query = $this->db->prepare(
            "INSERT INTO transferts (type, amount, account_id, date_transfert)
            VALUES (:typeT, :amount, :account_id, current_timestamp())"
        );
        $query->execute([
            "typeT"=>$data->getType(),
            "amount"=>$data->getAmount(),
            "account_id"=>$accountId
        ]);
    }
} 

?>