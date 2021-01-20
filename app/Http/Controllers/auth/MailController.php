<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendMessageRequest;
use App\Models\Message;
use App\Models\SystemMessage;
use App\Models\User;
use App\Services\ItemHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Mail Controller. There are all messages, letters and battle reports.
 *
 * @package App\Http\Controllers\Auth
 */
class MailController extends Controller
{
    /**
     * MailController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Main page of mail. Contains list of mail category
     * such as messages or battle reports etc.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function index()
    {
        return view('auth.mail.main');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dialogs()
    {
        $lastMessages = Message::lastMessages();
        return view('auth.mail.dialogs', ['messages' => $lastMessages]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function systemMessages()
    {
        $systemMessages = Auth::user()->systemMessages->sortByDesc('created_at');
        return view('auth.mail.system_messages', ['messages' => $systemMessages]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function systemMessageShow($id)
    {
        $message = SystemMessage::findOrFail($id);
        if($message->items != null) {
            $items = json_decode($message->items);
        } else {
            $items = null;
        }

        return view(
            'auth.mail.system_message_show',
            ['message' => $message, 'items' => $items]
        );
    }

    /**
     * @param  \Illuminate\Http\Request   $request
     * @param  \App\Services\ItemHandler  $handler
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function systemMessageGetItems(Request $request, ItemHandler $handler)
    {
        $message = SystemMessage::findOrFail($request->input('id'));
        $items = json_decode($message->items);
        if($items) {
            $handler->AddItems($items, Auth::id());
        }
        $message->is_items_got = 1;
        $message->save();

        return back();
    }

    /**
     * @param    $with
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dialog($with)
    {
        $messages = Message::messagesWith($with);
        $withUser = User::findOrFail($with);

        return view('auth.mail.dialog', compact('messages', 'withUser'));
    }

    /**
     * @param  \App\Http\Requests\SendMessageRequest  $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     * @throws \Exception|\Throwable
     */
    public function dialogSend(SendMessageRequest $request)
    {
        $message = new Message(
            [
                'from'       => Auth::user()->id,
                'from_login' => Auth::user()->login,
                'to'         => $request->input('to'),
                'to_login'   => User::findOrFail($request->input('to'))->login,
                'message'    => $request->input('message'),
            ]
        );
        $message->saveOrFail();

        return back()->with('ok', __('mes.mail.sent'));
    }
}
