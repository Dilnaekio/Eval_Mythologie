<?php
include "pdo.php";

// REQUETES USERS -----------------------------------------------------------------------------------------------------------------------------------------------------

// Fonction ajoutant un nouvel utilisateur
function addUser($pseudo, $mail, $img, $mdp)
{
    $db = getBDD();

    $hashMdp = password_hash($mdp, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO users (name_user, mail_user, img_user, mdp_user) VALUES (:name_user, :mail_user, :img_user, :mdp_user);";
        $req = $db->prepare($sql);

        $req->execute([
            ":name_user" => $pseudo,
            ":mail_user" => $mail,
            ":img_user" => $img,
            ":mdp_user" => $hashMdp,
        ]);
    } catch (PDOException $e) {
        echo $e->getMEssage();
        return false;
    }
}

// Fonction qui vérifie si l'utilisateur existe et retourne les infos
function getUserInfos($pseudo)
{
    $db = getBDD();

    try {
        $sql = "SELECT * FROM users WHERE name_user = :name_user";
        $req = $db->prepare($sql);

        $req->execute([":name_user" => $pseudo]);
        $data = $req->fetch(PDO::FETCH_OBJ);

        if (empty($data)) {
            // Le pseudo n'existe pas
            return false;
        } else {
            // L'utilisateur existe, renvoie ses infos
            return $data;
        }
    } catch (PDOException $e) {
        echo $e->getMEssage();
        return false;
    }
}

// Fonction qui vérifie si l'utilisateur existe et retourne les infos
function checkUserExist($pseudo)
{
    $db = getBDD();

    try {
        $sql = "SELECT * FROM users WHERE name_user = :name_user";
        $req = $db->prepare($sql);

        $req->execute([":name_user" => $pseudo]);
        $data = $req->fetch(PDO::FETCH_OBJ);

        if (empty($data)) {
            // Le pseudo n'existe pas
            return false;
        } else {
            // Le pseudo existe
            return true;
        }
    } catch (PDOException $e) {
        echo $e->getMEssage();
        return false;
    }
}

function getUserId($pseudo)
{
    $db = getBDD();

    try {
        $sql = "SELECT id_user from users where name_user = :name_user";
        $req = $db->prepare($sql);

        $req->execute([":name_user" => $pseudo]);
        $data = $req->fetch(PDO::FETCH_OBJ);

        return $data;
    } catch (PDOException $e) {
        echo $e->getMEssage();
        return false;
    }
}

// Fonction qui vérifie si le mail est déjà pris
function checkMailTaken($mail)
{
    $db = getBDD();

    try {
        $sql = "SELECT * FROM users where mail_user = :mail_user";
        $req = $db->prepare($sql);

        $req->execute([":mail_user" => $mail]);
        $data = $req->fetch(PDO::FETCH_OBJ);

        if (empty($data)) {
            // Le mail est libre
            return false;
        } else {
            // Le mail n'est pas libre
            return true;
        }
    } catch (PDOException $e) {
        echo $e->getMEssage();
        return false;
    }
}

// Fonction pour supprimer un utilisateur choisi
function deleteUser($pseudo)
{
    $db = getBDD();

    try {
        $sql = "DELETE FROM users WHERE name_user = :name_user";
        $req = $db->prepare($sql);
        $req->execute([":name_user" => $pseudo]);
    } catch (PDOException $e) {
        return $e->getMEssage();
    }
}

function checkUserRank($pseudo)
{
    $db = getBDD();

    try {
        $sql = "SELECT * FROM users WHERE name_user = :name_user";
        $req = $db->prepare($sql);

        $req->execute([":name_user" => $pseudo]);
        $data = $req->fetch(PDO::FETCH_OBJ);

        if (empty($data)) {
            // Le pseudo n'existe pas
            return false;
        } else {
            // Le pseudo existe donc retourner le rang de l'utilisateur
            // TODO : au lieu de retourner "true", il faut que je renvoie le rang de l'utilisateur. Pour le moment je retourne juste DATA car il faut que je me rappelle comment chopper la propriété rank
            return $data;
        }
    } catch (PDOException $e) {
        echo $e->getMEssage();
        return false;
    }
}

// REQUETES ARTICLES -----------------------------------------------------------------------------------------------------------------------------------------------------
// Fonction pour ajouter un article sur la BDD
// TODO : ajouter l'auteur lors de la création => passer la FOREIGN KEY pour lier l'article au bon auteur
function addArticle($title, $sum, $content, $author)
{
    $db = getBDD();

    try {
        $sql = "INSERT INTO articles (name_article, sum_article, content_article, id_user) VALUES (:name_article, :sum_article, :content_article, :id_user);";
        $req = $db->prepare($sql);

        $req->execute([
            ":name_article" => $title,
            ":sum_article" => $sum,
            ":content_article" => $content,
            ":id_user" => $author
        ]);
    } catch (PDOException $e) {
        echo $e->getMEssage();
        return false;
    }
}

// Fonction pour récupérer un article sur lequel l'utilisateur aura cliqué
// Je recherche l'auteur + la date car le titre pourrait très bien être utilisé plusieurs fois. Donc cela me renverrait plusieurs résultats alors que la date sera unique
function getArticle($author, $date)
{
    $id = getUserId($author);
    $db = getBDD();

    try {
        // TODO : vérifier que ma requête fonctionne correctement avec l'intégration d'une variable + la bonne récupération id_user pour les deux
        $sql = "SELECT * from articles where creation_date_article = :creation_date;" + "SELECT * from articles INNER JOIN users ON (articles.id_user =:article_id_user) = (users.id_user =:user_id_user);";
        $req = $db->prepare($sql);
        $req->execute(
            [
                ":creation_date" => $date,
                ":article_id_user" => "article.$id",
                ":user_id_user" => "users.$id"
            ]
        );
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
