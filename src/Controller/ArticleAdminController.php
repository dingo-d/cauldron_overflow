<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

class ArticleAdminController extends AbstractController
{
  /**
   * @Route("/admin/article/new", name="article_admin")
   * @throws Exception
   */
  public function new(EntityManagerInterface $em)
  {
    $article = new Article();
    $randomNumber = rand(100, 999);
    $article->setTitle("This is a title of the new article no.{$randomNumber}!")
      ->setSlug("this-is-a-title-of-the-new-article-{$randomNumber}")
      ->setContent(<<<EOF
Lorem ipsum dolor sit amet, **consectetur adipiscing** elit. Ut ac lorem gravida, gravida eros pharetra, laoreet diam. Nullam purus tortor, ornare sed faucibus ac, rutrum eu leo. In in felis metus. Nulla augue velit, elementum in consectetur eget, tincidunt ut libero. Vivamus aliquet risus commodo maximus consectetur. Cras tincidunt tellus mi, vel vulputate odio tempor sed. Praesent malesuada tellus id aliquam facilisis. Phasellus in erat neque. Proin vel urna vehicula, lacinia tortor id, pretium magna. Suspendisse malesuada condimentum ligula quis lacinia. Nunc ultrices justo a sagittis varius. Ut efficitur, purus sed cursus tempus, ante purus semper dolor, nec blandit ipsum lectus pharetra mi.

Nulla tincidunt felis in `rutrum aliquet`. Sed ut ante euismod, hendrerit est et, interdum metus. Praesent at sapien ultrices, efficitur lacus in, maximus quam. Mauris justo nibh, facilisis ut leo quis, hendrerit faucibus ante. Etiam vel eleifend ex. Cras in mollis sapien. Nulla arcu nisl, consequat at laoreet eget, tincidunt non libero. Donec volutpat egestas ligula. Integer eget aliquam diam, a ullamcorper purus. Nullam ut placerat magna. Aenean porttitor risus eu diam elementum tincidunt. Sed at lorem nulla. Nulla quis augue ultricies, congue orci laoreet, convallis nisl. Nulla et risus ut nunc commodo tincidunt.  

Nullam dignissim efficitur consequat. Praesent finibus risus non diam _ultricies vehicula_. Ut ornare risus elementum blandit tincidunt. Nunc cursus nunc quis lectus malesuada tempus. Sed sollicitudin dignissim nulla vulputate venenatis. Morbi hendrerit velit tellus, ac accumsan urna aliquet vel. In quis nibh ipsum.

### Random 

Donec tempus, diam gravida consectetur rhoncus, arcu metus scelerisque tortor, hendrerit hendrerit metus tortor in enim. Aenean a malesuada quam, a volutpat sapien. Mauris et quam a magna vehicula ullamcorper. In vestibulum maximus dui, in consectetur sem porttitor sed. Donec nibh purus, tempus sed ligula id, volutpat laoreet ante. Mauris fermentum, purus in posuere volutpat, ante risus scelerisque libero, ac scelerisque elit neque nec quam. Sed sit amet ornare nisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut porttitor fringilla lacus, quis molestie ante. Nulla in nulla sit amet dolor malesuada consectetur in quis justo. Pellentesque id luctus risus. Proin consectetur elit non gravida mattis. Sed id sem vel ipsum commodo rutrum vel vitae est. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit.

Suspendisse commodo sem ut porttitor posuere. Phasellus ullamcorper mollis elit ac blandit. Nam porttitor pretium orci eget facilisis. Etiam nec cursus nisi. Donec vitae congue lacus, et venenatis nulla. Curabitur faucibus cursus ante in bibendum. Sed suscipit elit nec odio dictum congue quis sit amet nibh. Phasellus in interdum nulla. Pellentesque sed justo gravida, ornare est vitae, maximus mauris. Praesent dui massa, maximus congue gravida sed, vulputate in metus. Curabitur sit amet commodo libero, non placerat diam. Integer venenatis eget mi quis imperdiet.
EOF
      );

    // publish most articles
    if (rand(1, 10) > 2) {
      $article->setPublishedAt(new DateTime(sprintf('-%d days', rand(1, 100))));
    }

    $em->persist($article);
    $em->flush();

    return new Response(sprintf(
      'Hiya! New article id: #%d slug: %s',
      $article->getId(),
      $article->getSlug()
    ));
  }
}
