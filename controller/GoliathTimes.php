<?php

include_once 'Connection.php';

class GoliathTimes extends connection{

    // public function __construct($nome)
    // {
    //     $this->nome = $nome;
    // }
    
    public function getAllTimes(){

        $connection = new connection();
        $con = $connection->OpenCon();

        $query = "SELECT * FROM VW_GOLIATH_TIMES;";

        $result = $con->query($query);

        $connection->CloseCon($con);

        return $result;
    }
    
    public function setTime($nmVhc, $hrTempo, $qtClasse){
        
        $connection = new connection();
        $con = $connection->OpenCon();

        $classe = $this->defineClass($qtClasse);
        
        $query = "INSERT INTO TB_GOLIATH_TIMES 
                (NM_VHC, HR_TEMPO_VHC, NM_CLASSE_VHC, QT_CLASSE_VHC) VALUES
                ('$nmVhc', '$hrTempo', '$classe', $qtClasse);";
var_dump($query);
        mysqli_query($con, $query);
        $connection->CloseCon($con);
    }

    public function defineClass($qtClasse){
        switch(true) {
            case in_array($qtClasse, range(999,999)): 
               return "X";
            break;
            case in_array($qtClasse, range(901,998)):
                return "S2";
            break;
            case in_array($qtClasse, range(801,900)):
                return "S1";
             break;
             case in_array($qtClasse, range(701,800)):
                 return "A";
              break;
              case in_array($qtClasse, range(601,700)): 
                  return "B";
               break;
               case in_array($qtClasse, range(501,600)):
                   return "C";
                break;
                case in_array($qtClasse, range(100,500)):
                    return "D";
                 break;
         }
    }
}
