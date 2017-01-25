<?php

/* @var $this yii\web\View */

use yii\widgets\Pjax;

$this->title = 'My Yii Application';

?>
<div class="site-index">

    <div class="col-lg-4">
        <h2>Инградиенты</h2>
        <?php if (isset($products)): ?>
            <?php foreach ($products as $product): ?>
                <input type="checkbox"><?= $product->name ?><br>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>

    <div class="body-content">
        <?php Pjax::begin(); ?>
        <div class="row">
            <?php if (isset($meals)): ?>
                <?php foreach ($meals as $meal): ?>
                    <div class="col-lg-2">
                        <h3 class="row"><?= $meal->name ?></h3>
                        <?php foreach($meal->ingredients as $ingredient): ?>


                            <div class="row">
                                <?= $ingredient->product->name ?>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php Pjax::end(); ?>
    </div>

</div>
