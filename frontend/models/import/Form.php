<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 3/15/17
 * Time: 1:48 PM
 */

namespace frontend\models\import;


use common\models\Venue;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Class Form
 *
 * @property UploadedFile $internal
 * @property UploadedFile $external
 *
 * @package frontend\models\import
 */
class Form extends Model
{
    public $internal;

    public $external;

    public $additionalErrors;

    public $successfullyLoaded;

    public function formName()
    {
        return '';
    }

    public function rules()
    {
        return [
            [
                ['internal', 'external'],
                'file',
                'extensions' => 'csv',
                'checkExtensionByMimeType' => false
            ]
        ];
    }

    public function upload()
    {
        if ($this->validate()) {

            if (!file_exists(Venue::FILE_DIRECTORY)) {
                mkdir(Venue::FILE_DIRECTORY);
            }

            if ($this->internal) {
                $filePath = Venue::getFilePath(Venue::VENUES_INTERNAL_FILE);
                $this->_backupOldFile($filePath);
                $file = $this->internal;
                $file->saveAs($filePath);
            }

            if ($this->external) {
                $filePath = Venue::getFilePath(Venue::VENUES_EXTERNAL_FILE);
                $this->_backupOldFile($filePath);
                $file = $this->external;
                $file->saveAs($filePath);
            }
        }
    }

    protected function _backupOldFile($filePath)
    {
        if (file_exists($filePath)) {
            $info = pathinfo($filePath);
            $newFilePath = $info['dirname'] . DIRECTORY_SEPARATOR . $info['filename'] . '-' . time() . '.' . $info['extension'];
            rename($filePath, $newFilePath);
        }
    }
} 