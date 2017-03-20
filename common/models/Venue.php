<?php

namespace common\models;


use ruskid\csvimporter\CSVImporter;
use ruskid\csvimporter\CSVReader;
use yii\base\Model;
use yii\db\ActiveRecordInterface;

/**
 * Class Venue
 *
 * @property string $event_name
 * @property string $event_start_date
 *
 * @package common\models
 */
class Venue extends Model
{
    const SCENARIO_INTERNAL = 'internal';
    const SCENARIO_EXTERNAL = 'external';

    const FILE_DIRECTORY = 'uploads';
    const VENUES_EXTERNAL_FILE = 'external.csv';
    const VENUES_INTERNAL_FILE = 'internal.csv';

    const INTERNAL_TIER_FIELD_NAME = 'graphed';
    const EXTERNAL_TIER_FIELD_NAME = 'tier_calc';

    const DATE_INTERNAL_FORMAT = 'n/j/Y';

    public $_attributes;

    public function rules()
    {
        return [
            [
                'event_start_date',
                'date',
                'format' => 'php:' . self::DATE_INTERNAL_FORMAT,
                'on' => [self::SCENARIO_EXTERNAL, self::SCENARIO_INTERNAL]
            ],
            [
                [self::EXTERNAL_TIER_FIELD_NAME],
                'number',
                'on' => [self::SCENARIO_EXTERNAL]
            ],
            /*[
                [self::INTERNAL_TIER_FIELD_NAME],
                'number',
                'on' => [self::SCENARIO_INTERNAL]
            ],*/
            [
                ['event_name', 'event_start_date'],
                'required',
                'on' => [self::SCENARIO_EXTERNAL, self::SCENARIO_INTERNAL]
            ],
            [
                [self::EXTERNAL_TIER_FIELD_NAME],
                'required',
                'on' => [self::SCENARIO_EXTERNAL]
            ]/*,
            [
                [self::INTERNAL_TIER_FIELD_NAME],
                'required',
                'on' => [self::SCENARIO_INTERNAL]
            ]*/
        ];
    }

    public static function getVenues(array $tiers = null, \DateTime $from = null, \DateTime $to = null)
    {
        $external = self::getObjects(self::getFilePath(self::VENUES_EXTERNAL_FILE), self::SCENARIO_EXTERNAL);
        $internal = self::getObjects(self::getFilePath(self::VENUES_INTERNAL_FILE), self::SCENARIO_INTERNAL);

        $venues = array_merge($external, $internal);

        $data = array();
        /* @var $venue Venue */
        foreach ($venues as $venue) {
            if (!$venue->validate()) {
                continue;
            }

            if (is_array($tiers)
                && !in_array($venue->getGlobalTier(), $tiers)
                && $venue->scenario == self::SCENARIO_EXTERNAL
            ) {
                continue;
            }

            if ($from && $to) {
                $date = $venue->getStartDate();
                if (!($date > $from && $date < $to)) {
                    continue;
                }
            }

            $data[] = $venue;
        }

        return $data;
    }

    public static function getFilePath($fileName)
    {
        return self::FILE_DIRECTORY . DIRECTORY_SEPARATOR . $fileName;
    }

    protected static function _exist($fileName)
    {
        return file_exists(self::getFilePath($fileName));
    }

    public static function getObjects($file, $scenario)
    {
        $rows = self::_convertCsvToArray($file);

        $result = array();
        foreach ($rows as $index => $row) {
            $venue = new static([
                'scenario' => $scenario
            ]);
            $venue->setAttributes($row);
            $result[] = $venue;
        }

        return $result;
    }

    public static function validateDataByFile($file, $scenario)
    {
        $venues = self::getObjects($file, $scenario);

        $errors = array();
        /* @var $venue Venue */
        foreach ($venues as $index => $venue) {
            if (!$venue->validate()) {
                $errors[$index] = $venue->getErrors();
            }
        }

        return $errors;
    }

    protected static function _convertCsvToArray($file)
    {
        $rows = array();
        if (file_exists($file)) {
            $importer = new CSVImporter();
            $importer->setData(new CSVReader([
                'filename' => $file,
                'startFromLine' => 0,
                'fgetcsvOptions' => [
                    'delimiter' => ','
                ]
            ]));

            $rows = $importer->getData();
        }

        if (!$head = array_shift($rows)) {
            $head = array();
        }


        foreach ($head as &$field) {
            $field = strtolower($field);
            $field = preg_replace('/\s+/i', '_', $field);
            //$field = str_replace('/\s+/', '_', $field);
            unset($field);
        }

        $data = array();
        foreach ($rows as $row) {
            $data[] = array_combine($head, $row);
        }

        return $data;
    }

    /**
     * PHP getter magic method.
     * This method is overridden so that attributes and related objects can be accessed like properties.
     *
     * @param string $name property name
     * @throws \yii\base\InvalidParamException if relation name is wrong
     * @return mixed property value
     * @see getAttribute()
     */
    public function __get($name)
    {
        if (isset($this->_attributes[$name]) || array_key_exists($name, $this->_attributes)) {
            return $this->_attributes[$name];
        } elseif ($this->hasAttribute($name)) {
            return null;
        } else {
            return parent::__get($name);
        }
    }

    /**
     * PHP setter magic method.
     * This method is overridden so that AR attributes can be accessed like properties.
     * @param string $name property name
     * @param mixed $value property value
     */
    public function __set($name, $value)
    {
        if ($this->hasAttribute($name)) {
            $this->_attributes[$name] = $value;
        } else {
            parent::__set($name, $value);
        }
    }

    /**
     * Checks if a property value is null.
     * This method overrides the parent implementation by checking if the named attribute is `null` or not.
     * @param string $name the property name or the event name
     * @return bool whether the property value is null
     */
    public function __isset($name)
    {
        try {
            return $this->__get($name) !== null;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Returns a value indicating whether the model has an attribute with the specified name.
     * @param string $name the name of the attribute
     * @return bool whether the model has an attribute with the specified name.
     */
    public function hasAttribute($name)
    {
        return isset($this->_attributes[$name]) || in_array($name, $this->attributes(), true);
    }

    /**
     * Returns the list of all attribute names of the model.
     * The default implementation will return all column names of the table associated with this AR class.
     * @return array list of attribute names.
     */
    public function attributes()
    {
        return $this->activeAttributes();
    }

    /**
     * @return number
     */
    public function getGlobalTier()
    {
        if ($this->scenario == self::SCENARIO_INTERNAL) {
            return 0;
        }

        $fieldName = self::EXTERNAL_TIER_FIELD_NAME;

        return $this->$fieldName;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return \DateTime::createFromFormat(self::DATE_INTERNAL_FORMAT, $this->event_start_date);
    }
}
