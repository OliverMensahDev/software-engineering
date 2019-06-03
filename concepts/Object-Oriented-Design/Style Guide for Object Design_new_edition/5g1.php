<?php 
final class RegisterUserController 
{
  private $registerUser;

  public function __construct(RegisterUser $registerUser)
  {
    $this->registerUser = $registerUser;
  }

  public function __invoke(Request $request)
  {
    $newUser = $this->registerUser->register($request->get('username'));
    return new Response(200, json_encode($newUser));
  }
}