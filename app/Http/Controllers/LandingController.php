<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Throwable;

class LandingController extends Controller
{
    public function index()
    {
        // Data editable (sucursales / contacto) basada en el PDF
        $branches = [
            ['name' => 'Insurgentes', 'slug' => 'insurgentes'],
            ['name' => 'Otay',        'slug' => 'otay'],
            ['name' => 'Centro',      'slug' => 'centro'],
            ['name' => 'Playas',      'slug' => 'playas'],
        ];

        $contact = [
            'phone_display' => '664-731-4805',
            'phone_link'    => '526647314805',
            'email'         => 'elbuenpie.tijuana@gmail.com',
            'address'       => 'Av de los Insurgentes 17017-Local 5, Los Alamos, 22110 Tijuana, B.C.',
            'hours'         => [
                'Lunes a Viernes: 10:00 AM a 7:00 PM',
                'Sábados: 9:00 AM a 4:00 PM',
            ],
            'whatsapp_link' => 'https://wa.me/526647314805',
        ];

        return view('landing', compact('branches', 'contact'));
    }

    public function submit(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'nombre'   => ['required','string','max:120'],
            'correo'   => ['required','email','max:160'],
            'telefono' => ['required','string','max:40'],
            'motivo'   => ['nullable','string','max:120'],
            'opcion'   => ['required','in:Solicitar información,Agendar cita,Consultar promociones,Otros'],
            'mensaje'  => ['nullable','string','max:2000'],
        ], [
            'opcion.required' => 'Seleccioná una opción.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = array_merge([
            'nombre' => '',
            'correo' => '',
            'telefono' => '',
            'opcion' => '',
            'motivo' => null,
            'mensaje' => null,
        ], $validator->validated());

        $motivoPorOpcion = [
            'Solicitar información' => 'Solicitar información:',
            'Agendar cita' => 'Agendar cita:',
            'Consultar promociones' => 'Consultar promociones:',
            'Otros' => 'Otros:',
        ];
        $data['motivo'] = $motivoPorOpcion[$data['opcion']] ?? $data['opcion'];

        try {
            Mail::to(config('mail.contact_to.address', 'piotroskiangeles@gmail.com'))
                ->send(new ContactFormSubmitted($data));
        } catch (Throwable $e) {
            report($e);

            return back()
                ->withErrors(['contacto' => 'No se pudo enviar el correo en este momento. Intenta nuevamente.'])
                ->withInput();
        }

        return back()->with(
            'ok',
            'Tu consulta ha sido enviada correctamente. Nos pondremos en contacto contigo a la brevedad.'
        );
    }
}
