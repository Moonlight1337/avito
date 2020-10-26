<?php
require_once 'Logic/Update.php';

$all_pos = Logic\Update::getAllPos();
$new_prices = Logic\Update::getNewPrices($all_pos);
Logic\Update::updatePrices($new_prices);