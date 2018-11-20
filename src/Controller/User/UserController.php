<?php

namespace App\Controller\User;

use Api\Controller\AbstractController;
use App\Entity\User\User;
use App\Entity\User\UserInterface;
use App\Service\User\UserService;

use Nelmio\ApiDocBundle\Annotation\Model;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

/**
 * Class UserController
 * @package App\Controller\User
 *
 * @Route("/api/users")
 * @SWG\Tag(name="User")
 */
class UserController extends AbstractController
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Creates an User resource
     *
     * @Route(methods={"POST"})
     *
     * @SWG\Parameter(
     *     name="user",
     *     in="body",
     *     @Model(type=User::class, groups={"write", "user-write"})
     * )
     *
     * @SWG\Response(
     *     response="201",
     *     description="User resource created",
     *     @Model(type=User::class, groups={"read", "user-read"})
     * )
     *
     * @SWG\Response(
     *     response="400",
     *     description="Invalid input"
     * )
     *
     * @param Request $request
     * @return UserInterface
     */
    public function post(Request $request): UserInterface
    {
        $user = $request->request->get('user');
        if (!$user instanceof UserInterface) {
            throw new NotFoundHttpException();
        }

        $this->setResponseSerializationGroups(["read", "user-read"]);

        return $this->userService->post($user);
    }
}