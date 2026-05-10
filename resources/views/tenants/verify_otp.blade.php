<form action="{{ route('tenant.otp-verify') }}" method="POST" style="
    max-width: 420px;
    margin: 60px auto;
    padding: 28px;
    border: 1px solid #cfcfcf;
    background: #fafafa;
    font-family: Georgia, serif;
">

    @csrf

    <input type="hidden" name="email" value="{{ $email }}">

    <input type="hidden" name="otp" id="otp-hidden">

    <h2 style="
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 24px;
        font-weight: normal;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        color: #222;
    ">
        Verify OTP
    </h2>

    <p style="
        margin-top: 0;
        margin-bottom: 24px;
        font-size: 14px;
        color: #666;
        line-height: 1.5;
        font-family: Arial, sans-serif;
    ">
        Enter the 6 digit verification code sent to your email.
    </p>

    <div style="
        display: flex;
        gap: 10px;
        justify-content: space-between;
        margin-bottom: 22px;
    ">

        @for ($i = 0; $i < 6; $i++)
            <input
                type="text"
                maxlength="1"
                inputmode="numeric"
                class="otp-input"

                style="
                    width: 52px;
                    height: 52px;
                    border: 1px solid #bbb;
                    background: white;
                    text-align: center;
                    font-size: 22px;
                    font-family: Arial, sans-serif;
                    box-sizing: border-box;
                    outline: none;
                "
            >
        @endfor

    </div>

    <button type="submit" style="
        margin-top: 6px;
        padding: 8px 14px;
        border: 1px solid #999;
        background: white;
        cursor: pointer;
        font-size: 14px;
        font-family: inherit;
    ">
        Verify OTP
    </button>

</form>

<script>

    const otpInputs = document.querySelectorAll('.otp-input');
    const hiddenOtp = document.getElementById('otp-hidden');

    function updateOtpValue() {

        hiddenOtp.value = Array.from(otpInputs)
            .map(input => input.value)
            .join('');

    }

    otpInputs.forEach((input, index) => {

        input.addEventListener('input', (e) => {

            e.target.value = e.target.value.replace(/[^0-9]/g, '');

            updateOtpValue();

            if (
                e.target.value &&
                index < otpInputs.length - 1
            ) {
                otpInputs[index + 1].focus();
            }

        });

        input.addEventListener('keydown', (e) => {

            if (
                e.key === 'Backspace' &&
                !input.value &&
                index > 0
            ) {
                otpInputs[index - 1].focus();
            }

        });

    });

</script>