<?php

namespace Wavey\Sweetalert;

use Illuminate\Http\Request;

class ConvertMessages
{
    /**
     * Handle the message.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function handle(Request $request): mixed
    {
        if ($request->session()->has('success')) {
            alert()->success($request->session()->get('success'))->persistent();
        }

        if ($request->session()->has('warning')) {
            alert()->warning($request->session()->get('warning'))->persistent();
        }

        if ($request->session()->has('info')) {
            alert()->info($request->session()->get('info'))->persistent();
        }

        if ($request->session()->has('message')) {
            alert()->message($request->session()->get('message'))->persistent();
        }

        if ($request->session()->has('basic')) {
            alert()->basic($request->session()->get('basic'));
        }

        if ($request->session()->has('errors')) {
            $message = $request->session()->get('errors');

            if (!is_string($message)) {
                $message = $this->prepareErrors($message->getMessages());
            }

            alert()->error($message)->html()->persistent();
        }

        return $next($request);
    }

    /**
     * Prepare the errors.
     *
     * @param $errors
     *
     * @return string
     */
    private function prepareErrors($errors): string
    {
        $errors = collect($errors);

        return $errors->flatten()->implode('<br />');
    }
}
