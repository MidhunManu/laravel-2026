<form action="{{ route('tenant.store') }}" method="POST" style="
    max-width: 420px;
    margin: 40px auto;
    padding: 24px;
    border: 1px solid #cfcfcf;
    background: #fafafa;
    font-family: Georgia, serif;">

    @csrf 

    <h2 style="
        margin-top: 0;
        margin-bottom: 24px;
        font-size: 24px;
        font-weight: normal;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        color: #222;
    ">
        Create Tenant
    </h2>

    {{-- 🌟 Global error block --}}
    @if ($errors->any())
        <div style="
            margin-bottom: 16px;
            padding: 10px;
            border: 1px solid #d33;
            background: #fff0f0;
            color: #a00;
            font-size: 14px;
        ">
            <ul style="margin: 8px 0 0 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-input
        label="Admin Name"
        name="name"
        :error="$errors->first('name')"
    />

    <x-input
        label="Email"
        name="email"
        type="email"
        :error="$errors->first('email')"
    />

    <x-input
        label="Password"
        name="password"
        type="password"
        :error="$errors->first('password')"
    />

    <x-input
        label="Sub Domain"
        name="sub_domain"
        :error="$errors->first('sub_domain')"
    />

    <x-dropdown
        label="Plan"
        name="plan"
        :options="[
            'lite' => 'Lite',
            'basic' => 'Basic',
            'standard' => 'Standard',
            'enterprise' => 'Enterprise'
        ]"
        :error="$errors->first('plan')"
    />

    <button type="submit" style="
        margin-top: 16px;
        padding: 8px 14px;
        border: 1px solid #999;
        background: white;
        cursor: pointer;
        font-size: 14px;
        font-family: inherit;
    ">
        Create Tenant
    </button>

</form>