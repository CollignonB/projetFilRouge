<?php 

    function get_accounts($db, $user_id){
        $query = $db->prepare(
            "SELECT a.id, a_t.name, a.montant FROM `account_types` as a_t
            INNER JOIN accounts as a 
            ON a_t.id = a.account_type_id
            INNER JOIN users as u
            ON u.id = a.user_id
            Where u.id = :userid
            ORDER BY a.id"
          );
          $query->execute([
            "userid" => $user_id
          ]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_account($db, $account_id){
        $query = $db->prepare(
            "SELECT * FROM accounts
            WHERE id = :accountid"
        );
        $query->execute([
            "accountid" => $account_id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function get_last_operations($db, $user_id){
        $query = $db->prepare(
            "SELECT t.type, t.amount, t.date_transfert FROM `transferts` as t 
            INNER JOIN accounts as a ON a.id = t.account_id 
            INNER JOIN account_types as a_t ON a_t.id = a.account_type_id 
            WHERE a.id = :userId 
            ORDER BY date_transfert DESC;"
          );
          
          $query->execute([
            "userId" => $user_id
          ]);
          
          return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function add_new_account($db, $user_id, $account_type, $amount){
        $query = $db->prepare(
            "INSERT INTO accounts (date_crea, user_id, account_type_id, montant)
            VALUES (current_timestamp(), :userId, :account_type_id, :montant)"
          );
        
          $query->execute([
            "userId" => $user_id,
            "account_type_id" => $account_type,
            "montant" => $amount
          ]);
    }

    function update_amount($db, $new_amount, $account_id){
        $request = $db->prepare(
            "UPDATE accounts SET montant = :newAmount WHERE accounts.id = :accountId"
        );
        $request->execute([
            "newAmount"=>$new_amount,
            "accountId"=>$account_id
        ]);
    }
// trouver un moyen de selectionner l'id du compte
    function getLastOp($db, $user_id){
        $query = $db->prepare(
            "SELECT a.id AS account_ID, a_t.name, a.montant, t.type, t.amount as transfert_amount, t.date_transfert FROM `account_types` as a_t
            INNER JOIN accounts as a 
                ON a_t.id = a.account_type_id
            INNER JOIN users as u
                ON u.id = a.user_id
            LEFT JOIN (SELECT t.type, t.amount, t.date_transfert, t.account_id FROM `transferts` as t 
              INNER JOIN accounts AS a ON a.id = t.account_id
              ORDER BY date_transfert DESC
              LIMIT 1) AS t ON t.account_id = a.id  
            Where u.id = :user_id
                ORDER BY a.id"    
        );
        $query->execute([
            "user_id"=> $user_id
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
?>