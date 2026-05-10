<form action="{{ route('tenant.login') }}" method="POST" style="
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
        Login
    </h2>

    <x-input
        label="Name"
        name="name"
    />

    <x-input
        label="Email"
        name="email"
        type="email"
    />

    <x-input
        label="Password"
        name="password"
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
        Login
    </button>
    <br><br>
    <a href='#' style="
        margin-top: 2px;
        font-family: inherit;
        text-decoration: none;
        ">forgot password</a>

</form>