<?php
/**
 * View Container
 */
class View
{
    public $item;

    /**
     * View constructor.
     * @param Plane $item
     * @internal param array $data
     */
    public function __construct(TransportInterface $item){
        $this->item = $item;
    }

    /**
     * Render some HTML
     * @param string $layout
     * @return mixed
     */
    public function render(string $layout = 'default'){
        require "Layouts/$layout.php";
    }
}