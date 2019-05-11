<?php 

// model

class User
{
    private $name;
    private $age;
    private $sex;
    private $id;

    public function __construct($name, $age, $sex, $id)
    {
        $this->age = $age;
        $this->name = $name;
        $this->sex = $sex;
        $this->id = $id;
    }
}

// database
class DataSource{
    
    public function __construct()
    {
        $this->db = array();
    }

    public function store(User $user)
    {
        array_push($this->db, $user);
    }

    public function resultset(): array
    {
        return  array_values($this->db);
    }
}


interface UserRepositoryInterface
{
    public function add(User $user);
    public function search($name);
    public function getUsers();
    public function getAllByUser($id);
}


class UserRepository implements UserRepositoryInterface
{
    private $ds;

    public function __construct(DataSource $ds)
    {
        $this->ds = $ds;
    }
    public function add(User $user)
    {
        $this->ds->store($user);
    }
    public function search($name)
    {
        $users = $this->getUsers();
        foreach($users as $user){
            if($user->name == $name){
                return $user;
            }else{
                return "No User Found";
            }
        }
    }
    public function getUsers(): array
    {   
        return $this->ds->resultset();
    }
    public function getAllByUser($id)
    {
        return $this->ds->single($id);
    }
}


class Controller
{
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function addUser(User $user){
        $this->repo->add($user);
    }

    public function sendUsers(){
        return $this->repo->getUsers();
    }

}



$ds = new DataSource();
$ctr = new Controller(new UserRepository($ds));
$ctr->addUser(new User("Oliver Mensah", 26, "Male", 1));
$ctr->addUser(new User("Nana Addo", 26, "Male", 1));
 var_dump($ctr->sendUsers());

