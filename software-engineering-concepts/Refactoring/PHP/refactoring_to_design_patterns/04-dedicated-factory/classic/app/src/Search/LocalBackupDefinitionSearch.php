<?php

declare(strict_types=1);

namespace App\Search;



class LocalBackupDefinitionSearch implements DefinitionSearch
{

    private function __construct()
    {
    }

    public function getDefinition(string $word): array
    {
        $data = json_decode(file_get_contents(__DIR__."/backup.json"));
        $result = [];
        foreach ($data as $datum) {
            if($datum->word === $word){
                foreach($datum->meaning as $key => $value){
                    foreach ($value as $definitions){
                        if($definitions->definition) $result[] = $definitions->definition;
                    }
                }
            }
        }
        return $result;
    }

    public static function newInstance(): LocalBackupDefinitionSearch
    {
        return new LocalBackupDefinitionSearch();
    }

}
