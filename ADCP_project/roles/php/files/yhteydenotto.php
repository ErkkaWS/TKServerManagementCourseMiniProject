<?php
$webhook_url = "https://discord.com/api/webhooks/1499141747085934654/U5DNDebeo_1Hiwo4-nfComUPUhZHupK8lW75gVVGeuupLYCuAu2y0lkmDEPtNAx99xRm";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nimi = htmlspecialchars($_POST["nimi"]);
    $viesti = htmlspecialchars($_POST["viesti"]);
    
    $data = json_encode([
        "content" => "**BINGO BANGO BONGO POIJJAAT! JOKU KÄVI TIIRAILEES TEITÄ**\nSE OLI: $nimi\n JA SE SANO: $viesti"
    ]);
    
    $ch = curl_init($webhook_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
    
    echo "<script>window.location='/';</script>";
    exit;
}
?>
