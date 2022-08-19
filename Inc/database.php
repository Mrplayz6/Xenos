<?php

    session_start();
    
    $host_name  = files.000webhost.com
    $database   = id19439248_cooltoken
    $user_name  = battle-scarred-flak
    $password   = JamesKitt112!

    try {
        $bdd = new PDO('mysql:host='.$host_name.';dbname='.$database, $user_name, $password);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>"; die();
    }
    
    catch(Exception $e)
    {
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
    }
?>
