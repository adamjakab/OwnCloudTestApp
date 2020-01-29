<?php

/**
 * Scripts and styles
 */
\OCP\Util::addScript('testapp', 'testapp');  // include js/script.js
\OCP\Util::addStyle('testapp', 'testapp');    // include css/style.css

?>
<div id="app-navigation">
    <ul>
        <li>item 1</li>
        <li>item 2</li>
        <li>item 3</li>
    </ul>

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
    <button class="klikker"><?php p($l->t('Click Me')); ?></button>
</div>
