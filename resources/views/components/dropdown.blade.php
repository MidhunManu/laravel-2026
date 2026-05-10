@props([
    'label',
    'options' => []
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

    <select
        {{ $attributes }}

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
        @foreach($options as $value => $text)
            <option value="{{ $value }}">
                {{ $text }}
            </option>
        @endforeach
    </select>

</div>