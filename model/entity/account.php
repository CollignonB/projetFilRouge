<?php 

class Account {

    protected int $id;
    protected int $montant;
    protected User $user;
    protected string $date_crea;
    protected string $account_type_id;
    
    public function setMontant(int $amount){
        $this->montant = $amount;
    }

    public function setDate_crea(string $date_crea){
        $this->date_crea = $date_crea;
    }
    public function setUser($data){
        $this->user = new User($data);
    }
    public function setAccount_type_id($id){
        $this->account_type_id = $id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getAmount() {
        return $this->montant;
    }
    public function getDate() {
        return $this->date_crea;
    }
    public function getType() {
        return $this->accountType;
    }
    public function getUser(){
        return $this->user;
    }
    public function getAccount_type_id(){
        return $this->account_type_id;
    }
    public function getId(){
        return $this->id;
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

    public function changeAccount_type(){
        switch ($this->account_type_id) {
            case 1:
                return "PEL";
            case 2: 
                return "Livret A";
            case 3:
                return "PER";
            case 4:
                return "Compte Courant";
          }
    }
}