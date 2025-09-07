<?php
$lösenord = $_POST['lösenord'];
if ($lösenord !== 'hemligt123') {
    die('Fel lösenord!');
}

$data = [
    'namn' => $_POST['namn'],
    'innehall' => $_POST['innehall'],
    'pris' => $_POST['pris'],
    'kategori' => $_POST['kategori']
];

$fil = 'produkter.json';
$produkter = [];

if (file_exists($fil)) {
    $produkter = json_decode(file_get_contents($fil), true);
}

$produkter[] = $data;
file_put_contents($fil, json_encode($produkter, JSON_PRETTY_PRINT));
header('Location: admin.html');
?>
