<?php
/**
 * An HTML Ordered List Helper Class
 */
class OrderedList
{
    public function __invoke($items)
    {
        $output = '<ol>';
        foreach($items as $item){
            $output .= "<li>$item</li>";
        }
        $output .= '</ol>';
        return $output;
    }
}