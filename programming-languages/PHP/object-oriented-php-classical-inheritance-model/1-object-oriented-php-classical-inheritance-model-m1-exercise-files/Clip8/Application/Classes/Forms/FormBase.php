<?php
/**
 * Form Base Class
 */
class FormBase
{
    public $model;
    public $config = [];
    protected $fields = [];
    protected $data;
    public $isValid = false;

    /**
     * @param $model
     * @param array $params
     */
    public function __construct($model, $params = null)
    {
        $this->model = $model;
        $this->config = $params;
    }

    /**
     * @return string
     */
    public function getStartTag()
    {
        $config = $this->config;
        $form = "<form";
        $form .= $config['id'] ? " id=\"{$config['id']}\"" : null;
        $form .= $config['name'] ? " name=\"{$config['name']}\"" : null;
        $form .= $config['action'] ? " action=\"{$config['action']}\"" : null;
        $form .= $config['method'] ? " method=\"{$config['method']}\"" : null;
        $form .= '>';
        return $form;
    }

    /**
     * Generates fields from a configuration array
     * @return bool
     */
    public function generateFields()
    {
        $config = $this->config;
        $newField = null;
        foreach ($config['fields'] as $field) {
            $newField = $this->generateField($field);
        }

        if (!$newField) {
            return false;
        } else {
            //Set common fields
            !empty($field['value']) ? $newField->setValue($field['value']) : null;
            !empty($field['name']) ? $newField->setName($field['name']) : null;
            !empty($field['required']) ? $newField->setRequired($field['required']) : null;
            !empty($field['priority']) ? $this->fields[$field['priority']] = $newField : null;
        }

        ksort($this->fields);
        return true;
    }

    /**
     * @param $field
     * @return Checkbox|Hidden|Select|string|Submit|Text
     */
    public function generateField($field)
    {
        $newField = '';
        switch ($field['type']) {
            case 'text':
                require_once CLASSES . 'Forms/Inputs/Text.php';
                $newField = new Text();
                $field['type'] ? $newField->setType($field['type']) : null;
                $field['label'] ? $newField->setLabel($field['label']) : null;
                $field['name'] ? $newField->setName($field['name']) : null;
                $field['validator'] ? $newField->setValidator($field['validator']) : null;
                break;
            case 'submit':
                require_once CLASSES . 'Forms/Inputs/Submit.php';
                $newField = new Submit();
                $field['type'] ? $newField->setType($field['type']) : null;
                break;
            case 'hidden':
                require_once CLASSES . 'Forms/Inputs/Hidden.php';
                $newField = new Hidden();
                $field['validator'] ? $newField->setValidator($field['validator']) : null;
                $field['value'] ? $newField->setValue($field['value']) : null;
                $field['name'] ? $newField->setName($field['name']) : null;
                break;
            case 'checkbox':
                require_once CLASSES . 'Forms/Inputs/Checkbox.php';
                $newField = new Checkbox();
                $field['type'] ? $newField->setType($field['type']) : null;
                $field['label'] ? $newField->setLabel($field['label']) : null;
                $field['name'] ? $newField->setName($field['name']) : null;
                $field['validator'] ? $newField->setValidator($field['validator']) : null;
                break;
            case 'select':
                require_once CLASSES . 'Forms/Inputs/Select.php';
                require_once CLASSES . 'Forms/Inputs/Option.php';
                $newField = new Select();
                $option = new Option();
                $options = [];
                $values = null;
                $field['multiple'] ? $newField->setMultiple($field['multiple']) : null;
                $field['label'] ? $newField->setLabel($field['label']) : null;
                $field['name'] ? $newField->setName($field['name']) : null;
                if (is_string($field['options'])) {
                    $stmt = $this->model->getCountry();
                    $values = $stmt->fetchAll(PDO::FETCH_COLUMN);
                    sort($values);
                    $options = $option->getOptions($values);
                }
                if (is_array($field['options'])) {
                    $values = $field['options'];
                    $options = $option->getOptions($values);
                }
                if ($options && $values) {
                    $field['validator'] ? $newField->setValidator($field['validator'], $values) : null;
                    $newField->setOptions($options);
                }
                break;
        }
        return $newField;
    }

    /**
     * @param $field
     * @return bool|Checkbox|Hidden|Select|string|Submit|Text
     */
    public function addField($field)
    {
        if ($newField = $this->generateField($field)) {
            $this->fields[$field['priority']] = $newField;
            return $newField;
        };
        return false;
    }

    /**
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     *
     */
    public function validate()
    {
        $invalidCount = null;
        foreach ($this->data as $key => $value) {
            foreach ($this->fields as $field) {
                if ($field->getName() == $key) {
                    $validator = $field->getValidator();
                    if ($validator->validate($value)) {
                        $field->setValid();
                        break;
                    } else {
                        $invalidCount++;
                    }
                }
            }
        }
        $this->isValid = $invalidCount ?: true;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return string
     */
    public function getEndTag()
    {
        return '</form>';
    }
}