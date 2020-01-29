<?php

/** @var $_ array */
/**
 * Scripts and styles
 */
\OCP\Util::addScript('testapp', 'testapp');  // include js/script.js
\OCP\Util::addStyle('testapp', 'testapp');    // include css/style.css


?>
<div id="app-navigation">

    <?php print_unescaped($this->inc('partials/app-navigation')); ?>

    <div id="app-settings">
        <div id="app-settings-header">
            <button class="settings-button" data-apps-slide-toggle="#app-settings-content">
                <?php p($l->t('Settings')); ?>
            </button>
        </div>
        <div id="app-settings-content">
            <em>settings go here</em>
        </div>
    </div>
</div>

<div id="app-content">
    <p>
        <button class="klikker"><?php p($l->t('Click Me')); ?></button>
    </p>
    <p>
        <a href="<?php echo $_["route_1"]?>">Go to Route1</a>
    </p>
</div>
