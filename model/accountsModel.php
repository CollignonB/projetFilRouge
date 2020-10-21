<?php 
class AccountModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=banque_php','root');
    }

    //get all accounts datas
    public function get_accounts(User $data){

        $query = $this->db->prepare(
            "SELECT a.id AS account_ID, a_t.name, a.montant, t.type, t.amount AS transfert_amount, t.date_transfert
            FROM accounts AS a
            INNER JOIN transferts AS t
            ON a.id = t.account_id
            INNER JOIN account_types AS a_t
            ON a_t.id = a.account_type_id
            WHERE a.user_id = :user_id && t.id = (
                SELECT MAX(t2.id)
                FROM transferts AS t2
                WHERE t2.account_id = a.id)
            ORDER BY a.id"
        );
        $query->execute([
            "user_id"=> $data->getId()
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //get an account based on his id
    public function get_account($id){
        $query = $this->db->prepare(
            "SELECT * FROM accounts
            WHERE id = :accountid"
        );
        $query->execute([
            "accountid" => $id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // add a new account based on a Account Object
    public function add_new_account(Account $account){
        $query = $db->prepare(
            "INSERT INTO accounts (date_crea, user_id, account_type_id, montant)
            VALUES (current_timestamp(), :userId, :account_type_id, :montant)"
          );
          
          $query->execute([
              "userId" => $account->getUser()->getId(),
              "account_type_id" => $account->getType(),
              "montant" => $account->getAmount()
              ]);
        }
            
        function update_amount(Account $account, float $new_amount){
            $request = $db->prepare(
                "UPDATE accounts SET montant = :newAmount WHERE accounts.id = :accountId"
            );
                $request->execute([
                "newAmount"=>$new_amount,
                "accountId"=>$account->getId()
                ]);
            }
                
        function delete_account($db, $account_id){
            $query = $db->prepare(
            "DELETE FROM accounts
            WHERE id = :account_ID"
            );
        
            $query->execute([
                "account_ID"=>$account_id
                ]);
        }

        public function get_last_operations($db, $account_id){
            $query = $db->prepare(
                "SELECT t.type, t.amount, t.date_transfert FROM `transferts` as t 
                INNER JOIN accounts as a ON a.id = t.account_id 
                INNER JOIN account_types as a_t ON a_t.id = a.account_type_id 
                WHERE a.id = :userId 
                ORDER BY date_transfert DESC;"
              );
                
              $query->execute([
                "userId" => $account_id
              ]);
                
              return $query->fetchAll(PDO::FETCH_ASSOC);
        }
}