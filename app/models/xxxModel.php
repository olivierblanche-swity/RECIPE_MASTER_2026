<?php


function findAll(PDO $connexion) {
    /* requete SQL */ 
    $sql = "SELECT * FROM xxx";
    $rs = $connexion->query($sql);
    $xxx = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $xxx;
       
}

function findOneByID(PDO $connexion, /* int */ string $id) : array /* array comme ca on type le return */{  

    /**
     * ?  requete SQL attention ceci est un exemple 
     * */
    
    
    $sql = "SELECT * 
            FROM xxx
            JOIN xxx ON p.xxx_id = a.id
            JOIN xxx  ON p.xxx_id = c.id
            WHERE p.id = :id;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_STR);
    $rs->execute();
    $xxx = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $xxx;
   // return $xxx;
}