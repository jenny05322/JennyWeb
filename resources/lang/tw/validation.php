<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute 是被接受的。',
    'active_url'           => ':attribute 必須是一個有效的網址。',
    'after'                => ':attribute 必須在 :date 之後。',
    'after_or_equal'       => ':attribute 必須等於或在 :date 之後。',
    'alpha'                => ':attribute 僅能包含字母字元。',
    'alpha_dash'           => ':attribute 僅能包含字母、數字、破折號（-）以及底線（_）。',
    'alpha_num'            => ':attribute 僅能包含字母、數字。',
    'array'                => ':attribute 必須是一個陣列。',
    'before'               => ':attribute 必須在 :date 之前。',
    'before_or_equal'      => ':attribute 必須等於或在 :date 之前。',
    'between'              => [
        'numeric' => ':attribute 必須在 :min 到 :max 之間。',
        'file'    => ':attribute 必須在 :min 到 :max KB 之間。',
        'string'  => ':attribute 必須在 :min 到 :max 個字元之間。',
        'array'   => ':attribute 必須在 :min 到 :max 項之間。',
    ],
    'boolean'              => ':attribute 必須是 true 或 false。',
    'confirmed'            => '與 :attribute 不相同。',
    'date'                 => ':attribute 必須是一個有效的日期。',
    'date_format'          => ':attribute 與給定的日期格式 :format 不符合。',
    'different'            => ':attribute 必須和 :other 不同。',
    'digits'               => ':attribute 必須為數值且長度為 :digits 位數。',
    'digits_between'       => ':attribute 長度必須在 :min 和 :max 位數之間。',
    'dimensions'           => ':attribute 必須符合尺寸限制。',
    'distinct'             => ':attribute 不能重複。',
    'email'                => ':attribute 必須符合電子郵件格式。',
    'exists'               => ':attribute 不存在。',
    'file'                 => ':attribute 必須為檔案。',
    'filled'               => ':attribute 不能為空值。',
    'image'                => ':attribute 必須為圖片格式（jpeg、png、bmp、gif 或 svg）。',
    'in'                   => ':attribute 不在給定的清單裡。',
    'in_array'             => ':attribute 不在 :other 裡。',
    'integer'              => ':attribute 必須是整數。',
    'ip'                   => ':attribute 必須符合 IP 位址格式。',
    'ipv4'                 => ':attribute 必須符合 IPv4 位址格式。',
    'ipv6'                 => ':attribute 必須符合 IPv6 位址格式。',
    'json'                 => ':attribute 必須是一個有效的 JSON 字串。',
    'max'                  => [
        'numeric' => ':attribute 的最大長度為 :max 位數。',
        'file'    => ':attribute 的最大為 :max KB。',
        'string'  => ':attribute 的最大長度為 :max 個字元。',
        'array'   => ':attribute 最多為 :max 項。',
    ],
    'mimes'                => ':attribute 的檔案類型必須是 :values。',
    'mimetypes'            => ':attribute 的檔案類型必須是 :values。',
    'min'                  => [
        'numeric' => ':attribute 的最小長度為 :min 位數。',
        'file'    => ':attribute 大小至少為:min KB。',
        'string'  => ':attribute 的最小長度為 :min 字元。',
        'array'   => ':attribute 至少有 :min 項。',
    ],
    'not_in'               => ':attribute 在給定的清單裡。',
    'numeric'              => ':attribute 必須為數值。',
    'present'              => ':attribute 欄位必須存在。',
    'regex'                => ':attribute 不符合給定的格式。',
    'required'             => ':attribute 欄位為必填。',
    'required_if'          => '當 :other 等於 :value 時，:attribute 欄位為必填。',
    'required_unless'      => ':attribute 欄位為必填，:other 等於 :values 時除外。',
    'required_with'        => '當 :values 有值時，:attribute 欄位為必填。',
    'required_with_all'    => '當 :values 均有值時，:attribute 欄位為必填。',
    'required_without'     => '當 :values 沒有值時，:attribute 欄位為必填。',
    'required_without_all' => '當 :values 均沒有值時，:attribute 欄位為必填。',
    'same'                 => ':attribute 必須和 :other 相同。',
    'size'                 => [
        'numeric' => ':attribute 必須是 :size 位數。',
        'file'    => ':attribute 必須是 :size KB。',
        'string'  => ':attribute 必須是 :size 個字元。',
        'array'   => ':attribute 必須包括 :size 項。',
    ],
    'string'               => ':attribute 必須為字串。',
    'timezone'             => ':attribute 必須是個有效的時區。',
    'unique'               => ':attribute 已存在。',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => ':attribute 必須符合 URL 格式。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
