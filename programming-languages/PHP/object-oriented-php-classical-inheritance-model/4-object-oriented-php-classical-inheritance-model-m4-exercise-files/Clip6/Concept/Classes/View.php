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
     */
    public function __construct(Plane $item){
        $this->item = $item;
    }

    /**
     * Render some HTML
     * @return string
     */
    public function render(){
        $output = '<table><thead>';
        $output .= '<tr><th style="text-align: left;width: 75px;">Make</th>';
        $output .= '<th style="text-align: left;width: 75px;">Model</th>';
        $output .= '<th style="text-align: left;width: 100px;">Type</th>';
        $output .= '<th style="text-align: left;width: 200px;">Operator</th>';
        $output .= '<th style="text-align: left;width: 50px;">Country</th></tr>';
        $output .= '</thead><tbody>';
        $output .= "<tr><td style=\"text-align: left;width: 75px;\">{$this->item->getMake()}</td>";
        $output .= "<td style=\"text-align: left;width: 75px;\">{$this->item->getModel()}</td>";
        $output .= "<td style=\"text-align: left;width: 100px;\">{$this->item->getType()}</td>";
        $output .= "<td style=\"text-align: left;width: 200px;\">{$this->item->getOperator()}</td>";
        $output .= "<td style=\"text-align: left;width: 50px;\">{$this->item->getCountry()}</td></tr>";
        $output .= '</tbody></table>';
        return $output;
    }
}