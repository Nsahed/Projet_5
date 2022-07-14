<?php
declare(strict_types=1);
        
        namespace  App\Controller\Frontoffice;
        
        use App\View\View;
        use App\Service\Http\Response;
        use App\Model\Repository\PostRepository;
        use App\Model\Repository\CommentRepository;
        use App\Service\FormValidator\ContactFormValidator;
        use App\Service\Http\Request;

        final class CommentAdminController
        
           { public function __construct(private PostRepository $postRepository, private View $view)
            {
            }
        
        
            public function listCommentAdminAction()
            {
               var_dump("comment");
               die;
               {
                  $posts = $this->postRepository->findAll();
          
                  return new Response($this->view->render([
                      'template' => 'postlist',
                      'data' => ['posts' => $posts],
                  ]));
                 // 2 soluce : tous comment non validé $
           // : 2 page une avec liste 



            // ajouter post / modifier /supprimer
                  }
                }
    }
        
         
       