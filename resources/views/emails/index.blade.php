<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ getStoreSettings('name') }}</title>
</head>
<body style="margin:0;padding:0;background:#0c0618;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#0c0618;">
        <tr>
            <td align="center" style="padding:24px 16px;">
                <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">

                    {{-- Logo --}}
                    <tr>
                        <td align="center" style="padding:24px;background:#1a0d32;border-radius:16px 16px 0 0;">
                            @if($logo = getEmailLogoEmbedSrc())
                                <!-- <img src="{{ $logo }}" alt="{{ getStoreSettings('name') }}" width="140" style="display:block;border:0;"> -->
                                <img src="{{ $message->embed(public_path('imgs/logo.png')) }}" width="160" alt="Logo">
                            @else
                                <span style="font-size:24px;font-weight:bold;color:#fff;">{{ getStoreSettings('name') }}</span>
                            @endif
                        </td>
                    </tr>

                    {{-- Email content (activation, welcome, etc.) --}}
                    @isset($emailsTemplate)
                        @include($emailsTemplate)
                    @endisset
                    @isset($emailContent)
                        @include($emailContent)
                    @endisset

                    {{-- Footer --}}
                    <tr>
                        <td align="center" style="padding:20px;background:#110028;border-radius:0 0 16px 16px;font-size:12px;color:#a89bc4;">
                            {{ __tr('Copyright © __storeName__ __year__', [
                                '__storeName__' => getStoreSettings('name'),
                                '__year__' => date('Y'),
                            ]) }}
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
