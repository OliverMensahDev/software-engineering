<?php


use PHPUnit\Framework\TestCase;
use testapp\presentation\UserModel;
use testapp\sharedObjects\Person;



class UserModelTest extends TestCase
{

    public function testGetPeople()
    {
        $repository = \Mockery::mock('testapp\repositories\IPerson');
        $repository->shouldReceive('getPeople')
        ->once()
        ->andReturn([new Person("Oliver Mensah", "Male", 24), new Person("Geddy Addo", "Female", 21)]);
        
        $userModel = new UserModel($repository);
         // Verify
        $this->assertEquals([new Person("Oliver Mensah", "Male", 24), new Person("Geddy Addo", "Female", 21)], $userModel->getPeople());
    }
}