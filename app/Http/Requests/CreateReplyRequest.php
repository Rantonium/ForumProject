<?php

namespace App\Http\Requests;

use App\Models\Reply;
use App\Models\ReplyAble;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateReplyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body'              => ['required'],
            'replyable_id'      => ['required'],
            'replyable_type'    => ['required', 'in:threads']
        ];
    }

    public function replyAble(): ReplyAble{
        return $this->findReplyAble($this->get('replyable_id'), $this->get('replyable_type'));
    }

    private function findReplyAble(int $id, string $type) : ?ReplyAble{
        switch($type){
            case 'threads':
                return Thread::find($id);
        }
        abort(404);
        return Thread::find($id);
    }
    public function author(): User{
        return $this->user();
    }

    public function body():string{
        return $this->get('body');
    }

}
