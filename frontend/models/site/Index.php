<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 3/16/17
 * Time: 7:48 PM
 */

namespace frontend\models\site;


use common\models\Venue;
use yii\base\Model;

class Index extends Model
{
    const DATE_INPUT_FORMAT = 'm/d/Y';

    protected $_venues;

    public $maxTier = 0;

    public $filter_tier;
    public $filter_date;
    public $filter_month;

    public function __construct($config = [])
    {
        $this->filter_tier = [1,2];
        $this->filter_date = (new \DateTime())->format(self::DATE_INPUT_FORMAT);
        $this->filter_month = 12;

        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [
                ['filter_tier'],
                'each',
                'rule' => [
                    'number'
                ]
            ],
            [
                ['filter_month'],
                'number'
            ],
            [
                ['filter_date'],
                'date',
                'format' => self::DATE_INPUT_FORMAT

            ]
        ];
    }

    public function formName()
    {
        return '';
    }

    public function getChartData()
    {
        $data = array();
        /* @var $venue Venue */
        foreach ($this->venues as $venue) {
            $date = $venue->getStartDate();
            $tier = $venue->getGlobalTier();
            if ($this->maxTier < $tier) {
                $this->maxTier = $tier;
            }
            $color = '#' . substr(md5(rand()), 0, 6);

            $data[] = array(
                'label' => $venue->event_name,
                'data' => array(array(
                    'x' => $date->getTimestamp() * 1000,
                    'y' => $tier,
                    'r' => $venue->scenario == Venue::SCENARIO_INTERNAL ? 6 : 4,
                    'venueType' => $venue->scenario,
                )),
                'backgroundColor' => $color,
                'hoverBackgroundColor' => $color
            );
        }

        return $data;
    }

    public function getTierOptions()
    {
        $values = array();
        /* @var $venue Venue */
        foreach (Venue::getVenues() as $venue) {
            $tier = $venue->getGlobalTier();
            if ($tier) {
                $values[] = $tier;
            }
        }

        $values = array_unique($values);
        sort($values);

        $options = array();
        $default = array(
            'label' => 'All',
            'value' => 0,
        );

        if (is_array($this->filter_tier) && in_array(0, $this->filter_tier)) {
            $default['selected'] = true;
        }

        $options[] = $default;

        foreach ($values as $tier) {
            $option = array(
                'label' => 'Tier ' . $tier,
                'value' => $tier
            );

            if (is_array($this->filter_tier) && in_array($tier, $this->filter_tier)) {
                $option['selected'] = true;
            }

            $options[] = $option;
        }

        return $options;
    }

    public function getVenues()
    {
        if (is_null($this->_venues)) {

            $date = $this->getMinDate();
            $dateTo = $this->getMaxDate();

            $tiers = $this->filter_tier;
            if (is_array($tiers) && in_array(0, $tiers)) {
                $tiers = null;
            }

            $venues = Venue::getVenues($tiers, $date, $dateTo);
            $this->_venues = $venues;
        }

        return $this->_venues;
    }

    /**
     * @return \DateTime|null
     */
    public function getMinDate()
    {
        if ($date = $this->filter_date) {
            $date = \DateTime::createFromFormat(self::DATE_INPUT_FORMAT, $date);
        } else {
            $date = null;
        }

        return $date;
    }

    /**
     * @return \DateTime|null
     */
    public function getMaxDate()
    {
        $dateTo = null;
        if ($date = $this->getMinDate()) {
            $dateTo = clone $date;
            $dateTo->add(new \DateInterval(sprintf('P%sM', $this->filter_month)));
        }

        return $dateTo;
    }
}
