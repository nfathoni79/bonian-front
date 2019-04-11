<?php

return [
    'error' => '<div class="help-block">{{content}}</div>',
    'label' => '<label>{{text}}</label>',
    'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
    'formGroup' => '{{label}}{{input}}',
    'inputContainer' => '<div class="{{type}}{{required}} form-group">{{content}}</div>',
    'inputContainerError' => '<div class="form-group error {{type}}{{required}}">{{content}}{{error}}</div>',
];