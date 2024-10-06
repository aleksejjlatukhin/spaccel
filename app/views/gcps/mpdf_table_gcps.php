<?php

use app\models\ConfirmGcp;
use app\models\Gcps;
use app\models\StatusConfirmHypothesis;
use yii\helpers\Html;

/**
 * @var Gcps[] $models
 */

?>

<div class="gcp-index-export">

    <!--Заголовки для списка ЦП-->
    <table class="all_headers_data_gcps">

        <tr>
            <td class="block_gcp_title" colspan="2">Обознач.</td>
            <td class="block_gcp_description">Описание гипотезы ценностного предложения</td>
            <td class="block_gcp_date">Дата создания</td>
            <td class="block_gcp_date">Дата подтв.</td>
        </tr>

    </table>

    <table class="block_all_gcps">

        <?php foreach ($models as $model) : ?>

            <?php
            /** @var $confirm ConfirmGcp */
            $confirm = ConfirmGcp::find(false)
                ->andWhere(['gcp_id' => $model->getId()])
                ->one();
            ?>

        <tr>

            <td class="block_gcp_status">
                <?php
                if ($model->getExistConfirm() === StatusConfirmHypothesis::COMPLETED) {

                    echo '<div class="" style="padding: 0 5px;">' . Html::img('@web/images/icons/positive-offer.png', ['style' => ['width' => '20px',]]) . '</div>';

                }elseif (!$confirm && $model->getExistConfirm() === StatusConfirmHypothesis::MISSING_OR_INCOMPLETE) {

                    echo '<div class="" style="padding: 0 5px;">' . Html::img('@web/images/icons/next-step.png', ['style' => ['width' => '20px']]) . '</div>';

                }elseif ($confirm && $model->getExistConfirm() === StatusConfirmHypothesis::MISSING_OR_INCOMPLETE) {

                    echo '<div class="" style="padding: 0 5px;">' . Html::img('@web/images/icons/next-step.png', ['style' => ['width' => '20px']]) . '</div>';

                }elseif ($model->getExistConfirm() === StatusConfirmHypothesis::NOT_COMPLETED) {

                    echo '<div class="" style="padding: 0 5px;">' . Html::img('@web/images/icons/danger-offer.png', ['style' => ['width' => '20px',]]) . '</div>';

                }
                ?>
            </td>

            <td class="block_gcp_title"><?= $model->getTitle() ?></td>
            <td class="block_gcp_description"><?= $model->getDescription() ?></td>
            <td class="block_gcp_date"><?= date("d.m.y", $model->getCreatedAt()) ?></td>

            <td class="block_gcp_date">
                <?php if ($model->getTimeConfirm()) : ?>
                    <?= date("d.m.y", $model->getTimeConfirm()) ?>
                <?php endif; ?>
            </td>

        </tr>

        <?php endforeach; ?>

    </table>

</div>