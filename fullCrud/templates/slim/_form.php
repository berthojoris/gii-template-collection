<div class="crud-form">

    <?=
    "
    <?php
        Yii::app()->bootstrap->registerAssetCss('select2.css');
        Yii::app()->bootstrap->registerAssetJs('select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(\".crud-form select\").select2();');

        \$form=\$this->beginWidget('CActiveForm', array(
            'id'=>'{$this->class2id($this->modelClass)}-form',
            'enableAjaxValidation'=>{$this->enableAjaxValidation},
            'enableClientValidation'=>{$this->enableClientValidation},
        ));

        echo \$form->errorSummary(\$model);
    ?>
    ";
    ?>

    <div class="row">
        <div class="span8"> <!-- main inputs -->
            <h2>
                <?= "<?php echo Yii::t('{$this->messageCatalog}','Data')?>"; ?>

            </h2>

            <h3>
                <?= "<?php echo \$model->{$this->provider()->suggestIdentifier($this->modelClass)} ?>"; ?>

            </h3>

            <div class="form-horizontal">

                <?php foreach ($this->tableSchema->columns as $column): ?>

                    <div class="control-group">
                        <div class='control-label'>
                            <?= "<?php {$this->provider()->generateActiveLabel($this->modelClass, $column)} ?>" ?>

                        </div>
                        <div class='controls'>
                            <?=
                            "
                               <?php {$this->provider()->generateActiveField($this->modelClass, $column)} ?>
                               <?php echo \$form->error(\$model,'{$column->name}') ?>
                                "
                            ?>

                            <span class="help-block">
                                <?=
                                "
                                <?php
                                echo (\$t = Yii::t('{$this->messageCatalog}', '{$this->modelClass}.{$column->name }') != '{$this->modelClass}.{$column->name }')?\$t:''
                                ?>
                                "
                                ?>
                            </span>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <!-- main inputs -->

        <div class="span4"> <!-- sub inputs -->
            <h2>
                <?= "<?php echo Yii::t('" . $this->messageCatalog . "','Relations')?>"; ?>

            </h2>
            <? foreach ($this->getRelations() as $key => $relation) : ?>

                <?=
                // relations
                "
                <h3>
                    <?php echo Yii::t('{$this->messageCatalog}', '{$key}'); ?>
                </h3>
                <?php {$this->provider()->generateRelationField($this->modelClass, $key, $relation)} ?>
                "
                ?>

            <? endforeach; ?>


        </div>
        <!-- sub inputs -->
    </div>

    <p class="alert">

        <?=
        "
        <?php echo Yii::t('{$this->messageCatalog}','Fields with <span class=\"required\">*</span> are required.');?>
        ";
        ?>

    </p>

    <div class="form-actions">
        <?=
        "
        <?php
            echo CHtml::Button(
            Yii::t('{$this->messageCatalog}', 'Cancel'), array(
                'submit' => (isset(\$_GET['returnUrl']))?\$_GET['returnUrl']:array('{$this->controllerID}/admin'),
                'class' => 'btn'
            ));
            echo ' '.CHtml::submitButton(Yii::t('{$this->messageCatalog}', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>";

        ?>

    </div>

    <?= "<?php \$this->endWidget() ?>"; ?>

</div> <!-- form -->