<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$types = ['swot_strength', 'swot_weakness', 'swot_opportunity', 'swot_need'];
$items = \App\Models\ProfileItem::whereIn('type', $types)->get();
echo "Found SWOT items: " . count($items) . "\n";
foreach($items as $i) {
    echo "ID: {$i->id}, Type: {$i->type}, AR: {$i->value_ar}, EN: {$i->value_en}\n";
}
