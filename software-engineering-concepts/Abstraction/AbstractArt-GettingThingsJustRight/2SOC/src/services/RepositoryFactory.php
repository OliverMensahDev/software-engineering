<?php 

namespace App\Services;

use Exception;

class RepositoryFactory
{
  public static function create(string $repoType): Repository
  {
    switch ($repoType) {
      case 'InternalData':
        return new InternalDataRepository();
        break;
      case 'SQL':
        $db = new Database();
        $repo = new DatabaseRepository($db->get());
        $db->close();
        return $repo;
        break;
      case 'CSV':
        return new CSVRepository();
        break;
    }
    throw new Exception("Repository type not found");
  }
}