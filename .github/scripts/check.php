<?php

// Vérifie que le script est exécuté en CLI
if (php_sapi_name() !== 'cli') {
    die("Ce script doit être exécuté en ligne de commande.\n");
}

$rules = [
    "site" => ["html", "php"],
    "img"  => ["png", "jpg"],
    "css"  => ["css"],
    "js"   => ["js"]
];

$hasError = false;

foreach ($rules as $folder => $allowedExtensions) {

    if (!is_dir($folder)) {
        echo "❌ Dossier manquant : $folder\n";
        $hasError = true;
        continue;
    }

    $files = scandir($folder);

    foreach ($files as $file) {

        if ($file === "." || $file === "..") {
            continue;
        }

        $path = $folder . DIRECTORY_SEPARATOR . $file;

        if (is_dir($path)) {
            continue;
        }

        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions)) {
            echo "❌ Fichier non autorisé : $path\n";
            $hasError = true;
        }
    }
}

if (!$hasError) {
    echo "✔ Tout est conforme.\n";
    exit(0); // Succès
} else {
    exit(1); // Erreur
}