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
        Reset Password
    </h2>

    <x-input
        label="New Password"
        name="new_password"
        type="password"
    />

    <x-input
        label="Repeat Password"
        name="repeat_password"
        type="password"
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
        Reset Password
    </button>

</form>