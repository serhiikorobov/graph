<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/4/17
 * Time: 3:22 PM
 */

namespace common\models;


use common\models\event\source\Audience;
use common\models\event\source\EventType;
use common\models\event\source\LevelOfSupport;
use common\models\event\source\Logistics;
use common\models\event\source\Objectives;
use common\models\event\source\Submitter;
use common\models\event\source\Tier;
use common\models\event\source\TypeServices;
use common\models\event\source\YesNo;
use common\models\event\validator\OptionValidator;
use yii\db\ActiveRecord;
use \Yii;

/**
 * Class Event
 *
 * @property $short_name Name	textbox: shortname		(text)
 * @property $description	textbox: description		(text)
 * @property $website	textbox: website
 * @property $date_start pick: date start-end		(date)
 * @property $date_end
 * @property $location	textbox: location (guided)	(City, State, Country)	(text)
 * @property $venue_name	textbox: Venuename		(text)
 *
 * @property string $goals What are the goals and objectives for the meeting/speakership?	textbox: goals		(text)
 * @property string $audience Will the demo be shown to internal Intel or external audiences? 	dropdown: audience	Internal, external, mix, unknown	(dropdown)
 * @property int $audience_size Expected Audience size textbox: audiencesize		(numeric)
 * @property string $products Which product(s) will be shared? 	textbox: products		(text)
 * @property string $experiences Which experiences will be shared? 	textbox: experiences		(text)
 * @property string $nda Are there any NDA/disclosure requirements?	dropdown: nda	yes/no/unknown	(dropdown)
 * @property string $audience_persons  Who is the intended audience of this meeting/speakership?	textbox: audience		(text)
 * @property string $expectations What is the audience’s expectation?	textbox: expectations		(text)
 * @property string $customers Are any specific customers involved, expected to be featured?	textbox: partners		(text)
 * @property string $partners Are any specific partners involved, expected to be featured?	textbox: customers		(text)
 * @property string $comments Additional questions to consider:	textbox: comments		(text)
 * @property string $apm Assigned PM	textbox: APM		(text)
 * @property string $atme Assigned TME	textbox: ATME		(text)

 *
 * @property string $a_v A/V services	dropdown: A/V	Self/CCG/External/Unknown	(dropdown)
 * @property string $stage Stage services	dropdown: Stage	Self/CCG/External/Unknown	(dropdown)
 * @property string $logistics_date_start Setup date	pick: date start		(date)
 * @property string $logistics_time_start Setup time	textbox: time start-end		(numeric)
 * @property string $logistics_time_end
 * @property string $tear_down_date Teardown date	pick: date end		(date)
 * @property string $tear_down_time_start Teardown time	textbox: time start-end		(numeric)
 * @property string $tear_down_time_end Teardown
 * @property string $logistics Who is handling shipping logistics	dropdown: logistics, if other list	Intel/S&M United/Sho-Air/self/other	(dropdown)
 * @property string $arrival_date When can equipment arrive at the designated location?	pick: arrival date		(date)
 * @property string $departure_date When does equipment need to be removed from location?	pick: departure date		(date)
 * @property string $layout_stage What is the layout of the stage area?	textbox: layout stage		(text)
 * @property string $layout_demo_area What is the layout of the demo area?	textbox: layout demo area		(text)
 * @property string $level_of_support Will there be local/additional support provided or do we need to provide all the demo support?	dropdown: level of support, if other list	Local/CCG/Corp Demos/Mixed/All	(dropdown)
 * @property double $budget Budget	textbox: budget		(numeric,$)
 * @property double $cost_center Cost center	textbox: cost center		(numeric)

 * @property string $requester Name of the requester	Textbox: requester		(text)
 * @property string $submitter Submitted by	dropdown: submitter	Becky/April/Kim/Nicole/Jeff/Chris/Ali/Art/Yuri	(dropdown)
 * @property string $group Group Submission	textbox: group	(text)	(text)
 * @property string $event_type Event Type	dropdown: event type	Consumer/Industry/Sales/Other	(dropdown)
 * @property string $number	Intel Attendees	textbox: number		(numeric)
 * @property string objectives "Business Objective (BK's Top 4 Jobs)"	checkbox: objectives	AI/AD/VR/SmartConnected Home	(checkbox)
 * @property string $sponsor Sponsor	dropdown: sponsor	yes/no/unknown	(dropdown)
 * @property string $keynote Keynote	dropdown: keynote	yes/no/unknown	(dropdown)
 * @property string $booth Booth Space	dropdown: booth	yes/no/unknown	(dropdown)
 * @property string $sate_lite Satelite Event	dropdown: satelite	yes/no/unknown	(dropdown)
 * @property string $meeting Meeting Space	dropdown: meeting	yes/no/unknown	(dropdown)
 * @property string $nda_suite NDA suites	dropdown: NDASuite	yes/no/unknown	(dropdown)
 * @property string $sessions Sessions	dropdown: sessions	yes/no/unknown	(dropdown)
 * @property string $demos Demos dropdown: demos	yes/no/unknown	(dropdown)
 * @property string $training Training	dropdown: training	yes/no/unknown	(dropdown)
 * @property string $launch Product Launch	dropdown: launch	yes/no/unknown	(dropdown)
 * @property string $pr PR Activation	dropdown: PR	yes/no/unknown	(dropdown)
 * @property double $costs My Costs	textbox: costs	$	(numeric,$)
 * @property double $shipping_costs Shipping Costs	textbox: shipping costs	$	(numeric,$)
 * @property string $tier Tier	dropdown: tier	1/2/3/4/5/unknown	(dropdown)
 * @property string $event_quarter Event Quarter	(autocalculate)
 * @property string $catering
 * @property string $network
 * @property string $security
 *
 * @package common\models
 */
