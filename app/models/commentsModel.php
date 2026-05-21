<?php

namespace App\Models\CommentsModel;

use \PDO;

function findCommentsByRecipeId(PDO $connexion, int $id): array
{
    $sql = "SELECT c.id AS comment_id, c.content AS comment_content, c.created_at AS comment_created_at, u.name AS user_name, u.picture AS user_picture,
            (SELECT COUNT(*) FROM comments WHERE recipe_id = :id) AS comment_count
            FROM comments c
            JOIN users u ON c.user_id = u.id
            WHERE c.recipe_id = :id
            ORDER BY c.created_at DESC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $comments = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $comments;
}
