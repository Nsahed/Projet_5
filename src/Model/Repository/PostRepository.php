<?php

declare(strict_types=1);

namespace App\Model\Repository;

use App\Model\Entity\Post;
use App\Service\Database;
use PDO;

final class PostRepository
{   
    private PDO $databaseConnection;

    public function __construct(Database $database)
    {
        $this->databaseConnection = $database->getPDO();
    }


    public function findOneBy(array $criteria, array $orderBy = null): ?Post
    {
       /* $statement = $this->databaseConnection->prepare('select * from post where id=:id_post');
        $this->statement->execute($criteria);*/var_dump($criteria);
        die;
        $statement = $this->databaseConnection->prepare('select * from post where id=:id_post');
        $data = $statement->execute($criteria);
    
        /*$req = $this->databaseConnection->prepare('select * from post where id=:id_post');
        $this->req->execute($criteria);
        var_dump($criteria);
        die;*/
       
       return $data === null ? $data : new Post($data['id_post'], $data['title'], $data['content']);
    }

    public function findAll(): ?array
    {
        $postData = [];
        //$this->databaseConnection->getPDO();
        $req = $this->databaseConnection->prepare('SELECT * FROM post ORDER BY update_at DESC ');
        $req->execute();
        $postData = $req->fetchAll();
       
        if (count($postData)  === 0 ) {
            return null;
        }

        
        $posts = [];
        foreach ($postData as $post) {
            $posts[] = new Post((int)$post['id_post'], $post['title'], $post['content']);
        }
        return $posts;
    }
    

    }
 




