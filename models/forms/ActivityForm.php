<?php
namespace app\models\form;

use app\models\Activity;
use app\models\Goal;
use Yii;
use yii\base\Model;
use yii\widgets\ActiveForm;

class ActivityForm extends Model
{
    private $_activity;
    private $_goal;

    public function rules()
    {
        return [
            [['Activity'], 'required'],
            [['Goal'], 'safe'],
        ];
    }

    public function afterValidate()
    {
        $error = false;
        if (!$this->product->validate()) {
            $error = true;
        }
        if (!$this->parcel->validate()) {
            $error = true;
        }
        if ($error) {
            $this->addError(null); // add an empty error to prevent saving
        }
        parent::afterValidate();
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }
        $transaction = Yii::$app->db->beginTransaction();
        if (!$this->product->save()) {
            $transaction->rollBack();
            return false;
        }
        $this->parcel->product_id = $this->product->id;
        if (!$this->parcel->save(false)) {
            $transaction->rollBack();
            return false;
        }
        $transaction->commit();
        return true;
    }

    public function getActivity()
    {
        return $this->_activity;
    }

    public function setActivity($activity)
    {
        if ($activity instanceof Activity) {
            $this->_activity = $activity;
        } else if (is_array($activity)) {
            $this->_activity->setAttributes($activity);
        }
    }

    public function getParcel()
    {
        if ($this->_goal === null) {
            if ($this->product->isNewRecord) {
                $this->_goal = new Goal();
                $this->_goal->loadDefaultValues();
            } else {
                $this->_goal = $this->product->parcel;
            }
        }
        return $this->_parcel;
    }

    public function setParcel($parcel)
    {
        if (is_array($parcel)) {
            $this->parcel->setAttributes($parcel);
        } elseif ($parcel instanceof Parcel) {
            $this->_parcel = $parcel;
        }
    }

    public function errorSummary($form)
    {
        $errorLists = [];
        foreach ($this->getAllModels() as $id => $model) {
            $errorList = $form->errorSummary($model, [
                'header' => '<p>Please fix the following errors for <b>' . $id . '</b></p>',
            ]);
            $errorList = str_replace('<li></li>', '', $errorList); // remove the empty error
            $errorLists[] = $errorList;
        }
        return implode('', $errorLists);
    }

    private function getAllModels()
    {
        return [
            'Product' => $this->product,
            'Parcel' => $this->parcel,
        ];
    }
}