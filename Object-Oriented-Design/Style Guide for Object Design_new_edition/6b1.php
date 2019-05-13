<?php 
function changeUserPassword( UserId $userId,string $plainTextPassword  ): void {
  $user = $this->repository->getById($userId);
  $hashedPassword = /** */
  $user->changePassword($hashedPassword);
  $this->repository->save($user);
  $this->mailer->sendPasswordChangedEmail($userId);
}