<?php 
final class RegisterUserController 
{
  private $registerUser;
  private $userRepository;
  private $userReadModelRepository;

  public function __construct(
    UserRepository $userRepository,
    RegisterUser $registerUser,
    UserReadModelRepository $userReadModelRepository)
  {
    $this->userRepository = $userRepository;
    $this->registerUser = $registerUser;
    $this->userReadModelRepository = $userReadModelRepository;
  }

  public function __invoke(Request $request)
  {
    $userId = $this->userRepository->nextIdentifier();
    /*
    * `register()` is a command method:
    */  
    $this->registerUser->register($request->get('username'));

    /*
    * `getById()` is a query method:
    */
    $newUser = $this->userReadModelRepository->getById($userId);

    return new Response(200, json_encode($newUser));
  }
}