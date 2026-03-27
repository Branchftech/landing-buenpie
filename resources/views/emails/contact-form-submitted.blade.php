<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo contacto — Buen Pie</title>
</head>
<body style="margin:0;padding:0;background:#e8eef3;font-family:'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#e8eef3;padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:560px;background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 8px 32px rgba(63,98,135,.12);">
                    <tr>
                        <td style="background:linear-gradient(135deg,#3F6287 0%,#5C84B5 50%,#8E4A97 100%);padding:24px 28px;text-align:center;">
                            <h1 style="margin:0;font-size:22px;font-weight:700;color:#ffffff;letter-spacing:-0.02em;">Buen Pie</h1>
                            <p style="margin:8px 0 0;font-size:14px;color:rgba(255,255,255,.9);">Nuevo mensaje desde «Queremos conocerte»</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px 28px 8px;">
                            <p style="margin:0 0 20px;font-size:15px;line-height:1.55;color:#4a4a4a;">
                                Recibiste un nuevo contacto desde la landing web.
                            </p>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #e8edf1;">
                                        <span style="font-size:12px;font-weight:700;color:#3F6287;text-transform:uppercase;letter-spacing:.04em;">Nombre</span>
                                        <div style="margin-top:6px;font-size:15px;color:#333;">{{ $payload['nombre'] }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #e8edf1;">
                                        <span style="font-size:12px;font-weight:700;color:#3F6287;text-transform:uppercase;letter-spacing:.04em;">Correo</span>
                                        <div style="margin-top:6px;font-size:15px;color:#333;"><a href="mailto:{{ $payload['correo'] }}" style="color:#3F6287;text-decoration:none;">{{ $payload['correo'] }}</a></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #e8edf1;">
                                        <span style="font-size:12px;font-weight:700;color:#3F6287;text-transform:uppercase;letter-spacing:.04em;">Teléfono</span>
                                        <div style="margin-top:6px;font-size:15px;color:#333;">{{ $payload['telefono'] }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #e8edf1;">
                                        <span style="font-size:12px;font-weight:700;color:#3F6287;text-transform:uppercase;letter-spacing:.04em;">Motivo</span>
                                        <div style="margin-top:6px;font-size:15px;color:#333;font-weight:600;">{{ $payload['motivo'] }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0;">
                                        <span style="font-size:12px;font-weight:700;color:#3F6287;text-transform:uppercase;letter-spacing:.04em;">Mensaje o consulta</span>
                                        <div style="margin-top:8px;font-size:15px;line-height:1.55;color:#4a4a4a;background:#f5f6f8;border-radius:12px;padding:14px 16px;border:1px solid #e8edf1;">
                                            {{ $payload['mensaje'] ?: 'Sin mensaje' }}
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0 28px 28px;">
                            <p style="margin:0;padding-top:16px;border-top:1px solid #e8edf1;font-size:12px;color:#888;line-height:1.5;">
                                Enviado el <strong style="color:#666;">{{ now()->format('d/m/Y H:i') }}</strong> desde la landing de Buen Pie.
                            </p>
                        </td>
                    </tr>
                </table>
                <p style="margin:20px 0 0;font-size:11px;color:#9aa5ad;text-align:center;">
                    Este correo fue generado automáticamente por el formulario de contacto.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
