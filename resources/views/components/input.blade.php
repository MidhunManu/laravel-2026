@props([
    'label'
])

<div style="
    margin-bottom: 18px;
">

    <label style="
        display: block;
        margin-bottom: 6px;
        font-size: 14px;
        color: #333;
    ">
        {{ $label }}
    </label>

    <input
        {{ $attributes->merge([
            'type' => 'text'
        ]) }}

        style="
            width: 100%;
            padding: 10px;
            border: 1px solid #bbb;
            background: white;
            font-size: 14px;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
        "
    >

</div>