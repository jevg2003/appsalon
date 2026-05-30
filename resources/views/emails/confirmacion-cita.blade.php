<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de tu Cita - AppSalon</title>
    <style>
        /* Reset de estilos básicos para correos */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }

        /* Estilos móviles responsivos */
        @media screen and (max-width: 600px) {
            .email-container { width: 100% !important; padding: 10px !important; }
            .button { display: block !important; text-align: center !important; width: auto !important; }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #FAF6F0; font-family: 'Outfit', 'Helvetica Neue', Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #FAF6F0; padding: 40px 0;">
        <tr>
            <td align="center">
                <!-- Contenedor Principal (Max 600px) -->
                <table border="0" cellpadding="0" cellspacing="0" class="email-container" width="600" style="background-color: #FFFFFF; border: 1px solid #E5D5C0; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.03); overflow: hidden; padding: 40px;">
                    
                    <!-- Encabezado / Logo Estilo Editorial -->
                    <tr>
                        <td align="center" style="padding-bottom: 30px; border-bottom: 1px solid #FAF6F0;">
                            <span style="font-family: 'Cormorant Garamond', 'Georgia', 'Times New Roman', serif; font-size: 32px; font-weight: 300; letter-spacing: 3px; color: #1C1917; text-transform: uppercase;">
                                AppSalon
                            </span>
                            <div style="font-size: 11px; letter-spacing: 2px; color: #C5A880; text-transform: uppercase; margin-top: 5px;">
                                Belleza & Bienestar Premium
                            </div>
                        </td>
                    </tr>

                    <!-- Mensaje de Bienvenida -->
                    <tr>
                        <td style="padding: 30px 0 20px 0; text-align: center;">
                            <h1 style="font-family: 'Cormorant Garamond', 'Georgia', serif; font-size: 26px; font-weight: normal; color: #A75D43; margin: 0 0 10px 0; font-style: italic;">
                                ¡Tu cita ha sido agendada con éxito!
                            </h1>
                            <p style="font-size: 15px; color: #6B6661; line-height: 1.6; margin: 0;">
                                Hola, <strong style="color: #1C1917;">{{ $cita->usuarioId ? ($cita->usuario->nombre . ' ' . $cita->usuario->apellido) : $cita->nombre_invitado }}</strong>. Nos complace confirmarte que hemos reservado tu espacio. A continuación, tienes los detalles completos de tu cita:
                            </p>
                        </td>
                    </tr>

                    <!-- Tarjeta de Detalles del Horario -->
                    <tr>
                        <td style="background-color: #FAF6F0; border-radius: 8px; padding: 24px; margin-bottom: 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td width="50%" style="padding-right: 15px; border-right: 1px solid #E5D5C0; vertical-align: top;">
                                        <div style="font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #C5A880; font-weight: bold; margin-bottom: 5px;">Fecha</div>
                                        <div style="font-size: 16px; color: #1C1917; font-weight: bold;">
                                            {{ \Carbon\Carbon::parse($cita->fecha)->locale('es')->translatedFormat('l, j \d\e F') }}
                                        </div>
                                    </td>
                                    <td width="50%" style="padding-left: 20px; vertical-align: top;">
                                        <div style="font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #C5A880; font-weight: bold; margin-bottom: 5px;">Hora</div>
                                        <div style="font-size: 16px; color: #1C1917; font-weight: bold;">
                                            {{ \Carbon\Carbon::parse($cita->hora)->format('g:i A') }}
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Tabla de Servicios Reservados -->
                    <tr>
                        <td style="padding-top: 15px; padding-bottom: 15px;">
                            <div style="font-size: 12px; text-transform: uppercase; letter-spacing: 1px; color: #A75D43; font-weight: bold; margin-bottom: 10px; border-bottom: 1px solid #FAF6F0; padding-bottom: 5px;">
                                Servicios Contratados
                            </div>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                @foreach($cita->servicios as $servicio)
                                    <tr style="border-bottom: 1px solid #FAF6F0;">
                                        <td style="padding: 10px 0; color: #4A4A4A; font-size: 14px;">
                                            <div style="font-weight: bold; color: #1C1917;">{{ $servicio->nombre }}</div>
                                            <div style="font-size: 12px; color: #9A9590;">Duración: {{ $servicio->duracion }} min</div>
                                        </td>
                                        <td align="right" style="padding: 10px 0; color: #1C1917; font-size: 14px; font-weight: bold;">
                                            ${{ number_format($servicio->precio, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                                
                                <!-- Fila del Total -->
                                <tr>
                                    <td style="padding: 20px 0 10px 0; border-top: 2px solid #FAF6F0; font-size: 15px; font-weight: bold; color: #1C1917;">
                                        Total a Pagar en Salón
                                    </td>
                                    <td align="right" style="padding: 20px 0 10px 0; border-top: 2px solid #FAF6F0; font-size: 18px; font-weight: bold; color: #A75D43;">
                                        ${{ number_format($cita->total, 0, ',', '.') }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Botón de Acción Principal (CTA) -->
                    <tr>
                        <td align="center" style="padding: 30px 0 15px 0;">
                            @if($cita->token_seguimiento)
                                <a href="{{ url('/reservar/estado/' . $cita->token_seguimiento) }}" class="button" style="background-color: #C5A880; color: #FFFFFF; font-size: 14px; font-weight: bold; text-decoration: none; padding: 14px 32px; border-radius: 50px; display: inline-block; letter-spacing: 1px; text-transform: uppercase; box-shadow: 0 4px 6px rgba(197,168,128,0.2); transition: all 0.2s ease;">
                                    Ver Estado de Mi Cita
                                </a>
                            @else
                                <a href="{{ url('/dashboard') }}" class="button" style="background-color: #C5A880; color: #FFFFFF; font-size: 14px; font-weight: bold; text-decoration: none; padding: 14px 32px; border-radius: 50px; display: inline-block; letter-spacing: 1px; text-transform: uppercase; box-shadow: 0 4px 6px rgba(197,168,128,0.2); transition: all 0.2s ease;">
                                    Ir a mi Panel de Citas
                                </a>
                            @endif
                        </td>
                    </tr>

                    <!-- Recordatorio de Cancelación -->
                    <tr>
                        <td style="padding-top: 15px; text-align: center; border-top: 1px solid #FAF6F0;">
                            <p style="font-size: 12px; color: #9A9590; line-height: 1.5; margin: 0;">
                                Recuerda asistir 10 minutos antes de tu horario reservado. <br>
                                Si necesitas cancelar o reprogramar, por favor hazlo con al menos 2 horas de anticipación desde tu panel de usuario o comunicándote directamente con nosotros.
                            </p>
                        </td>
                    </tr>

                    <!-- Pie de Página / Datos de Contacto -->
                    <tr>
                        <td align="center" style="padding-top: 30px; text-align: center; font-size: 12px; color: #B3AEAA;">
                            <p style="margin: 0 0 5px 0;">📍 Calle de la Belleza #123, Ciudad Elegante</p>
                            <p style="margin: 0 0 5px 0;">📞 Contacto: +57 300 123 4567 | info@appsalon.com</p>
                            <p style="margin: 20px 0 0 0; font-size: 11px;">&copy; {{ date('Y') }} AppSalon. Todos los derechos reservados.</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
