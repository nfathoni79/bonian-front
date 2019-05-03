<?php
use Cake\Core\Configure;

if (isset($search[0]) && isset($search[0]['data'])) {
    foreach ($search[0]['data'] as $key => &$val) {
        $val['url'] = $this->Url->build([
            'controller' => 'Search',
            'action' => 'index',
            'prefix' => false,
            '?' => [
                'q' => $val['primary'],
                'source' => 'click'
            ]
        ]);
        $val['primary'] = $this->Tools->highlight($this->Text->truncate($val['primary'], 85, [
            'ellipsis' => '...',
            'exact' => false
        ]),
            $val['fill_text']
        );
    }
}

if (isset($search[1]) && isset($search[1]['data'])) {
    foreach($search[1]['data'] as $key => &$val) {
        $val['url'] = $this->Url->build([
            'controller' => 'Search',
            'action' => 'index',
            'prefix' => false,
            '?' => [
                'q' => $val['primary'],
                'category_id' => $val['product_category']['id'],
                'source' => 'click'
            ]
        ]);

        $val['primary'] = $this->Tools->highlight($this->Text->truncate($val['primary'], 80, [
                'ellipsis' => '...',
                'exact' => false
            ]),
            $keyword
        ) . ' di <span class="search-category">' . $val['product_category']['name'] . '</span>';

    }
}

if (isset($search[2]) && isset($search[2]['data'])) {
    foreach($search[2]['data'] as $key => &$val) {
        $val['primary'] = $this->Tools->highlight(
            $this->Text->truncate($val['primary'], 60, [
                'ellipsis' => '...',
                'exact' => false
            ]),
            $keyword
        );
        if (isset($val['product_images']) && isset($val['product_images'][0])) {
            $val['image'] = rtrim(Configure::read('Images.url'), '/')  . '/images/40x40/' . $val['product_images'][0]['name'];
        }
        $val['url'] = $this->Url->build([
            'controller' => 'Products',
            'action' => 'detail',
            'prefix' => false,
            $val['slug']
        ]);
    }
}

echo json_encode($search);
 ?>