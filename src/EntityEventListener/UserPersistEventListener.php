<?php

namespace App\EntityEventListener;

use App\Entity\User;


class UserPersistEventListener{
        // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    private $encryptSecret;
        // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //
    public function __construct(string $encriptSecret){
    $this->encryptSecret = $encriptSecret;
}
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function prePersist(User $user):void{
        // on déclare l'algorithme de cryptage - aide: doctrine-project.org/projects/doctrine-orm/en/2.16/reference/events.html
        $cypher = "aes-256-gcm"; // aide: levelup.gitconnected.com/encryption-in-php-cf3ca98f4287
        $key = $this->encryptSecret;
        // On crée une clé d'encryption spécifique à l'utilisateur
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cypher));
        // On ajoute la clé d'encryption (iv) à l'utilisateur
        $user->setSecretIv(base64_encode($iv)); // on encode en base64 pour pouvoir le stocker en BDD parceque le clé contient des caractères spéciaux instockables dans une BDD
        // On crypte le prénom de l'utilisateur
        if(!is_null($user->getLastname())){
            $lastname = $user->getLastname();
            $lastnameCrypte = openssl_encrypt($lastname, $cypher, $key, 0, $iv, $tag);
            $finalLastnameCrypte = base64_encode($tag.$lastnameCrypte);
            $user->setLastname($finalLastnameCrypte);
        }
        // On crypte le nom de l'utilisateur
        if(!is_null($user->getName())){
            $name = $user->getName();
            $nameCrypte = openssl_encrypt($name, $cypher, $key, 0, $iv, $tag);
            $finalNameCrypte = base64_encode($tag.$nameCrypte);
            $user->setNom($finalNameCrypte);
        }

    }

}