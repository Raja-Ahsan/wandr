<tr>
    <td align="center" style="padding:36px 28px;background-color:#16102a;color:#e8dff5;font-family:Arial,Helvetica,sans-serif;">
        <h1 style="margin:0 0 16px;color:#ffffff;font-size:24px;">
            {{ __tr('Account created successfully') }}
        </h1>

        <p style="margin:0 0 16px;font-size:15px;line-height:1.6;text-align:left;">
            {{ __tr('Hi') }} {{ $fullName ?? $userName }},
        </p>

        <p style="margin:0 0 22px;font-size:15px;line-height:1.6;text-align:left;">
            {{ __tr('Your __siteName__ account has been created successfully.', ['__siteName__' => getStoreSettings('name')]) }}
        </p>

        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 24px;border-collapse:collapse;">
            <tr>
                <td style="padding:18px 20px;background-color:#1a0d32;border:1px solid #3a2658;border-radius:12px;text-align:left;">
                    <p style="margin:0 0 8px;font-size:12px;letter-spacing:1px;text-transform:uppercase;color:#a89bc4;">
                        {{ __tr('Account status') }}
                    </p>
                    <p style="margin:0 0 12px;font-size:18px;font-weight:700;color:#f6c23e;">
                        {{ __tr('Pending admin approval') }}
                    </p>
                    <p style="margin:0;font-size:14px;line-height:1.6;color:#e8dff5;">
                        {{ __tr('An admin will review and activate your account. You will be able to log in once it is approved.') }}
                    </p>
                </td>
            </tr>
        </table>

        <p style="margin:0 0 8px;font-size:14px;line-height:1.8;text-align:left;">
            @if(!empty($userName))
                <strong style="color:#c4b5e0;">{{ __tr('Username') }}:</strong> {{ $userName }}<br>
            @endif
            @if(!empty($email))
                <strong style="color:#c4b5e0;">{{ __tr('Email') }}:</strong> {{ $email }}
            @endif
        </p>

        <a href="{{ route('user.login') }}"
           style="display:inline-block;margin-top:20px;padding:14px 32px;background-color:#DF0D78;color:#ffffff;text-decoration:none;border-radius:8px;font-weight:bold;">
            {{ __tr('Go to Login') }}
        </a>
    </td>
</tr>