class Event extends ActiveRecord
{
    const DATE_INTERNAL_FORMAT = 'n/j/Y';
    const DATETIME_INTERNAL_FORMAT = 'Y-m-d H:i:s';
    const DATETIME_DISPLAY_FORMAT = 'Y-m-d H:i';
    const DATETIME_INTERNAL_FORMAT_JS = 'yyyy-MM-dd HH:mm';

    public static function tableName()
    {
        return '{{%event}}';
    }

    public function rules()
    {
        $allFields = array_keys($this->attributeLabels());

        return [
            [
                ['short_name', 'tier', 'date_start', 'location'],
                'required'
            ],
            [
                ['short_name', 'website', 'comments', 'event_quarter', 'catering', 'network', 'security'],
                'string',
                'max' => 255
            ],
            [
                ['objectives'],
                'string',
                'max' => 100
            ],
            [
                [
                    'audience', 'nda', 'a_v', 'stage', 'logistics', 'level_of_support', 'submitter', 'event_type',
                    'sponsor', 'keynote', 'booth', 'sate_lite', 'meeting', 'nda_suite', 'sessions', 'demos', 'training', 'launch', 'pr'
                ]
                ,
                'string',
                'max' => 50
            ],
            [
                [
                    'description', 'location', 'venue_name', 'goals', 'products', 'experiences', 'audience_persons', 'expectations', 'customers',
                    'partners', 'comments', 'apm', 'atme', 'layout_stage', 'layout_demo_area', 'requester', 'group'
                ],
                'string'
            ],
            [
                ['audience_size', 'tier', 'number'],
                'integer'
            ],
            [
                ['budget', 'cost_center', 'costs', 'shipping_costs'],
                'integer',
                'integerOnly' => false
            ],
            [
                ['date_start', 'date_end', 'logistics_date_start', 'logistics_date_end', 'tear_down_date_start', 'tear_down_date_end', 'arrival_date', 'departure_date'],
                'date',
                'format' => 'php:' . self::DATETIME_DISPLAY_FORMAT
            ],
            [
                ['audience'],
                OptionValidator::className(),
                'source_model' => Audience::className()
            ],
            [
                ['a_v', 'stage'],
                OptionValidator::className(),
                'source_model' => TypeServices::className()
            ],
            [
                ['logistics'],
                OptionValidator::className(),
                'source_model' => Logistics::className()
            ],
            [
                ['level_of_support'],
                OptionValidator::className(),
                'source_model' => LevelOfSupport::className()
            ],
            [
                ['submitter'],
                OptionValidator::className(),
                'source_model' => Submitter::className()
            ],
            [
                ['event_type'],
                OptionValidator::className(),
                'source_model' => EventType::className()
            ],
            [
                ['objectives'],
                OptionValidator::className(),
                'source_model' => Objectives::className()
            ],
            [
                ['tier'],
                OptionValidator::className(),
                'source_model' => Tier::className()
            ],
            [
                ['nda', 'sponsor', 'keynote', 'booth', 'sate_lite', 'meeting', 'nda_suite', 'sessions', 'demos', 'training', 'launch', 'pr'],
                OptionValidator::className(),
                'source_model' => YesNo::className()
            ],
            [
                $allFields,
                'default',
                'value' => null
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'short_name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'website' => Yii::t('app', 'Event Website'),
            'date_start' => Yii::t('app', 'Date Start'),
            'date_end' => Yii::t('app', 'Date End'),
            'location' => Yii::t('app', 'Location'),
            'venue_name' => Yii::t('app', 'Venue'),
            'goals' => Yii::t('app', 'Goals'),
            'audience' => Yii::t('app', 'Audiences'),
            'audience_size' => Yii::t('app', 'Audience size'),
            'products' => Yii::t('app', 'Shared Product(s)'),
            'experiences' => Yii::t('app', 'Shared Experiences'),
            'nda' => Yii::t('app', 'NDA/disclosure'),
            'audience_persons' => Yii::t('app', 'Intended Audience'),
            'expectations' => Yii::t('app', 'Audience’s Expectation'),
            'partners' => Yii::t('app', 'Partners'),
            'customers' => Yii::t('app', 'Customers'),
            'comments' => Yii::t('app', 'Comments'),
            'apm' => Yii::t('app', 'Assigned PM'),
            'atme' => Yii::t('app', 'Assigned TME'),
            'a_v' => Yii::t('app', 'A/V Services'),
            'stage' => Yii::t('app', 'Stage Services'),
            'logistics_date_start' => Yii::t('app', 'Setup Date Start'),
            'logistics_date_end' => Yii::t('app', 'Setup Date End'),
            'tear_down_date_start' => Yii::t('app', 'Teardown Date Start'),
            'tear_down_date_end' => Yii::t('app', 'Teardown Date End'),
            'logistics' => Yii::t('app', 'Shipping Logistics'),
            'arrival_date' => Yii::t('app', 'Equipment Arrive'),
            'departure_date' => Yii::t('app', 'Equipment Departure Date'),
            'layout_stage' => Yii::t('app', 'Stage Layout'),
            'layout_demo_area' => Yii::t('app', 'Demo layout'),
            'level_of_support' => Yii::t('app', 'Level of Support'),
            'budget' => Yii::t('app', 'Budget'),
            'cost_center' => Yii::t('app', 'Cost Center'),
            'requester' => Yii::t('app', 'Requester'),
            'submitter' => Yii::t('app', 'Submitted by'),
            'group' => Yii::t('app', 'Group Submission'),
            'event_type' => Yii::t('app', 'Event Type'),
            'number' => Yii::t('app', 'Intel Attendees'),
            'objectives' => Yii::t('app', 'Business Objective'),
            'sponsor' => Yii::t('app', 'Sponsor'),
            'keynote' => Yii::t('app', 'Keynote'),
            'booth' => Yii::t('app', 'Booth Space'),
            'sate_lite' => Yii::t('app', 'Satelite Event'),
            'meeting' => Yii::t('app', 'Meeting Space'),
            'nda_suite' => Yii::t('app', 'NDA Suites'),
            'sessions' => Yii::t('app', 'Sessions'),
            'demos' => Yii::t('app', 'Demos'),
            'training' => Yii::t('app', 'Training'),
            'launch' => Yii::t('app', 'Product Launch'),
            'pr' => Yii::t('app', 'PR Activation'),
            'costs' => Yii::t('app', 'My Costs'),
            'shipping_costs' => Yii::t('app', 'Shipping Costs'),
            'tier' => Yii::t('app', 'Tier'),
            'event_quarter' => Yii::t('app', 'Event Quarter'),
            'catering' => Yii::t('app', 'Catering'),
            'network' => Yii::t('app', 'Network'),
            'security' => Yii::t('app', 'Security'),
        ];
    }

    public function attributeTooltip()
    {
        return [
            /*'short_name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'website' => Yii::t('app', 'Event Website'),
            'date_start' => Yii::t('app', 'Date Start'),
            'date_end' => Yii::t('app', 'Date End'),
            'location' => Yii::t('app', 'Location'),
            'venue_name' => Yii::t('app', 'Location venue'),*/
            'goals' => Yii::t('app', 'What are the goals and objectives for the meeting/speakership?'),
            'audience' => Yii::t('app', 'Will the demo be shown to internal Intel or external audiences?'),
            'audience_size' => Yii::t('app', 'Expected Audience size'),
            'products' => Yii::t('app', 'Which product(s) will be shared?'),
            'experiences' => Yii::t('app', 'Which experiences will be shared?'),
            'nda' => Yii::t('app', 'Are there any NDA/disclosure requirements?'),
            'audience_persons' => Yii::t('app', 'Who is the intended audience of this meeting/speakership?'),
            'expectations' => Yii::t('app', 'What is the audience’s expectation?'),
            'partners' => Yii::t('app', 'Are any specific partners involved, expected to be featured?'),
            'customers' => Yii::t('app', 'Are any specific customers involved, expected to be featured?'),
            //'comments' => Yii::t('app', 'Additional questions to consider'),
            /*'apm' => Yii::t('app', 'Assigned PM'),
            'atme' => Yii::t('app', 'Assigned TME'),*/
            'a_v' => Yii::t('app', 'Depending on scope of event/meeting/speakership- who is providing A/V services'),
            'stage' => Yii::t('app', 'Depending on scope of event/meeting/speakership- who is providing  stage services'),
            /*'logistics_date_start' => Yii::t('app', 'Setup date start'),
            'logistics_date_end' => Yii::t('app', 'Setup date end'),
            'tear_down_date_start' => Yii::t('app', 'Teardown date start'),
            'tear_down_date_end' => Yii::t('app', 'Teardown date end'),*/
            'logistics' => Yii::t('app', 'Who is handling shipping logistics'),
            'arrival_date' => Yii::t('app', 'When can equipment arrive at the designated location?'),
            'departure_date' => Yii::t('app', 'When does equipment need to be removed from location?'),
            'layout_stage' => Yii::t('app', 'What is the layout of the stage area?'),
            'layout_demo_area' => Yii::t('app', 'What is the layout of the demo area?'),
            'level_of_support' => Yii::t('app', 'Will there be local/additional support provided or do we need to provide all the demo support?'),
            'budget' => Yii::t('app', 'What is the budget for the meeting/speakership?'),
            'cost_center' => Yii::t('app', 'What\'s Cost center for the meeting/speakership?'),
            'requester' => Yii::t('app', 'Name of the requester'),
            /*'submitter' => Yii::t('app', 'Submitted by'),
            'group' => Yii::t('app', 'Group Submission'),
            'event_type' => Yii::t('app', 'Event Type'),
            'number' => Yii::t('app', 'Intel Attendees'),*/
            'objectives' => Yii::t('app', '"Business Objective(BK\'s Top 4 Jobs)"'),
            /*'sponsor' => Yii::t('app', 'Sponsor'),
            'keynote' => Yii::t('app', 'Keynote'),
            'booth' => Yii::t('app', 'Booth Space'),
            'sate_lite' => Yii::t('app', 'Satelite Event'),
            'meeting' => Yii::t('app', 'Meeting Space'),
            'nda_suite' => Yii::t('app', 'NDA suites'),
            'sessions' => Yii::t('app', 'Sessions'),
            'demos' => Yii::t('app', 'Demos'),
            'training' => Yii::t('app', 'Training'),
            'launch' => Yii::t('app', 'Product Launch'),
            'pr' => Yii::t('app', 'PR Activation'),
            'costs' => Yii::t('app', 'My Costs'),
            'shipping_costs' => Yii::t('app', 'Shipping Costs'),
            'tier' => Yii::t('app', 'Tier'),
            'event_quarter' => Yii::t('app', 'Event Quarter'),*/
        ];
    }

    public static function getVenues(array $tiers = null, \DateTime $from = null, \DateTime $to = null)
    {
        $query = static::find();

        if (!is_null($tiers)) {
            $query->andWhere(['IN', 'tier', $tiers]);
        }

        $query->andWhere(['<>', 'tier', 0]);

        if (!is_null($from)) {
            $query->andWhere(['>=', 'date_start', $from->format(self::DATETIME_INTERNAL_FORMAT)]);
        }

        if (!is_null($to)) {
            $query->andWhere(['<=', 'date_start', $to->format(self::DATETIME_INTERNAL_FORMAT)]);
        }

        return $query->all();
    }

    /**
     * @return array
     */
    public static function getAvailableTiers()
    {
        $query = static::find();
        $query->select(['tier'])
            ->andWhere(['<>', 'tier', 0])
            ->groupBy('tier')
            ->orderBy(['tier' => SORT_ASC]);

        $tiers = $query->createCommand()->queryColumn();

        return $tiers;
    }
}
