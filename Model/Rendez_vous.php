<?php 
class Rendez_vous {

    private  $CIN_Etudiant = null;
    //private  $Emplacement = null;
    private  $email = null;
    private  $Description_rv = null ;


    public function __construct(string $CIN_Etudiant , string $email, string $Description_rv)
    {
        $this->CIN_Etudiant = $CIN_Etudiant;
       // $this->Emplacement = $Emplacement ;
        $this->email = $email ;
        $this->Description_rv = $Description_rv;
    }


    function getCIN_Etudiant(){
        return $this->CIN_Etudiant;
    }
    /*function getEmplacement(){
        return $this->Emplacement;
    }*/
    function getEmail(){
        return $this->email;
    }
    function getDescription_rv(){
        return $this->Description_rv;
    }


    function setCIN_Etudiant(string $CIN_Etudiant){
        $this->CIN_Etudiant=$CIN_Etudiant;
    }
    
    /*function setEmplacement(string $Emplacement){
        $this->Emplacement=$Emplacement;
    }*/

    function setEmail(string $email){
        $this->email=$email;
    }

    function setDescription_rv(string $Description_rv){
        $this->Description_rv=$Description_rv;
    }

    
   
}
?>